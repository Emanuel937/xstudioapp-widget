<?php
namespace XStudioApp\Widgets;

use XStudioApp\WidgetBase\Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class XstudioappBlog extends Base {

    public function get_name() {
        return 'xstudioapp_blog_widget';
    }

    public function get_title() {
        return __('Blog', 'x-studioapp-widget');
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return ['x_studioapp_leading'];
    }

    /**
     * Register widget controls (currently empty)
     */
    protected function register_controls() {
        // You can add controls here later
    }


    public function needJS(){

        return true;
    }
    public function needCSS(){

        return true;
    }
 

    
}
