<?php
namespace XStudioApp\Widgets;

use XStudioApp\WidgetBase\Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

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
   

    public function tabStyle() {

    /**
     * ---------------------------------------------------------
     * CONTAINER FLEX SECTIONS (LEFT / RIGHT)
     * ---------------------------------------------------------
     */
        $this->start_controls_section(
            'xsa_blog_container_style',
            [
                'label' => __('Container', 'xstudioapp'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Start tabs wrapper (LEFT / RIGHT)
        $this->start_controls_tabs('xsa_blog_container_tabs');

        /**
         * ---------------------------------------------------------
         * LEFT TAB  (IMAGE CONTAINER)
         * ---------------------------------------------------------
         */
        $this->start_controls_tab(
            'xsa_blog_container_left',
            [
                'label' => __('Left', 'xstudioapp'),
            ]
        );

        // Left container width
        $this->add_responsive_control(
            'xsa_blog_left_width',
            [
                'label' => __('Width', 'xstudioapp'),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'selectors' => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image' =>
                        'width: {{SIZE}}{{UNIT}};',
                        'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        // Left container padding
        $this->add_responsive_control(
            'xsa_blog_left_padding',
            [
                'label'      => __('Padding', 'xstudioapp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors'  => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image' =>
                        'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Left container margin
        $this->add_responsive_control(
            'xsa_blog_left_margin',
            [
                'label'      => __('Margin', 'xstudioapp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors'  => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image' =>
                        'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        // Left container background image
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'xsa_blog_left_bg_image',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image',
            ]
        );

        $this->end_controls_tab();


        /**
         * ---------------------------------------------------------
         * RIGHT TAB  (CONTENT CONTAINER)
         * ---------------------------------------------------------
         */
        $this->start_controls_tab(
            'xsa_blog_container_right',
            [
                'label' => __('Right', 'xstudioapp'),
            ]
        );

        // right container width
        $this->add_responsive_control(
            'xsa_blog_right_width',
            [
                'label' => __('Width', 'xstudioapp'),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'selectors' => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content' =>
                        'width: {{SIZE}}{{UNIT}};',
                        'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        // Right container padding
        $this->add_responsive_control(
            'xsa_blog_right_padding',
            [
                'label'      => __('Padding', 'xstudioapp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors'  => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content' =>
                        'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Right container margin
        $this->add_responsive_control(
            'xsa_blog_right_margin',
            [
                'label'      => __('Margin', 'xstudioapp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors'  => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content' =>
                        'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Right container background image
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'xsa_blog_right_bg_image',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content',
            ]
        );

        $this->end_controls_tab();


        // End tabs wrapper
        $this->end_controls_tabs();
        $this->end_controls_section();

    /**
     * ---------------------------------------------------------
     * MAIN IMAGE STYLE SECTION
     * ---------------------------------------------------------
     */
    $this->start_controls_section(
        'xsa_blog_main_image',
        [
            'label' => __('Main Image', 'xstudioapp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );

    // Image border radius
    $this->add_responsive_control(
        'border_radius',
        [
            'label' => __('Border Radius', 'xstudioapp'),
            'type'  => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image img' =>
                    'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Image width
    $this->add_responsive_control(
        'img_width',
        [
            'label' => __('Width', 'xstudioapp'),
            'type'  => Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'vw'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image img' =>
                    'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Image height
    $this->add_responsive_control(
        'img_height',
        [
            'label' => __('Height', 'xstudioapp'),
            'type'  => Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'vh'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image img' =>
                    'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Image padding
    $this->add_responsive_control(
        'img_padding',
        [
            'label' => __('Padding', 'xstudioapp'),
            'type'  => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image img' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Image margin
    $this->add_responsive_control(
        'img_margin',
        [
            'label' => __('Margin', 'xstudioapp'),
            'type'  => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-image img' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    /**
     * ---------------------------------------------------------
     * CONTENT STYLE SECTION (TITLE + DESCRIPTION TABS)
     * ---------------------------------------------------------
     */
    $this->start_controls_section(
        'xsa_blog_content',
        [
            'label' => __('Content', 'xstudioapp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );

    // Start tabs wrapper 
    $this->start_controls_tabs('xsa_blog_content_tabs');


    /**
     * -------------------------
     * TITLE TAB
     * -------------------------
     */
    $this->start_controls_tab(
        'xsa_blog_content_title',
        [
            'label' => __('Title', 'xstudioapp'),
        ]
    );

    // Title color
    $this->add_control(
        'xsa_blog_title_color',
        [
            'label'     => __('Color', 'xstudioapp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content h3' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Title typography
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'xsa_blog_title_typo',
            'selector' => '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content h3',
        ]
    );

    // Title margin
    $this->add_responsive_control(
        'xsa_blog_title_margin',
        [
            'label'      => __('Margin', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content h3' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Title padding
    $this->add_responsive_control(
        'xsa_blog_title_padding',
        [
            'label'      => __('Padding', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content h3' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_tab();



    /**
     * -------------------------
     * DESCRIPTION TAB
     * -------------------------
     */
    $this->start_controls_tab(
        'xsa_blog_content_description',
        [
            'label' => __('Description', 'xstudioapp'),
        ]
    );

    // Description color
    $this->add_control(
        'xsa_blog_description_color',
        [
            'label'     => __('Color', 'xstudioapp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content p' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Description typography
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'xsa_blog_description_typo',
            'selector' => '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content p',
        ]
    );

    // Description margin
    $this->add_responsive_control(
        'xsa_blog_description_margin',
        [
            'label'      => __('Margin', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content p' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Description padding
    $this->add_responsive_control(
        'xsa_blog_description_padding',
        [
            'label'      => __('Padding', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content p' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    /**
     * -----------------------------------------------
     *  TAB FOR CATEGORIES AND DATE 
     * -----------------------------------------------
     */
    $this->start_controls_tabs('xsa_blog_categories_date');

        $this->start_controls_tab('xsa_blog_categories', [
            'label' => __('categories','xstudioapp')
        ]);

        // Category color
        $this->add_control(
            'xsa_blog_category_color',
            [
                'label'     => __('Color', 'xstudioapp'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .category' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Category typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'xsa_blog_category_typo',
                'selector' => '.xsa_blog .widget-slides .slide .slide-content .meta .category',
            ]
        );

        // category margin
        $this->add_responsive_control(
            'xsa_blog_category_margin',
            [
                'label'      => __('Margin', 'xstudioapp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors'  => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .category' =>
                        'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // category padding
        $this->add_responsive_control(
            'xsa_blog_category_padding',
            [
                'label'      => __('Padding', 'xstudioapp'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors'  => [
                    '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .category' =>
                        'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    $this->end_controls_tab();

    $this->start_controls_tab('xsa_blog_date', [
        'label' => __('Date','xstudioapp')
    ]);
    // ---------------------------------------------------------
    // DATE COLOR
    // ---------------------------------------------------------
    $this->add_control(
        'xsa_blog_date_color',
        [
            'label'     => __('Color', 'xstudioapp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .date' => 'color: {{VALUE}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // DATE TYPOGRAPHY
    // ---------------------------------------------------------
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'xsa_blog_date_typo',
            'selector' => '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .date',
        ]
    );


    // ---------------------------------------------------------
    // DATE MARGIN
    // ---------------------------------------------------------
    $this->add_responsive_control(
        'xsa_blog_date_margin',
        [
            'label'      => __('Margin', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .data-container' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // DATE PADDING
    // ---------------------------------------------------------
    $this->add_responsive_control(
        'xsa_blog_date_padding',
        [
            'label'      => __('Padding', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .data-container' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // DATE ICON SELECTOR
    // ---------------------------------------------------------
    $this->add_control(
        'xsa_blog_date_icon',
        [
            'label'   => __('Icon', 'xstudioapp'),
            'type'    => Controls_Manager::ICONS,
            'default' => [
                'value'   => '',
                'library' => 'solid',
            ],
        ]
    );

    // ---------------------------------------------------------
    // DATE ICON SIZE
    // ---------------------------------------------------------
    $this->add_control(
        'xsa_blog_date_icon_size',
        [
            'label' => __('Icon Size', 'xstudioapp'),
            'type'  => Controls_Manager::SLIDER,
            'size_units' => ['px', 'em', 'rem'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog i' =>
                    'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // ---------------------------------------------------------
    // DATE ICON COLOR
    // ---------------------------------------------------------
    $this->add_control(
        'xsa_blog_date_icon_color',
        [
            'label'     => __('Icon Color', 'xstudioapp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa_blog i' =>
                    'color: {{VALUE}};',
            ],
        ]
    );
  
    // ---------------------------------------------------------
    // DATE BORDER TYPE
    // ---------------------------------------------------------
    $this->add_control(
        'xsa_blog_date_border_type',
        [
            'label'   => __('Border Type', 'xstudioapp'),
            'type'    => Controls_Manager::SELECT,
            'options' => [
                'none'   => __('None', 'xstudioapp'),
                'solid'  => __('Solid', 'xstudioapp'),
                'dashed' => __('Dashed', 'xstudioapp'),
                'dotted' => __('Dotted', 'xstudioapp'),
                'double' => __('Double', 'xstudioapp'),
            ],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .data-container' =>
                    'border-style: {{VALUE}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // DATE BORDER RADIUS
    // ---------------------------------------------------------
    $this->add_responsive_control(
        'xsa_blog_date_border_radius',
        [
            'label'      => __('Border Radius', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .data-container' =>
                    'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // ---------------------------------------------------------
    // DATE BORDER COLOR
    // ---------------------------------------------------------
    $this->add_control(
        'xsa_blog_date_border_color',
        [
            'label'     => __('Border Color', 'xstudioapp'),
            'type'      => Controls_Manager::COLOR,
            'condition' => [
                'xsa_blog_date_border_type!' => 'none',
            ],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .data-container' =>
                    'border-color: {{VALUE}};',
            ],
        ]
    );

    // ---------------------------------------------------------
    // DATE BORDER WIDTH
    // ---------------------------------------------------------
    $this->add_responsive_control(
        'xsa_blog_date_border_width',
        [
            'label'      => __('Border Width', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'condition'  => [
                'xsa_blog_date_border_type!' => 'none',
            ],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-slides .slide .slide-content .meta .data-container' =>
                    'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();

    /**
 * ---------------------------------------------------------
 * THUMBNAILS WRAPPER STYLE
 * ---------------------------------------------------------
 */
    $this->start_controls_section(
        'xsa_blog_thumbnails',
        [
            'label' => __('Thumbains', 'xstudioapp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );

    // Wrapper margin
    $this->add_responsive_control(
        'xsa_blog_thumbnails_margin',
        [
            'label'      => __('Margin', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Wrapper padding
    $this->add_responsive_control(
        'xsa_blog_thumbnails_padding',
        [
            'label'      => __('Padding', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Wrapper height
    $this->add_responsive_control(
        'xsa_blog_thumbnails_height',
        [
            'label' => __('Height', 'xstudioapp'),
            'type'  => Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'vh'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails' =>
                    'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Wrapper background color
    $this->add_control(
        'xsa_blog_thumbnails_bg_color',
        [
            'label'     => __('Background Color', 'xstudioapp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails' =>
                    'background-color: {{VALUE}};',
            ],
        ]
    );

    // Wrapper background image
    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name'     => 'xsa_blog_thumbnails_bg',
            'types'    => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .xsa_blog .widget-thumbnails',
        ]
    );

    $this->end_controls_section();



    /**
     * ---------------------------------------------------------
     * THUMBNAIL ITEM STYLE
     * ---------------------------------------------------------
     */
    $this->start_controls_section(
        'xsa_blog_thumbnail_item',
        [
            'label' => __('Thumbains itens', 'xstudioapp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
    // Thumbnail width
    $this->add_responsive_control(
        'xsa_blog_thumbnail_width',
        [
            'label' => __('Width', 'xstudioapp'),
            'type'  => Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'vw'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails .thumbnail' =>
                    'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Thumbnail height
    $this->add_responsive_control(
        'xsa_blog_thumbnail_height',
        [
            'label' => __('Height', 'xstudioapp'),
            'type'  => Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'vh'],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails .thumbnail' =>
                    'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Thumbnail object-fit
    $this->add_control(
        'xsa_blog_thumbnail_object_fit',
        [
            'label'   => __('Object Fit', 'xstudioapp'),
            'type'    => Controls_Manager::SELECT,
            'options' => [
                'cover'   => __('Cover', 'xstudioapp'),
                'contain' => __('Contain', 'xstudioapp'),
                'fill'    => __('Fill', 'xstudioapp'),
            ],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails .thumbnail' =>
                    'object-fit: {{VALUE}};',
            ],
        ]
    );

    // Thumbnail border radius
    $this->add_responsive_control(
        'xsa_blog_thumbnail_radius',
        [
            'label'      => __('Border Radius', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails .thumbnail' =>
                    'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Thumbnail opacity
    $this->add_control(
        'xsa_blog_thumbnail_opacity',
        [
            'label' => __('Opacity', 'xstudioapp'),
            'type'  => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails .thumbnail' =>
                    'opacity: {{SIZE}};',
            ],
        ]
    );

    // Thumbnail transition
    $this->add_control(
        'xsa_blog_thumbnail_transition',
        [
            'label' => __('Transition (s)', 'xstudioapp'),
            'type'  => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 5,
                    'step' => 0.1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails .thumbnail' =>
                    'transition: opacity {{SIZE}}s;',
            ],
        ]
    );
    // Thumbnail padding
    $this->add_responsive_control(
        'xsa_blog_thumbnail_padding',
        [
            'label'      => __('Padding', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails .thumbnail' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Thumbnail margin
    $this->add_responsive_control(
        'xsa_blog_thumbnail_margin',
        [
            'label'      => __('Margin', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .widget-thumbnails .thumbnail' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();


    /**
     * ---------------------------------------------------------
     * READ MORE STYLE
     * ---------------------------------------------------------
     */
    $this->start_controls_section(
        'xsa_blog_read_more_style',
        [
            'label' => __('Read More', 'xstudioapp'),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );


    // ---------------------------------------------------------
    // TEXT COLOR
    // ---------------------------------------------------------
    $this->add_control(
        'xsa_blog_read_more_color',
        [
            'label'     => __('Text Color', 'xstudioapp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .read_more' => 'color: {{VALUE}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // BACKGROUND
    // ---------------------------------------------------------
    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name'     => 'xsa_blog_read_more_background',
            'types'    => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .xsa_blog .read_more',
        ]
    );


    // ---------------------------------------------------------
    // PADDING
    // ---------------------------------------------------------
    $this->add_responsive_control(
        'xsa_blog_read_more_padding',
        [
            'label'      => __('Padding', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .read_more' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // MARGIN
    // ---------------------------------------------------------
    $this->add_responsive_control(
        'xsa_blog_read_more_margin',
        [
            'label'      => __('Margin', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .read_more' =>
                    'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // BORDER WIDTH
    // ---------------------------------------------------------
    $this->add_responsive_control(
        'xsa_blog_read_more_border_width',
        [
            'label'      => __('Border Width', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .read_more' =>
                    'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // BORDER COLOR
    // ---------------------------------------------------------
    $this->add_control(
        'xsa_blog_read_more_border_color',
        [
            'label'     => __('Border Color', 'xstudioapp'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .xsa_blog .read_more' => 'border-color: {{VALUE}};',
            ],
        ]
    );


    // ---------------------------------------------------------
    // BORDER RADIUS
    // ---------------------------------------------------------
    $this->add_responsive_control(
        'xsa_blog_read_more_border_radius',
        [
            'label'      => __('Border Radius', 'xstudioapp'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem'],
            'selectors'  => [
                '{{WRAPPER}} .xsa_blog .read_more' =>
                    'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );


    $this->end_controls_section();



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
        $this->start_controls_section(
            'xstudioapp_blog_widget_modele',
            ['label'=> 'Modele']
        );
        $this->add_control('xstudioapp_blog_style', [
            'label'    =>'Select Categories',
            'type'     => Controls_Manager::SELECT,
            'default'  =>'style_1',
            'options'  => [
                'style_1' =>  __('style 1', 'xsa'),
                'style_2' =>  __('style 2', 'xsa'),
            ]
        ]);

        $this->end_controls_section();  //
        // adding settiong parameter 
        $this->start_controls_section('xstudioapp_widget_blog_settions', [
            'label' => 'setting'
        ]);
        $this->end_controls_section();
        // button
        $this->start_controls_section('xstudioapp_widget_blog_button', [
            'label' => 'button'
        ]);
        $this->add_control('xstudioapp_blog_button', [
            'label'   => 'text',
            'type'    => Controls_Manager::TEXT,
            'default' => 'READ MORE'
        ]);
        $this->end_controls_section();

        $this->start_controls_section('xstudioapp_widget_blog_text_limit', [
            'label' => 'Text limit'
        ]);
        $this->add_control('xstudioapp_blog_max_cat_title', [
            'label'   => 'title',
            'type'    => Controls_Manager::NUMBER,
            'min'     => 0, 
            'step'    => 1,
        ]);
        $this->add_control('xstudioapp_blog_max_cat_description', [
            'label'   => 'description',
            'type'    => Controls_Manager::NUMBER,
            'min'     => 0, 
            'step' => 1,
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
