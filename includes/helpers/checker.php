<?php 

class XSAUpdateChecker{

    static function updateVersion($transient){
        
        delete_site_transient('update_plugins');
        if (empty($transient->checked)) {
            return $transient;
        }

        // Version actuelle du plugin
        $current_version = $transient->checked[__PLUGINS_FILE__];

        // Récupération du JSON distant
        $response = wp_remote_get("https://x-studioapp.fr/plugins/xstudioapp-widget/update.json");

        if (is_wp_error($response)) {
            return $transient;
        }

        $json = json_decode(wp_remote_retrieve_body($response));

        if (!$json) {
            return $transient;
        }

        // Comparer les versions
        if (version_compare($current_version, $json->version, '<')) {

            $plugin_info = new stdClass();
            $plugin_info->slug = 'xstudioapp-widget';
            $plugin_info->plugin = __PLUGINS_FILE__;
            $plugin_info->new_version = $json->version;
            $plugin_info->url = "https://x-studioapp.fr/plugins/xstudioapp-widget/";
            $plugin_info->package = $json->download_url;

            // Injecter dans WordPress
            $transient->response[__PLUGINS_FILE__] = $plugin_info;
        }

        return $transient;
    }
}

add_filter('pre_set_site_transient_update_plugins', ['XSAUpdateChecker', 'updateVersion']);
