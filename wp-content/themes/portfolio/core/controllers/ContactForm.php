<?php

use JetBrains\PhpStorm\NoReturn;

class ContactForm
{
    // Ma configuration du nonce
    protected array $config;

    // Valeur de $_POST
    protected array $data;

    // Contiendra l'url d'origine
    protected string $referrer;

    public function __construct(array $config, array $data)
    {
        $this->config = $config;
        $this->data = $data;
        $this->referrer = wp_get_referer();
    }

    public function sanitize(array $methods): static
    {
        foreach ($methods as $field => $method) {
            $method = 'sanitize_' . $method; // Ici, je construis ma méthode sanitize (sanitize_text_field())
            $this->data[$field] = $method($this->data[$field] ?? '');
            // Ici, je vais executé ma méthode sanitize construite sur la valeur de mon field que je viens
            // réassigner à mon field.
        }

        return $this;
    }

    public function validate(array $rules): static
    {
        if (!$this->verifyNonce()) {
            die('Invalid request');
        }

        if ($errors = $this->applyValidationRules($rules)) {
            hepl_session_flash($this->config['nonce_identifier'] . '_errors',
                $errors); // errors : ['name' => Le champ est requis]

            wp_safe_redirect($this->referrer);
            exit;
        }

        return $this;
    }

    protected function verifyNonce(): bool
    {
        $nonce = $this->data[$this->config['nonce_field']] ?? null;
        $identifier = $this->config['nonce_identifier'];

        return wp_verify_nonce($nonce, $identifier);
    }

    protected function applyValidationRules(array $rules): array
    {
        $errors = [];

        foreach ($rules as $field => $checks) {
            $value = $this->data[$field] ?? '';
            $errors[$field] = $this->applyFieldValidation($field, $value, $checks);
        }

        return array_filter($errors);
    }

    protected function applyFieldValidation(string $field, mixed $value, array $rules): ?string
    {
        foreach ($rules as $rule) {
            $check = 'check' . ucfirst($rule); // checkRequired
            $errorMessage = 'get' . ucfirst($rule) . 'ErrorMessage'; // getRequiredErrorMessage

            $error = $this->$check($field, $value) ? false : $this->$errorMessage($field);

            if ($error) {
                return $error;
            }
        }
        return null;
    }

    protected function checkRequired($field, $value): bool
    {
        return ($value !== null && $value !== '');
    }

    protected function getRequiredErrorMessage(string $field): string
    {
        return 'Ce champ est obligatoire';
    }

    protected function checkEmail($field, $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function getEmailErrorMessage(string $field): string
    {
        return 'Veuillez fournir une adresse e-mail valide';
    }

    public function save(callable $title, callable $content): static
    {
        wp_insert_post([
            'post_type' => 'contact_message',
            'post_status' => 'publish',
            'post_title' => $title($this->data),
            'post_content' => $content($this->data),
        ]);

        return $this;
    }

    public function send(callable $title, callable $content): static
    {
        wp_mail(get_bloginfo('admin_email'), $title($this->data), $content($this->data));

        return $this;
    }

    #[NoReturn]
    public function feedback(): void
    {
        hepl_session_flash($this->config['nonce_identifier'] . '_feedback', true);
        wp_safe_redirect($this->referrer);
        exit;
    }
}