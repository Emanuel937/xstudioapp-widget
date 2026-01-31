jQuery(document).ready(function($){

    // Tabs filter
    const xstudioappProductList = ()=>{

        document.querySelectorAll('.xsa-product-tabs').forEach(function (tabsWrapper) {

            const buttons = tabsWrapper.querySelectorAll('.xsa-tab-button');
            const wrapper = tabsWrapper.closest('.xsa-product-list-wrapper');
            const items   = wrapper.querySelectorAll('.xsa-product-item');

            buttons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const catId = this.getAttribute('data-category');

                    buttons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    items.forEach(function (item) {
                        const cats = item.getAttribute('data-category-ids').split(',');
                        if (cats.includes(catId)) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });

    // slider button animations

  
    const wrappers = document.querySelectorAll('.xsa-has-slider');

          wrappers.forEach((wrapper)=>{
            
            // itens to apply transform: translateX();
           let index          = 0;
           const list         =   wrapper.querySelectorAll(".xsa-product-item");
           const nextButton   =   wrapper.querySelector(".xsa-slider-nav .xsa-next");
           const prevButton   =   wrapper.querySelector(".xsa-slider-nav .xsa-prev");
    
           const update = ()=>{

             list.forEach((iten)=>{
                  const offset          = -(index * iten.offsetWidth);
                  iten.style.transform  = `translateX(${offset}px)`; 
                  iten.style.transition = "transform 0.3s ease";
             });
             console.log(index);
           }

           const nextItem =()=>{
                index = (index + 1) % list.length; 
                update();
           }

           const prevItem =()=>{

                index = (index -1 + list.length) % list.length;
                update();
           }


           nextButton.addEventListener("click", nextItem);
           prevButton.addEventListener("click", prevItem)

          });
    }

    // ---------------------------------------------------------
    if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {
            elementorFrontend.hooks.addAction('frontend/element_ready/ProductList.default', 
            function($scope){
            xstudioappProductList();
            });
    }

});
