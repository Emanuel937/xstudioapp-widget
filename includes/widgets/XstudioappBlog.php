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

    public function tabStyle(){

    }
    private function get_blog_categories() {
    
        $categories = get_categories([
            'hide_empty' => false,
        ]);
        $options = [];
        foreach ($categories as $category) {
            $options[$category->term_id] = $category->name;
        }
        return $options;
    }


    /**
     * Register widget controls (currently empty)
     */
    protected function register_controls() {

        //select categories to query on 
        $this->start_controls_section('xstudioapp_blog_widget', [
            'label' =>'categories'
        ]);
        
        $this->add_control('xstudioapp_blog_modele', [
            'label'    =>'Select Categories',
            'type'     => Controls_Manager::SELECT,
            'default'  =>'style_1',
            'options'  => $this->get_blog_categories()
        ]);

        $this->end_controls_section();

        //select the type of it 
        $this->start_controls_section('xstudioapp_blog_widget_modele',
        ['label'=> 'Modele']);

        $this->add_control('xstudioapp_blog_style', [
            'label'    =>'Select Categories',
            'type'     => Controls_Manager::SELECT,
            'default'  =>'style_1',
            'options'  => [
                'style_1' =>  __('style 1', 'xsa'),
                'style_2' =>  __('style 2', 'xsa'),
            ]
        ]);

        $this->end_controls_section();

        // adding settiong parameter 
        $this->start_controls_section('xstudioapp_widget_blog_settions', [
            'label' => 'setting'
        ]);
        $this->end_controls_section();

        // end 
        // set all style here 
        $this->tabStyle();
    }


    public function needJS(){

        return true;
    }
    public function needCSS(){

        return true;
    }
 

    
}
