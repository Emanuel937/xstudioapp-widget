<?php
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
    ];
    $query = new WP_Query($args);
    // DATA
    $settings            = $this->get_settings_for_display();
    $read_more           = $settings['xstudioapp_blog_button'];
    $dataIcon            = $settings['xsa_blog_date_icon']['value'] ??  '';
    $max_cat_title       = $settings['xstudioapp_blog_max_cat_title'] ?? 0;
    $max_cat_description = $settings['xstudioapp_blog_max_cat_description'] ?? 0;
    
?>
<div class="xsa_blog">
    <?php if ($query->have_posts()) : ?>
        <input name='max_cat_title'     type="hidden"    value="<?=$max_cat_title?>">
        <input name='max_cat_description'      type="hidden"   value="<?=$max_cat_description?>">
        <div class="widget-slides">
            <?php $index = 0; ?>
            <?php while ($query->have_posts()) : $query->the_post(); $index++; ?>
                <section class="slide <?php echo ($index === 1) ? 'is-active' : ''; ?>" data-slide-index="<?php echo $index; ?>">
                    <div class="slide-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <img 
                                src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" 
                                alt="<?php echo esc_attr(get_the_title()); ?>"
                            >
                        <?php endif; ?>
                    </div>
                    <div class="slide-content">
                        <h3><?php echo esc_html(get_the_title()); ?></h3>
                        <p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                         <div>
                            <button class="read_more"> <?=$read_more;?> </button>
                        </div>
                        <div class="meta">
                            <span class="category">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                }
                                ?>
                            </span>
                            <div>
                                <p class="data-container">
                                    <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                                    <i class="<?=$dataIcon?>"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="widget-thumbnails">
            <?php $query->rewind_posts(); $index = 0; ?>
            <?php while ($query->have_posts()) : $query->the_post(); $index++; ?>
                <?php if (has_post_thumbnail()) : ?>
                    <img 
                        src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" 
                        alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="thumbnail"
                        data-slide-target="<?php echo $index; ?>"
                    >
                <?php endif; ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>
</div>
