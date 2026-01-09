<?php 
if (!defined('ABSPATH')) exit;

$settings        = $this->get_settings_for_display();
$testimonials    = $settings['testimonials'];
$prevButtonIcon  = $settings['prev_icon']['value'];
$nextButtonIcon  = $settings['next_icon']['value'];

$modele_type     = $settings["modele_type"];

$data = [];

foreach($testimonials as $testimonial){


    $data[] = [
        "name"          => $testimonial['name'],
        "quote"         => $testimonial['text'],
         "src"          => $testimonial['image']['url'],
        "designation"   => $testimonial['designation'],
        "notation"      => $testimonial['notation']['size']  
     ];
}


$testimonials = json_encode($data);

?>

<input type="hidden"  id="xstudioapp_testemonial" data-info ="<?=htmlspecialchars($testimonials)?>">
<input type="hidden"  id="xstudioapp_testemonial_style" data-info ="<?=htmlspecialchars($modele_type)?>">

<?php if($modele_type == "style_1"): ?>
<div class="-xstudioapp-widget-container">
    <div class="-xstudioapp-widget-testimonial-container style_1">
        <div class="-xstudioapp-widget-testimonial-grid">
            <div class="-xstudioapp-widget-image-container" id="image-container"></div>
            <div class="-xstudioapp-widget-testimonial-content">
                <div>
                    <h3 class="-xstudioapp-widget-name" id="name"></h3>
                    <p class="-xstudioapp-widget-designation" id="designation"></p>
                    <p class="-xstudioapp-widget-quote" id="quote"></p>
                </div>
                <div class="-xstudioapp-widget-arrow-buttons">
                    <button class="-xstudioapp-widget-arrow-button -xstudioapp-widget-prev-button" id="prev-button">
                        <i class="<?=$prevButtonIcon?>"></i>
                    </button>
                    <button class="-xstudioapp-widget-arrow-button -xstudioapp-widget-next-button" id="next-button">
                      <i class="<?=$nextButtonIcon?>"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<?php if($modele_type == "style_2"): ?>
 <div class="-xstudioapp-widget-testimonial-container style_2">
    <div>
        <h3 class="-xstudioapp-widget-name" id="name"></h3>
        <p class="-xstudioapp-widget-quote" id="quote"></p>
    </div>
    <div class="leftSide">
        <div>
            <img class="image-container img"/>
            <div class="active_section"> 
                <img class="image-container active img"/>
                <span></span>
            </div>
            <img class="image-container img"/>
        </div>
        <div class="navigation">
            <button class="-xstudioapp-widget-arrow-button -xstudioapp-widget-prev-button" id="prev-button">
                <i class="<?=$prevButtonIcon?>"></i>
            </button>
            <button class="-xstudioapp-widget-arrow-button -xstudioapp-widget-next-button" id="next-button">
                <i class="<?=$nextButtonIcon?>"></i>
            </button>
        </div>
   </div>
</div>
<?php endif ?>
