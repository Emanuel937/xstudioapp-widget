<?php
if (!defined('ABSPATH')) exit;

/** @var WP_Query $products */

$settings        = $this->get_settings_for_display(); 
$query_args      = $this->build_query_args($settings); 
$enable_tabs     = $settings['enable_tabs'];
$enable_slider   = $settings['enable_slider'];
$columns         = intval($settings['products_per_page']);
$enable_add_cart = $settings['enable_add_cart'];

$products = new \WP_Query($query_args);

if (!$products instanceof WP_Query) {
    var_dump($product);
    echo "<p>No products found.</p>";
    return;
}
?>

<div class="xsa-product-list-wrapper <?php echo $enable_slider ? 'xsa-has-slider' : ''; ?>">
    <?php if ($enable_tabs && !empty($settings['product_categories'])) : ?>
        <div class="xsa-product-tabs">
            <?php foreach ($settings['product_categories'] as $cat_id) : 
                $term = get_term($cat_id, 'product_cat');
                if (!$term || is_wp_error($term)) continue;
            ?>
                <button class="xsa-tab-button" data-category="<?php echo esc_attr($term->term_id); ?>">
                    <?php echo esc_html($term->name); ?>
                </button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
       <?php if ($enable_slider) : ?>
            <div class="xsa-slider-nav">
                <button class="xsa-prev">Prev</button>
                <button class="xsa-next">Next</button>
            </div>
        <?php endif; ?>
    <div class="xsa-product-list <?php echo $enable_slider ? 'xsa-slider' : 'xsa-grid'; ?>">
        
        
        <?php if ($products->have_posts()) : ?>
            <?php while ($products->have_posts()) : $products->the_post(); ?>
                <?php 
                // Always get WooCommerce product object safely
                $product = wc_get_product(get_the_ID());
                if (!$product) continue;

                $category_ids = wp_get_post_terms(
                    get_the_ID(),
                    'product_cat',
                    ['fields' => 'ids']
                );
                ?>

                <div class="xsa-product-item"
                     data-category-ids="<?php echo esc_attr(implode(',', $category_ids)); ?>">
                    <div class="xsa-product-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo $product->get_image('medium'); ?>
                        </a>
                    </div>
                    <div class="xsa-product-content">
                        <h3 class="xsa-product-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="xsa-product-price">
                            <?php echo $product->get_price_html(); ?>
                        </div>
                        <div class="xsa-product-meta">
                            <?php // Colors, sizes, attributes can be added here ?>
                        </div>
                        <?php if($enable_add_cart): ?>
                        <div class="xsa-product-actions">
                            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                               class="xsa-btn xsa-add-to-cart">
                                <?php echo esc_html__('Add to cart', 'xstudioapp'); ?>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php echo esc_html__('No products found.', 'xstudioapp'); ?></p>
            <?php endif; ?>

    </div>
 

</div>
