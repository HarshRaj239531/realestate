import { animate, inView, scroll, stagger } from 'motion';

document.addEventListener('DOMContentLoaded', () => {
    // Mark html as ready for motion animations
    document.documentElement.classList.add('js-motion-ready');

    // 1. Reading & Scroll Progress Bar at the top of the viewport
    const progressBar = document.getElementById('scroll-progress-bar');
    if (progressBar) {
        scroll((progress) => {
            progressBar.style.transform = `scaleX(${progress})`;
        });
    }

    // 2. Fade Up for headers and main widgets
    inView('[data-motion="fade-up"]', (element) => {
        animate(
            element,
            { opacity: [0, 1], transform: ['translateY(40px)', 'translateY(0px)'] },
            { duration: 0.75, ease: [0.22, 1, 0.36, 1] }
        );
    }, { amount: 0.15 });

    // 3. Fade in from Left
    inView('[data-motion="fade-left"]', (element) => {
        animate(
            element,
            { opacity: [0, 1], transform: ['translateX(-45px)', 'translateX(0px)'] },
            { duration: 0.75, ease: [0.22, 1, 0.36, 1] }
        );
    }, { amount: 0.15 });

    // 4. Fade in from Right
    inView('[data-motion="fade-right"]', (element) => {
        animate(
            element,
            { opacity: [0, 1], transform: ['translateX(45px)', 'translateX(0px)'] },
            { duration: 0.75, ease: [0.22, 1, 0.36, 1] }
        );
    }, { amount: 0.15 });

    // 5. Zoom & Focus In
    inView('[data-motion="zoom-in"]', (element) => {
        animate(
            element,
            { opacity: [0, 1], transform: ['scale(0.92)', 'scale(1)'] },
            { duration: 0.75, ease: [0.22, 1, 0.36, 1] }
        );
    }, { amount: 0.15 });

    // 6. Staggered Cards (Properties, Team, Testimonials, FAQs)
    inView('[data-motion-stagger]', (container) => {
        const items = Array.from(container.children);
        if (items.length > 0) {
            animate(
                items,
                { opacity: [0, 1], transform: ['translateY(35px)', 'translateY(0px)'] },
                { delay: stagger(0.12), duration: 0.65, ease: [0.22, 1, 0.36, 1] }
            );
        }
    }, { amount: 0.1 });
});
