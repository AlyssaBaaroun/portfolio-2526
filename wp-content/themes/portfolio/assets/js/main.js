console.log('coucou je suis un test');

const animation = {
    init() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('showup');
                }
            });
        });
        document.querySelectorAll('[data-showup="true"]').forEach(element => {
            element.classList.add('hidden');
            observer.observe(element);

        });
    },
};
animation.init();