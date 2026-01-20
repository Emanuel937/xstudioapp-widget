<?php

add_action('elementor/frontend/after_register_styles', function() {
    wp_enqueue_style(
        'xstudioapp-fa',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        [],
        null
    );
});