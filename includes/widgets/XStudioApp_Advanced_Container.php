<?php
namespace XStudioApp\Widgets;

use Elementor\Controls_Manager;
use XStudioApp\WidgetBase\Base;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) exit;

class Xstudioapp_Advanced_Container extends Base {

    public function get_name() {
        return 'xstudioapp_advanced_container';
    }

    public function get_title() {
        return __('Advanced Container', 'x-studioapp-widget');
    }

    public function get_icon() {
        return 'eicon-section';
    }

    public function get_categories() {
        return ['x_studioapp_leading'];
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'xstudioapp_container_section',
            [
                'label' => __('Container Settings', 'x-studioapp-widget'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'xstudioapp_min_height',
            [
                'label'     => __('Min Height', 'x-studioapp-widget'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [ 'px' => ['min' => 0, 'max' => 2000] ],
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-container' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'xstudioapp_padding',
            [
                'label'      => __('Padding', 'x-studioapp-widget'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .xstudioapp-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'xstudioapp_margin',
            [
                'label'      => __('Margin', 'x-studioapp-widget'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .xstudioapp-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'xstudioapp_opacity',
            [
                'label'     => __('Opacity', 'x-studioapp-widget'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [ 'px' => ['min' => 0, 'max' => 1, 'step' => 0.01] ],
                'default'   => [ 'size' => 1 ],
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-container' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'xstudioapp_blur',
            [
                'label'     => __('Backdrop Blur', 'x-studioapp-widget'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [ 'px' => ['min' => 0, 'max' => 50] ],
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-container' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'xstudioapp_z_index',
            [
                'label'     => __('Z-Index', 'x-studioapp-widget'),
                'type'      => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-container' => 'z-index: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xstudioapp_pointer_events',
            [
                'label'   => __('Pointer Events', 'x-studioapp-widget'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'auto' => __('Auto', 'x-studioapp-widget'),
                    'none' => __('None', 'x-studioapp-widget'),
                ],
                'default' => 'auto',
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-container' => 'pointer-events: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xstudioapp_mix_blend_mode',
            [
                'label'   => __('Mix Blend Mode', 'x-studioapp-widget'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'normal'      => __('Normal', 'x-studioapp-widget'),
                    'multiply'    => __('Multiply', 'x-studioapp-widget'),
                    'screen'      => __('Screen', 'x-studioapp-widget'),
                    'overlay'     => __('Overlay', 'x-studioapp-widget'),
                    'darken'      => __('Darken', 'x-studioapp-widget'),
                    'lighten'     => __('Lighten', 'x-studioapp-widget'),
                    'color-dodge' => __('Color Dodge', 'x-studioapp-widget'),
                    'color-burn'  => __('Color Burn', 'x-studioapp-widget'),
                    'hard-light'  => __('Hard Light', 'x-studioapp-widget'),
                    'soft-light'  => __('Soft Light', 'x-studioapp-widget'),
                    'difference'  => __('Difference', 'x-studioapp-widget'),
                    'exclusion'   => __('Exclusion', 'x-studioapp-widget'),
                ],
                'default'   => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-container' => 'mix-blend-mode: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Background & Border Section
        $this->start_controls_section(
            'xstudioapp_background_border_section',
            [
                'label' => __('Background & Border', 'x-studioapp-widget'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'xstudioapp_background',
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .xstudioapp-container',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'xstudioapp_border',
                'selector' => '{{WRAPPER}} .xstudioapp-container',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'xstudioapp_box_shadow',
                'selector' => '{{WRAPPER}} .xstudioapp-container',
            ]
        );

        $this->end_controls_section();
    }
}
