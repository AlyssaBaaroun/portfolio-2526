<?php
include('core/theme/configuration.php');

register_nav_menu('header', 'Le menu qui se trouve dans le header');
register_nav_menu('footer', 'Le menu qui se trouve dans le footer');
register_nav_menu('social-media', 'Le menu qui regroupe nos réseaux sociaux');

function dw_get_navigation_links(string $menu_name): array
{
  // Récupérer l'objet WP pour le menu à la location $location
  $all_menus = get_nav_menu_locations();

  if (!isset($all_menus[$menu_name])) {
    return [];
  }

  // Je récupère l'id de mon menu
  $nav_id = $all_menus[$menu_name];

  $items_menu = wp_get_nav_menu_items($nav_id);
  $links = [];

  foreach ($items_menu as $item) {
    $link = new stdClass();
    $link->href = $item->url;
    $link->label = $item->title;
    $link->title = $item->attr_title;

    $links[] = $link;
  }

  return $links;
}

dw_get_navigation_links('header');

function dw_asset(string $filename): string
{
  $manifest_path = get_theme_file_path('public/.vite/manifest.json');

  if (file_exists($manifest_path)) {
    $manifest = json_decode(file_get_contents($manifest_path), true);

    if (isset($manifest['wp-content/themes/dw/assets/css/styles.scss']) && $filename === 'css') {
      return get_theme_file_uri('public/' . $manifest['wp-content/themes/dw/assets/css/styles.scss']['file']);
    }

    if (isset($manifest['wp-content/themes/dw/assets/js/main.js']) && $filename === 'js') {
      return get_theme_file_uri('public/' . $manifest['wp-content/themes/dw/assets/js/main.js']['file']);
    }
  }

  return '';
}

//charger les traductions existantes
load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');

// Fonction pour les chaînes de traduction personnalisées
function __hepl(string $translation): ?string
{
  return __($translation, 'hepl-trad');
}













