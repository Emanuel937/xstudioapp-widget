<?php
namespace XStudioApp\Widgets;

use XStudioApp\WidgetBase\Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Xstudioapp_Hexagons extends Base {

    public function get_name() {
        return 'xstudioapp_hexagon';
    }

    public function get_title() {
        return __('Hexagon', 'x-studioapp-widget');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['x_studioapp_leading'];
    }

    protected function register_controls() {

        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'x-studioapp-widget'),
            ]
        );

        $this->add_control(
            'hex_title',
            [
                'label' => __('Title', 'x-studioapp-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Title here', 'x-studioapp-widget'),
            ]
        );

        $this->add_control(
            'hex_link',
            [
                'label' => __('Link', 'x-studioapp-widget'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://...',
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true
                ],
            ]
        );

        $this->add_control(
            'hex_image',
            [
                'label' => __('Background Image', 'x-studioapp-widget'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'hex_bg_color',
            [
                'label' => __('Background Color (if no image)', 'x-studioapp-widget'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(255, 255, 255, 0.08)',
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-hexagon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'x-studioapp-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'hex_width',
            [
                'label' => __('Width', 'x-studioapp-widget'),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 170],
                'range' => ['px' => ['min' => 100, 'max' => 500]],
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-hexagon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hex_height',
            [
                'label' => __('Height', 'x-studioapp-widget'),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 196],
                'range' => ['px' => ['min' => 100, 'max' => 600]],
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-hexagon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hex_padding',
            [
                'label' => __('Padding', 'x-studioapp-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => ['top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0],
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-hexagon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hex_overlay_blur',
            [
                'label' => __('Overlay Blur (px)', 'x-studioapp-widget'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'min' => 0,
                'max' => 20,
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-hexagon-overlay' => 'backdrop-filter: blur({{VALUE}}px);',
                ],
            ]
        );

        $this->add_control(
            'hex_overlay_bg_opacity',
            [
                'label' => __('Overlay Opacity (%)', 'x-studioapp-widget'),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 10],
                'range' => [
                    'px' => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xstudioapp-hexagon-overlay' => 'opacity: calc({{SIZE}} / 100);',
                ],
                'description' => __('0 = transparent, 100 = opaque', 'x-studioapp-widget'),
            ]
        );

        $this->end_controls_section();
    }
}
