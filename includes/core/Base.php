<?php
/**
 * Box class automatically renders widget templates and scripts for Elementor widgets.
 */

namespace XStudioApp\WidgetBase;

use Elementor\Widget_Base;
use  XStudioApp\Helpers\FastScripts;

if (!defined('ABSPATH')) exit;

abstract class Base extends Widget_Base {

    private $className;

    public function __construct($data = [], $args = null) {
        
        parent::__construct($data, $args);
        $this->className = strtolower(basename(str_replace('\\', '/', get_class($this))));
        $this->createCssFile();
        $this->createJsFile();
    }


    /**
     * Default widget name
     */
    public function get_name() {
        return 'abstract_box';
    }
    
    /**
     *  this function is to check it widget need js or not
     */
    public function  needJS(){
        return false;
    }
    
    /**
     *  this function is to check it widget need css or not
    */
    public function needCSS(){
        return false;
    }

    /**
     *  creating js file automaticaly 
     *  for each widget 
    */ 
    public function createJsFile()
    {
        if($this->needJS()){
            $js_file = strtolower($this->className) .'.' .'js';
            FastScripts::createFile( XSTUDIOAPP_PATH . 'src/js/widgets/' . $js_file  );
        }
    }

    public function createCssFile(){

        if($this->needCss()){
            $scss_file = strtolower($this->className) .'.' . 'scss' ;
            FastScripts::createFile( XSTUDIOAPP_PATH . 'src/scss/widgets/'  . $scss_file );
        }
 
    }

    /**
     * Default widget title
     */
    public function get_title() {
        return __('Abstract Box', 'x-studioapp-widget');
    }

    /**
     * Default widget icon
     */
    public function get_icon() {
        return 'eicon-box';
    }

    /**
     * Widget category
     */
    public function get_categories() {
        return ['x_studioapp_leading'];
    }

    /**
     * Build full template file path
     */
    public function loadFile(string $folder, string $extension) {
        
        return XSTUDIOAPP_PATH . 'views/' . $folder . '/' . $this->className . $extension;
    }

    /**
     * Define script dependencies for Elementor
     */
    public function get_script_depends() {
        
        if(!$this->needJS()) return [];
        return [strtolower($this->className)  ."-js"];
    }

    /**
     *  set css style 
     */
        /**
     *  set css style 
     */
    public function get_style_depends() {

        if(!$this->needCSS()) return  [];
        $handle = strtolower(basename(str_replace('\\', '/', get_class($this)))) . '-css';
        return  [$handle];
}


    /**
     * Render the widget template
     */
   
    public function render() {

        $this->className = basename(str_replace('\\', '/', get_class($this)));

        $templateFile = $this->loadFile('widgets', 'HTML.php');
        
        if (file_exists($templateFile)) {
             
            include $templateFile;
        } else {

            try {
                $templateHandle = fopen($templateFile, 'w');

                if ($templateHandle === false) {
                    return false;
                }

                fclose($templateHandle);
                chmod($templateFile, 0777);

            } catch (\Exception $error) {
                var_dump($error->getMessage());
            }
        }
    }
}
