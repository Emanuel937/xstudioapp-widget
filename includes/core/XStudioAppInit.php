<?php
if (!defined('ABSPATH')) exit;

class XStudioAppInit {

    /**
     * Constructor: triggers initialization.
     */
    public function __construct() {
        $this->start();
    }

    // ================================================
    // adding all widgets categories on elementor
    // ===============================================

    private  function registerWidgetCategory(){
        
        add_action('elementor/elements/categories_registered', function($manager) {
            XstudioAppRegisterWidget::setCategory($manager, __('XstudioApp Leading', 'x-studioapp-widget'), 'x_studioapp_leading');
        });
    }

    /**
     * Initialize the Box helper file and register widgets after Elementor is loaded.
     * and categories of widgets
     */
    private function registeWidget() {

        // Register template post type
        // add_action('init', ['Template', 'registerTemplatePostType']);
        // Register Elementor widgets only if Elementor is active
        add_action('elementor/widgets/register', ['XstudioAppRegisterWidget', 'registerActiveWidgets']);
        add_action('elementor/init', function () {
            $file = XSTUDIOAPP_PATH . 'includes/core/Base.php';
          
            if (file_exists($file)) {
                require_once $file;
            }
        });
    }


    private function start() {

        $this->registerWidgetCategory();
        $this->registeWidget();

    }
}

// Instantiate to start plugin
new XStudioAppInit();
