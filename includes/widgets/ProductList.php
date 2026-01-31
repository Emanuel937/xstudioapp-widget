<?php 

namespace XStudioApp\Widgets;

use XStudioApp\WidgetBase\Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;


if (!defined('ABSPATH')) exit;

class ProductList extends Base {


    public function get_name() {
        return "ProductList";
    }

    public function get_title() {
        return "Product List";
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return ['x_studioapp_leading'];
    }


    public function needJS(){

        return true;
    }
    public function needCSS(){

        return true;
    }

    /**
     * Register content controls
     */
    public function content_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'xstudioapp'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Product categories
        $this->add_control(
            'product_categories',
            [
                'label' => __('Product Categories', 'xstudioapp'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->get_wc_categories(),
                'label_block' => true,
            ]
        );

        // Products per page
        $this->add_control(
            'products_per_page',
            [
                'label' => __('Products Per Page', 'xstudioapp'),
                'type' => Controls_Manager::NUMBER,
                'default' => 4,
                'min' => 1,
                'max' => 24,
            ]
        );

        // Order by
        $this->add_control(
            'order_by',
            [
                'label' => __('Order By', 'xstudioapp'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => __('Date', 'xstudioapp'),
                    'price' => __('Price', 'xstudioapp'),
                    'popularity' => __('Popularity', 'xstudioapp'),
                    'rating' => __('Rating', 'xstudioapp'),
                    'title' => __('Title', 'xstudioapp'),
                ]
            ]
        );

        // Order
        $this->add_control(
            'order',
            [
                'label' => __('Order', 'xstudioapp'),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC' => 'DESC',
                    'ASC'  => 'ASC',
                ]
            ]
        );

        // Enable slider
        $this->add_control(
            'enable_slider',
            [
                'label' => __('Enable Slider', 'xstudioapp'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

       // Enable add cart button
        $this->add_control(
            'enable_add_cart',
            [
                'label' => __('Enable add to cart button', 'xstudioapp'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        // Enable tabs
        $this->add_control(
            'enable_tabs',
            [
                'label' => __('Enable Tabs (by category)', 'xstudioapp'),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Register style controls
     */
    public function style_controls() {

        // ----------------------------------------------
        //  ROWS 
        // ----------------------------------------------

        $this->start_controls_section(
            'product_row',
            [
              'label' => __('Product number', 'xstudioapp'),
              'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'product_column',
            [
                'label' => __('Columns', 'xstudioapp'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 12,
                'default' => 4,
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list.xsa-grid' =>
                        'grid-template-columns: repeat({{VALUE}}, minmax(0, 1fr));',
                ],
            ]
        );

        $this->end_controls_section();
        
        //--------------------------------------
        // NAVIGATION
        // -------------------------------------------
        $this->start_controls_section(
            'xsa_slider_nav_buttons_style',
            [
                'label' => __('Slider Nav Buttons', 'xsa'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'xsa_nav_btn_padding',
            [
                'label' => __('Padding', 'xsa'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'xsa_nav_btn_radius',
            [
                'label' => __('Border Radius', 'xsa'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 200],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'xsa_nav_btn_border_color',
            [
                'label' => __('Border Color', 'xsa'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xsa_nav_btn_bg',
            [
                'label' => __('Background', 'xsa'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav button' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xsa_nav_btn_font_size',
            [
                'label' => __('Font Size', 'xsa'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => ['min' => 8, 'max' => 40],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav button' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'xsa_nav_color_font',
            [
                'label' => __('Icon color', 'xsa'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //-----------------------------------------------
        // NAVIGATION CONTAINER 
        // -----------------------------------------------
        $this->start_controls_section(
            'xsa_slider_nav_container_style',
            [
                'label' => __('Slider Nav Container', 'xsa'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'xsa_nav_container_margin',
            [
                'label' => __('Margin', 'xsa'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'xsa_nav_container_padding',
            [
                'label' => __('Padding', 'xsa'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'xsa_nav_container_bg',
            [
                'label' => __('Background', 'xsa'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-slider-nav' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();



        //------------------------------------------------
        //            Wrapper styles
        //------------------------------------------------
        $this->start_controls_section(
            'wrapper_style_section',
            [
                'label' => __('Wrapper', 'xstudioapp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'wrapper_background',
                'label' => __('Background', 'xstudioapp'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .xsa-product-list-wrapper',
            ]
        );

        // Padding
        $this->add_responsive_control(
            'wrapper_padding',
            [
                'label' => __('Padding', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin
        $this->add_responsive_control(
            'wrapper_margin',
            [
                'label' => __('Margin', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Border & radius
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'wrapper_border',
                'selector' => '{{WRAPPER}} .xsa-product-list-wrapper',
            ]
        );

        $this->add_responsive_control(
            'wrapper_border_radius',
            [
                'label' => __('Border Radius', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * ----------------------------------
         *     Product Item (Card) Styles
         * --------------------------------
         */
        $this->start_controls_section(
            'product_item_style_section',
            [
                'label' => __('Product Item (Card)', 'xstudioapp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'product_item_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item',
            ]
        );

        // Padding
        $this->add_responsive_control(
            'product_item_padding',
            [
                'label' => __('Padding', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item' =>
                        'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin
        $this->add_responsive_control(
            'product_item_margin',
            [
                'label' => __('Margin', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item' =>
                        'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Width
        $this->add_responsive_control(
            'product_item_width',
            [
                'label' => __('Width', 'xstudioapp'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 2000],
                    '%'  => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                    
                ],
            ]
        );

        // Height
        $this->add_responsive_control(
            'product_item_height',
            [
                'label' => __('Height', 'xstudioapp'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vh'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 2000],
                    '%'  => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'product_item_border',
                'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item',
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'product_item_border_radius',
            [
                'label' => __('Border Radius', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item' =>
                        'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Box Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'product_item_box_shadow',
                'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item',
            ]
        );

        // Hover Shadow
        $this->add_control(
            'product_item_hover_heading',
            [
                'label' => __('Hover', 'xstudioapp'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'product_item_hover_shadow',
                'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item:hover',
            ]
        );

        $this->end_controls_section();


        /**
         * ----------------------------------------
         *           Product Image Styles
         * ----------------------------------------
         */

        $this->start_controls_section(
            'product_image_style_section',
            [
                'label' => __('Product Image', 'xstudioapp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Width
        $this->add_responsive_control(
            'product_image_width',
            [
                'label' => __('Width', 'xstudioapp'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 1000],
                    '%'  => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Height
        $this->add_responsive_control(
            'product_image_height',
            [
                'label' => __('Height', 'xstudioapp'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vh'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 1000],
                    '%'  => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-image' => 'height: {{SIZE}}{{UNIT}}; overflow: hidden;',
                    '{{WRAPPER}} .xsa-product-image img' => 'height: 100%; object-fit: cover;',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'product_image_padding',
            [
                'label' => __('Padding', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-image' =>
                        'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin
        $this->add_responsive_control(
            'product_image_margin',
            [
                'label' => __('Margin', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-image' =>
                        'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'product_image_border_radius',
            [
                'label' => __('Border Radius', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-image' =>
                        'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .xsa-product-image img' =>
                        'border-radius: inherit;',
                ],
            ]
        );

        $this->end_controls_section();


        //---------------------------------------------
        //             Product title styles    
        // --------------------------------------------
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Product Title', 'xstudioapp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xsa-product-title',
            ]
        );

        // Padding
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __('Padding', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-title' =>
                        'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-title' =>
                        'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'xstudioapp'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /** 
         * ---------------------------------------------------
         *                Product Price Styles
         * ---------------------------------------------------
         */

        $this->start_controls_section(
            'price_style_section',
            [
                'label' => __('Product Price', 'xstudioapp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-price',
            ]
        );

        // Text Color
        $this->add_control(
            'price_color',
            [
                'label' => __('Color ', 'xstudioapp'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-price .woocommerce-Price-amount .amount bdi' => 'color: {{VALUE}};',
                ],
            ]
        );

         // REGULAR PRICE
        $this->add_control(
            'price_color_regular',
            [
                'label' => __('Color', 'xstudioapp'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'price_padding',
            [
                'label' => __('Padding', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-price' =>
                        'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin
        $this->add_responsive_control(
            'price_margin',
            [
                'label' => __('Margin', 'xstudioapp'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-price' =>
                        'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


     /****
      * --------------------------------------------------
      * ADD TO CART 
      * ---------------------------------------------------
      */

    $this->start_controls_section(
        'add_to_cart_button_style',
        [
            'label' => __('Add To Cart Button', 'xstudioapp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );

    // Typography
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'add_to_cart_button_typography',
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn',
        ]
    );

    // Text Color
    $this->add_control(
        'add_to_cart_button_text_color',
        [
            'label' => __('Text Color', 'xstudioapp'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Background
    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'add_to_cart_button_background',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn',
        ]
    );

    // Padding
    $this->add_responsive_control(
        'add_to_cart_button_padding',
        [
            'label' => __('Padding', 'xstudioapp'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Margin
    $this->add_responsive_control(
        'add_to_cart_button_margin',
        [
            'label' => __('Margin', 'xstudioapp'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Border
    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'add_to_cart_button_border',
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn',
        ]
    );

    // Border Radius
    $this->add_responsive_control(
        'add_to_cart_button_border_radius',
        [
            'label' => __('Border Radius', 'xstudioapp'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn' =>
                    'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Hover Heading
    $this->add_control(
        'add_to_cart_button_hover_heading',
        [
            'label' => __('Hover', 'xstudioapp'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    // Hover Text Color
    $this->add_control(
        'add_to_cart_button_hover_text_color',
        [
            'label' => __('Hover Text Color', 'xstudioapp'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn:hover' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Hover Background
    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'add_to_cart_button_hover_background',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-list .xsa-product-item .xsa-product-content .xsa-product-actions .xsa-btn:hover',
        ]
    );

    $this->end_controls_section();



    /**
     * Tabs Button Styles
     */
    $this->start_controls_section(
        'tabs_button_style',
        [
            'label' => __('Tabs Button', 'xstudioapp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );

    // Typography
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'tabs_button_typography',
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button',
        ]
    );

    // Text Color
    $this->add_control(
        'tabs_button_text_color',
        [
            'label' => __('Text Color', 'xstudioapp'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Background
    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'tabs_button_background',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button',
        ]
    );

    // Padding
    $this->add_responsive_control(
        'tabs_button_padding',
        [
            'label' => __('Padding', 'xstudioapp'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Margin
    $this->add_responsive_control(
        'tabs_button_margin',
        [
            'label' => __('Margin', 'xstudioapp'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Border
    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'tabs_button_border',
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button',
        ]
    );

    // Border Radius
    $this->add_responsive_control(
        'tabs_button_border_radius',
        [
            'label' => __('Border Radius', 'xstudioapp'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button' =>
                    'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Hover Heading
    $this->add_control(
        'tabs_button_hover_heading',
        [
            'label' => __('Hover', 'xstudioapp'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    // Hover Text Color
    $this->add_control(
        'tabs_button_hover_text_color',
        [
            'label' => __('Hover Text Color', 'xstudioapp'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button:hover' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Hover Background
    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'tabs_button_hover_background',
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button:hover',
        ]
    );

    // Hover Border
    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'tabs_button_hover_border',
            'selector' => '{{WRAPPER}} .xsa-product-list-wrapper .xsa-product-tabs .xsa-tab-button:hover',
        ]
    );

    $this->end_controls_section();


        
    }

    /**
     * Register all controls
     */
    protected function _register_controls() {
        $this->content_controls();
        $this->style_controls();
    }

    /**
     * Build WooCommerce product query arguments
     */
    public function build_query_args($settings) {

        $args = [
            'post_type'      => 'product',
            'posts_per_page' => !empty($settings['products_per_page']) ? $settings['products_per_page'] : 4,
            'post_status'    => 'publish',
        ];

        // Categories filter
        if (!empty($settings['product_categories'])) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $settings['product_categories'],
                ]
            ];
        }

        // Order by
        switch ($settings['order_by']) {
            case 'price':
                $args['meta_key'] = '_price';
                $args['orderby']  = 'meta_value_num';
                break;
            case 'popularity':
                $args['meta_key'] = 'total_sales';
                $args['orderby']  = 'meta_value_num';
                break;
            case 'rating':
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby']  = 'meta_value_num';
                break;
            case 'title':
                $args['orderby'] = 'title';
                break;
            default:
                $args['orderby'] = 'date';
        }

        $args['order'] = !empty($settings['order']) ? $settings['order'] : 'DESC';

        return $args;
    }

    /**
     * Get WooCommerce categories
     */
    private function get_wc_categories() {
        $terms = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);
        $options = [];

        if (!is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }

        return $options;
    }
}
