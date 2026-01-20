jQuery(document).ready(function ($) {

    const xstudioapp_blog = () => {

        // ---------------------------------------------------------
        // DOM ELEMENTS
        // ---------------------------------------------------------

        // All thumbnails
        const thumbnails = document.querySelectorAll('.thumbnail');

        // All slides
        const slides = document.querySelectorAll('.slide');

        // Elementor input values (always strings → convert to number)
        const maxCatTitle = parseInt(document.querySelector('input[name="max_cat_title"]')?.value || 0);
        const maxCatDescription = parseInt(document.querySelector('input[name="max_cat_description"]')?.value || 0);

        // All titles and descriptions inside slides
        const titles = document.querySelectorAll('.xsa_blog .widget-slides .slide .slide-content h3');
        const descriptions = document.querySelectorAll('.xsa_blog .widget-slides .slide .slide-content p');


        // ---------------------------------------------------------
        // TEXT TRUNCATION FUNCTION
        // ---------------------------------------------------------
        const truncateText = (element, limit) => {
            if (!element) return;

            const text = element.textContent.trim();

            // If limit is valid and text is longer than limit → truncate
            if (limit > 0 && text.length > limit) {
                element.textContent = text.substring(0, limit) + '...';
            }
        };


        // ---------------------------------------------------------
        // APPLY TRUNCATION TO ALL TITLES & DESCRIPTIONS
        // ---------------------------------------------------------
        titles.forEach(title => truncateText(title, maxCatTitle));
        descriptions.forEach(desc => truncateText(desc, maxCatDescription));


        // ---------------------------------------------------------
        // THUMBNAIL CLICK → SWITCH SLIDE
        // ---------------------------------------------------------
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {

                // Get target slide index
                const targetIndex = thumb.getAttribute('data-slide-target');

                // Remove active class from all slides
                slides.forEach(slide => slide.classList.remove('is-active'));

                // Activate the selected slide
                const targetSlide = document.querySelector(`.slide[data-slide-index="${targetIndex}"]`);
                if (targetSlide) {
                    targetSlide.classList.add('is-active');
                }
            });
        });
    };


    // ---------------------------------------------------------
    // ELEMENTOR HOOK → RUN SCRIPT WHEN WIDGET IS LOADED
    // ---------------------------------------------------------
   if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {
        elementorFrontend.hooks.addAction('frontend/element_ready/xstudioapp_testimonials.default', function($scope){
            xstudioapp_blog();
        });
    }

});
