<?php
class JSscriptRegister {

    public static function xsa_register_script()
    {
        $widgetScripts         = glob(XSTUDIOAPP_PATH . __WIDGET_JS_DIR_PATTERN__);
        $widgetScriptPublicUrl = XSTUDIOAPP_URL . 'build/assets/js/';
   
        foreach ($widgetScripts as $widgetScript) {

            $scriptFileName   = pathinfo($widgetScript, PATHINFO_FILENAME);
            $publicScriptFile = $widgetScriptPublicUrl . $scriptFileName . '.js';
           
            wp_register_script(
                $scriptFileName  ."-js",
                esc_url($publicScriptFile),
                ['jquery', 'elementor-frontend'],
                '1.0.0',
                true
            );
        }
    }
}

add_action('wp_enqueue_scripts', ['JSscriptRegister', 'xsa_register_script']);

