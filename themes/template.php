<?php

namespace XStudioApp;

if (!defined('ABSPATH')) exit;

class Templates {

    /**
     * Render a full template with header, footer, and main content
     *
     * @param int|string $header Header template ID
     * @param int|string $footer Footer template ID
     * @param int|string $template Main template ID
     */
    public function renderTemplate($header, $footer, $template) {

        // Begin output
        $output = '<div class="ekit-template-content-markup">';

        // Render header
        if ($header) {
            $output .= '<div class="ekit-header">';
            $output .= wp_kses_post(Utils::render_elementor_content($header));
            $output .= '</div>';
        }

        // Render main content
        if ($template) {
            $output .= '<main class="ekit-single">';
            $output .= wp_kses_post(Utils::render_elementor_content($template));
            $output .= '</main>';
        }

        // Render footer
        if ($footer) {
            $output .= '<div class="ekit-footer">';
            $output .= wp_kses_post(Utils::render_elementor_content($footer));
            $output .= '</div>';
        }

        $output .= '</div>';

        // Output safely
        echo $output;
    }
}
