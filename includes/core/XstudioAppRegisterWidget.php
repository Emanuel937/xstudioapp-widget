<?php


/**
 *  This class create element register, it is include on the main file 
 *  but is managed by XstudioInit class located in class/phpClass/XstudioInit
 * 
 */

use XStudioApp\Helpers\Template;
if (!defined('ABSPATH')) exit;

class XstudioAppRegisterWidget {

    /**
     * Adds a custom category to Elementor's category manager.
     * @param \Elementor\Categories_Manager $categoryManager Elementor category manager instance
     * @param string $categoryName Human-readable name of the category
     * @param string $slug Unique slug identifier for the category
     */
    public static function setCategory($categoryManager, $categoryName, $slug)
    {
        $categoryManager->add_category(
            $slug,[ 'title' => $categoryName,]
        );
    }
    
    /**
     * Adds a custom category to Elementor's category manager.
     *
     * @param \Elementor\widget_manager $categoryManager Elementor category manager instance
     * @param string[] $activeWidget   Human-readable name of the category
     * @return function 
     */
    private static function getRegisterCallback($widget_manager, ?array $active_widgets = null)
    {
        return function ($instance) use ($widget_manager, $active_widgets) {

            if ($active_widgets !== null) {
                if (!in_array($instance->get_name(), $active_widgets, true)) {
                    return;
                }
            }

            $widget_manager->register($instance);
        };
    }


    /**
     *  Get all instance of widget at once 
     *  @param callable callback function 
     */
    private  static function getWidgetInstace(callable $callback){
        
        $widgetFiles = glob(XSTUDIOAPP_PATH . __WIDGET_PHP_DIR_PATTERN__);
        foreach($widgetFiles   as $file)
        {    

             if(file_exists($file)){

                require_once $file;

                $widgetName                 =  pathinfo($file, PATHINFO_FILENAME );
                $widgetClass                =  __WIDGET_NAMESPACE__ .  $widgetName;
                $widgetInstance             =  new $widgetClass();
                $callback($widgetInstance);

            }else{
            return;
        }
     }


    }
    /**
     * Registers only the active widgets based on saved options.
     *
     * @param \Elementor\Widgets_Manager $widget_manager Elementor widget manager instance
     */
    public static function registerActiveWidgets($widget_manager) {
        
        // get all active widget name 
        $active_widgets = get_option('xstudioapp_active_widgets', []);
        if (!is_array($active_widgets)) {
            $active_widgets = [];
        }
        
        // register widgets on elementor 
        self::getWidgetInstace(
            self::getRegisterCallback($widget_manager, $active_widgets)
        );
    }
        
    
    /**
     * Registers all widgets, regardless of active state.
     *
     * Useful for admin pages that list all widgets for enabling/disabling.
     * this registerAllWidgets is call on the XStudioAppMenu->renderSettingElements()
     * 
     * ******  you can find this class on includes/widget/class/phpClass/menu.php 
     * 
     * @param \Elementor\Widgets_Manager $widget_manager Elementor widget manager instance
     */

    public static function registerAllWidgets($widget_manager) {
         
        self::getWidgetInstace(
            self::getRegisterCallback($widget_manager)
        );
    }
}




 