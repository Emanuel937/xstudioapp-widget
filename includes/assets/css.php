<?php
class StyleRegister {

    public static function xsa_register_style() {

        // Get all CSS files for widgets 
        // and register them

        $widgetStyles         = glob(XSTUDIOAPP_PATH . __WIDGET_CSS_DIR_PATTERN__);
        $widgetStylePublicUrl = XSTUDIOAPP_URL . 'build/assets/css/';

        foreach ($widgetStyles as $widgetStyle) {
            $styleFileName   = pathinfo($widgetStyle, PATHINFO_FILENAME);
            $publicStyleFile = $widgetStylePublicUrl . $styleFileName . '.css';

            wp_register_style(
                $styleFileName . "-css",
                esc_url($publicStyleFile),
                ['elementor-frontend'],
                '1.0.0'
            );
        }
    }
}


add_action('wp_head', ['StyleRegister', 'xsa_register_style']);



