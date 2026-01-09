<?php

namespace XStudioApp\Widgets;

use XStudioApp\WidgetBase\Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit;

class X_List_Widget extends Base {

    public function get_name() {
        return 'x_list_widget';
    }

    public function get_title() {
        return 'X List Widget';
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return ['x_studioapp_leading'];
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'x-studioapp-widget'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label'   => __('Image', 'x-studioapp-widget'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://via.placeholder.com/80',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Title', 'x-studioapp-widget'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Content Title', 'x-studioapp-widget'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => __('Description', 'x-studioapp-widget'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __('The content description goes here.', 'x-studioapp-widget'),
            ]
        );

        $this->end_controls_section();

        // Style: Container
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Container Style', 'x-studioapp-widget'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label'     => __('Background Color', 'x-studioapp-widget'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .x-list-type' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'padding',
            [
                'label'     => __('Padding', 'x-studioapp-widget'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => ['px' => ['min' => 0, 'max' => 50]],
                'default'   => ['size' => 16],
                'selectors' => [
                    '{{WRAPPER}} .x-list-type' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label'     => __('Border Radius', 'x-studioapp-widget'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => ['px' => ['min' => 0, 'max' => 50]],
                'default'   => ['size' => 12],
                'selectors' => [
                    '{{WRAPPER}} .x-list-type' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style: Title
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Title Style', 'x-studioapp-widget'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __('Title Color', 'x-studioapp-widget'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .x-list-type h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .x-list-type h3',
            ]
        );

        $this->end_controls_section();

        // Style: Description
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => __('Description Style', 'x-studioapp-widget'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     => __('Description Color', 'x-studioapp-widget'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#555555',
                'selectors' => [
                    '{{WRAPPER}} .x-list-type p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'description_typography',
                'selector' => '{{WRAPPER}} .x-list-type p',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output in frontend
     */
   
}
