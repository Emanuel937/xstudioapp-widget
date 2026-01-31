<?php 

class Checker{

    static function updateVersion($transient){

       if (empty($transient->checked)) return $transient;

       $plugins_file     =  $transient->checked[__PLUGINS_FILE__];
       $remote_json      =  wp_remote_get("https://x-studioapp.fr/plugins/xstudioapp-widget/update.json");
       $json_body        = $remote_json;
  
    }

    static function license(){

    }


    static function upgrade(){
    }
}



Checker::license();





add_filter('pre_set_site_transient_update_plugins', ['Checker', 'updateVersion']);
