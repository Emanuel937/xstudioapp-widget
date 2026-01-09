 jQuery(document).ready(function($){
  //running in elementor frontend and backend
  const xstudioapp_blog = ()=>{ 

    const thumbnails = document.querySelectorAll('.thumbnail');
    const slides = document.querySelectorAll('.slide');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
        const targetIndex = thumb.getAttribute('data-slide-target');

        slides.forEach(slide => {
            slide.classList.remove('is-active');
        });

        const targetSlide = document.querySelector(`.slide[data-slide-index="${targetIndex}"]`);
        if (targetSlide) {
            targetSlide.classList.add('is-active');
        }
        });
    });
 }

 if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {
        elementorFrontend.hooks.addAction('frontend/element_ready/xstudioapp_testimonials.default', function($scope){
           xstudioapp_blog();
        });
    }

});
