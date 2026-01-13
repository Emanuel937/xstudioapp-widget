<?php

trait Categories{

    public function get_categories_by(string $taxonomy): array {

    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
    ]);

    $cats = [];

    if (!is_wp_error($terms)) {
        foreach ($terms as $term) {
            $cats[$term->term_id] = $term->name;
        }
    }

    return $cats;
}

}