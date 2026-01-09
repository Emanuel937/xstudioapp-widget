jQuery(document).ready(function($){
    
  
    function runCode(){
     
        const modele_type            = document.querySelector('#xstudioapp_testemonial_style').getAttribute('data-info');
        const container              = document.querySelector(".-xstudioapp-widget-testimonial-container");
        const name                   = container.querySelector("#name");
        const quote                  = container.querySelector("#quote");
        const designation            = container.querySelector("#designation");
        const imgs                   = modele_type == "style_2" ? container.querySelectorAll(".img") : container.querySelector('#image-container');
        
        // ====================================================================================================
        // button prev and next
        // ====================================================================================================

       const prevButton             = container.querySelector('#prev-button');
       const nextButton             = container.querySelector('#next-button');

       let   activeIndex            = 0 ;
       const testemonials           = document.querySelector("#xstudioapp_testemonial").getAttribute('data-info');
       const testimonials_array     = JSON.parse(testemonials);

    // ==========================================================================================================
    // (x + N) % N -> never get the negative result ....
    // ==========================================================================================================

    const loopFormule = (x)=> {

        return (activeIndex + x + testimonials_array.length ) %  testimonials_array.length;
    }


    // ===========================================================================================================
    //  The namition for each word  
    //  animation set on every xstudioapp-widget-word css class 
    //   ---------------------------------------------------------------------------------------------------------

    const animateWords = ()=> {

        const words = quote.querySelectorAll('.-xstudioapp-widget-word');
        words.forEach((word, index) => {
            word.style.opacity = '0';
            word.style.filter = 'blur(10px)';
            setTimeout(() => {
                 word.style.transition = 'opacity 0.2s ease-in-out, transform 0.2s ease-in-out, filter 0.2s ease-in-out';
                word.style.opacity = '1';
    
                word.style.filter = 'blur(0)';
            }, index * 20);
        });
    }


    const updateTestimonial = (direction)=>
      {
          
          activeIndex = loopFormule(direction);
          // =============================
          //  setting the data to the node 
          //===============================

          name.textContent  = testimonials_array[activeIndex].name;
     
          if(modele_type == "style_2"){
             
             let prevActiveIndex = loopFormule(-1);
             let nextActiveIndex = loopFormule(-2);

             requestAnimationFrame(() => {
                imgs.forEach(img => {
                    img.style.transition = 'opacity 4.5s ease, transform 0.5s ease';
                });

                // LEFT IMAGE
                imgs[0].src = testimonials_array[prevActiveIndex].src;
                imgs[0].style.opacity = 0.7;
                imgs[0].style.transform = 'scale(0.9)';

                // CENTER IMAGE (ACTIVE)
                imgs[1].src = testimonials_array[activeIndex].src;
                imgs[1].style.opacity = 1;
                imgs[1].style.transform = 'scale(1)';

                // RIGHT IMAGE
                imgs[2].src = testimonials_array[nextActiveIndex].src;
                imgs[2].style.opacity = 0.7;
                imgs[2].style.transform = 'scale(0.9)';
            });
             
          }
          
          if(modele_type == "style_1"){
            testimonials_array.forEach((testimonial, index) => {

                let img = imgs.querySelector(`[data-index="${index}"]`);
             
                if (!img) {
                    img = document.createElement('img');
                    img.src = testimonial.src;
                    img.alt = testimonial.name;
                    img.classList.add('-xstudioapp-widget-testimonial-image');
                    img.dataset.index = index;
                    imgs.appendChild(img);
                }

                const offset       = index - activeIndex;   
                const absOffset    = Math.abs(offset);
                const zIndex       = testimonials_array.length - absOffset;
                const opacity      =  index === activeIndex ? 1 : 0.7;
                const scale        = 1 - (absOffset * 0.15);
                const translateY   = offset === -1 ? '-20%'  : offset === 1 ? '20%'    : '0%';
                const rotateY      = offset === -1 ? '15deg' : offset === 1 ? '-15deg' : '0deg';

                img.style.zIndex = zIndex;
                img.style.opacity = opacity;
                img.style.transform = `translateY(${translateY}) scale(${scale}) rotateY(${rotateY})`;
        });
      }

      quote.innerHTML   = testimonials_array[activeIndex].quote.split(' ')
        .map(word => `<span class="-xstudioapp-widget-word">${word}</span>`).join(' ');
      animateWords() // run animation 
    }
      
       // =====================================
       // next and prev function 
       // ====================================

       const next = ()=>{

         updateTestimonial(1);
       }
      

       const prev = ()=>{
            updateTestimonial(-1);
       }

       nextButton.addEventListener("click", next);
       prevButton.addEventListener("click", prev);

       updateTestimonial(0);   // init the testemonial 

       const autoPlay = setInterval(nextButton, 500);   // interval 

       [nextButton, prevButton].forEach( btn =>{
            btn.addEventListener("click", clearInterval(autoPlay));
       })

  }
  
    if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {
        elementorFrontend.hooks.addAction('frontend/element_ready/xstudioapp_testimonials.default', function($scope){
           runCode();
        });
    }

});