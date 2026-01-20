<?php

/*
==============================
WORDPRESS CORE TAXONOMIES
==============================

category        // Categories for posts (hierarchical)
post_tag        // Tags for posts (non-hierarchical)
link_category   // Categories for links (rarely used)
nav_menu        // Navigation menus (specific WP object)
post_format     // Post formats (e.g., standard, gallery, quote)
post_type       // Default for internal custom post types (rarely used via get_terms)


==============================
WOOCOMMERCE TAXONOMIES
==============================

product_cat     // Product categories (hierarchical)
product_tag     // Product tags (non-hierarchical)
pa_*            // Product attributes (e.g., pa_color, pa_size, pa_brand)
                  // All attributes created in WooCommerce are dynamic taxonomies
*/






trait Categories{

    public function get_categories_by(string $taxonomy): array {

    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
    ]);

    $cats = [];

    if (!is_wp_error($terms)) {
        foreach ($terms as $term) {
            $cats[$term->term_id] = ["name"=> $term->name, "slug" =>$term->slug];
        }
    }
   
    return $cats;
}

}