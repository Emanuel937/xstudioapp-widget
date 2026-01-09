<?php 
if (!defined('ABSPATH')) exit;

class ErrorMessage{
  
    static public function showError() {
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', function () {
                ?>
                <div class="notice notice-error">
                    <p>
                        <strong><?php echo esc_html__('X-StudioApp Widget', 'x-studioapp-widget'); ?></strong>
                        <?php echo esc_html__('requires', 'x-studioapp-widget'); ?>
                        <a href="<?php echo esc_url('https://wordpress.org/plugins/elementor/'); ?>" target="_blank">
                            <?php echo esc_html__('Elementor', 'x-studioapp-widget'); ?>
                        </a>
                        <?php echo esc_html__('to be installed and activated.', 'x-studioapp-widget'); ?>
                    </p>
                </div>
                <?php
            });

            return; 
        }
}


 // verifiy it any theme is installed
  static public function isThemeInstalled() {
    $theme = wp_get_theme();

    if ( ! $theme->exists() ) {
        add_action('admin_notices', function() {
            ?>
            <div class="notice notice-error">
                <p>
                    <?php
                    // Escaped and translatable
                    echo esc_html__( 'No theme is installed. A theme is required for WordPress to work correctly.', 'x-studioapp-widget' );
                    ?>
                </p>
            </div>
            <?php
        });
    }
}


}

ErrorMessage::showError();
ErrorMessage::isThemeInstalled();