<?php
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
    ];

    $query = new WP_Query($args);
?>
<div class="widget-posts">
    <?php if ($query->have_posts()) : ?>
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
                        <div class="meta">
                            <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                            <span class="category">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                }
                                ?>
                            </span>
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
