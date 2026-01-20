<?php

trait Post{
  
    // get all post 
    //get all post by categories 
    public function get_posts_by(
        
        string|array|null $terms = null,
        int $posts_per_page = -1,
        string $post_type = 'post'): array {

    $query = [
        'post_type'      => $post_type,
        'posts_per_page' => $posts_per_page,
        'post_status'    => 'publish',
    ];

    if ($terms) {

        if (strtolower($post_type) === 'post') {
            $query['tax_query'] = [
                [
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => (array) $terms,
                ]
            ];
        }

        if (strtolower($post_type) === 'product') {
            $query['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => (array) $terms,
                ]
            ];
        }
    }

    return get_posts($query);
}

}