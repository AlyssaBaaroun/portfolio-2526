import {settings} from "./settings";

const anim = {
    init() {
        this.animation();
    },

    animation() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add(settings.showUp);
                }
            });
        });
        document.querySelectorAll(settings.toAnimate).forEach(element => {
            element.classList.add(settings.hidden);
            observer.observe(element);
        });
    },
}
anim.init();