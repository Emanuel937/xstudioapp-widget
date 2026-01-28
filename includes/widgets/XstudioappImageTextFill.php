<?php

namespace XStudioApp\Widgets;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use XStudioApp\WidgetBase\Base;

if (!defined('ABSPATH')) exit;

class XstudioappImageTextFill extends Base {

    public function get_name() {
        return 'image_text_fill';
    }

    public function get_title() {
        return __('Image Text Fill', 'x-studioapp-widget');
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return ['x_studioapp_leading'];
    }

    /**
     * ------------------------------------
     *    Register Elementor controls
     */
    protected function register_controls() {

        // Content section
        $this->start_controls_section(
            'xstudioapp_content_section',
            [
                'label' => __('Content', 'x-studioapp-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'xstudioapp_text',
            [
                'label' => __('Text', 'x-studioapp-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Texte Rempli',
                'placeholder' => __('Enter your text', 'x-studioapp-widget'),
            ]
        );

        $this->add_control(
            'xstudioapp_image_fill',
            [
                'label' => __('Image Fill', 'x-studioapp-widget'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://fr.x-studioapp.com/wp-content/uploads/2025/07/stunning-8166666_1280.jpg',
                ],
            ]
        );

        $this->add_control(
            'xstudioapp_background_position',
            [
                'label' => __('Image Position', 'x-studioapp-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'center center',
                'options' => [
                    'left top' => __('Left Top', 'x-studioapp-widget'),
                    'left center' => __('Left Center', 'x-studioapp-widget'),
                    'left bottom' => __('Left Bottom', 'x-studioapp-widget'),
                    'center top' => __('Center Top', 'x-studioapp-widget'),
                    'center center' => __('Center Center', 'x-studioapp-widget'),
                    'center bottom' => __('Center Bottom', 'x-studioapp-widget'),
                    'right top' => __('Right Top', 'x-studioapp-widget'),
                    'right center' => __('Right Center', 'x-studioapp-widget'),
                    'right bottom' => __('Right Bottom', 'x-studioapp-widget'),
                ],
            ]
        );

        $this->end_controls_section();

        // Style section  -----------------------------------------
        //  -------------------------------------------------------

        $this->start_controls_section(
            'xstudioapp_style_section',
            [
                'label' => __('Text Style', 'x-studioapp-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'xstudioapp_typography',
                'selector' => '{{WRAPPER}} .image-text-fill',
            ]
        );

        $this->add_control(
            'xstudioapp_text_align',
            [
                'label' => __('Text Align', 'x-studioapp-widget'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'x-studioapp-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'x-studioapp-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'x-studioapp-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .image-text-fill' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xstudioapp_text_size',
            [
                'label' => __('Text Size', 'x-studioapp-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 60,
                ],
                'range' => [
                    'px' => ['min' => 10, 'max' => 200],
                    'em' => ['min' => 0.5, 'max' => 10],
                    '%' => ['min' => 10, 'max' => 300],
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-text-fill' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

}
