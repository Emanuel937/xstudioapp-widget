<?php
if (!defined('ABSPATH')) exit;

use xstudioapp\activetemplate\RenderActiveTemplate;

class Template {

    private $newId  = null;
    private $action = null;

    /**
     * Register custom post type for templates
     */
    public static function registerTemplatePostType() {
        register_post_type('x-studioapp_template', [
            'labels' => [
                'name'          => __('Templates X-StudioApp', 'x-studioapp-widget'),
                'singular_name' => __('X-StudioApp Template', 'x-studioapp-widget'),
            ],
            'public'        => true,
            'show_in_rest'  => true,
            'show_ui'       => true,
            'supports'      => ['title', 'editor'], // Removed 'elementor'
            'map_meta_cap'  => true,
            'capability_type' => 'post',
        ]);
    }

    /**
     * Check if the request is POST
     */
    private static function checkServerMethod() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Create a new template
     */
    public static function createTemplate($templateName, $templateType) {
        if (!self::checkServerMethod()) return;

        $templateName = sanitize_text_field($templateName);
        $templateType = sanitize_text_field($templateType);

        $newId = wp_insert_post([
            'post_type'   => 'x-studioapp_template',
            'post_title'  => $templateName,
            'post_status' => 'draft',
            'meta_input'  => [
                '_xsa_template_type' => $templateType,
            ]
        ]);

        self::alert(!is_wp_error($newId));

        return $newId;
    }

    /**
     * Display success or error notice
     */
    private static function alert($status) {
        add_action('admin_notices', function() use ($status) {
            if ($status) {
                ?>
                <div class="notice notice-success is-dismissible">
                    <p><?php echo esc_html__('Template saved successfully!', 'x-studioapp-widget'); ?></p>
                </div>
                <?php
            } else {
                ?>
                <div class="notice notice-error is-dismissible">
                    <p><?php echo esc_html__('Error: Could not create template.', 'x-studioapp-widget'); ?></p>
                </div>
                <?php
            }
        });
    }

    /**
     * Get all template posts
     */
    public static function allTemplateList() {
        $query = new WP_Query([
            'post_type'      => 'x-studioapp_template',
            'posts_per_page' => -1,
            'post_status'    => ['publish', 'draft'],
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);

        $all_templates = [];

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $all_templates[] = [
                    'ID'     => get_the_ID(),
                    'title'  => get_the_title(),
                    'status' => get_post_status(),
                    'type'   => get_post_meta(get_the_ID(), '_xsa_template_type', true),
                    'date'   => get_the_date(),
                ];
            }
            wp_reset_postdata();
            return $all_templates;
        }

        return false;
    }

    /**
     * Generate a secure delete URL
     */
    public static function getDeleteUrl($templateId) {
        return wp_nonce_url(
            admin_url('admin-post.php?action=xsa_delete_template&template_id=' . absint($templateId)),
            'xsa_delete_template_action'
        );
    }

    /**
     * Delete a template
     */
    public static function deleteTemplate($templateId) {
        return wp_delete_post(absint($templateId), true);
    }

    /**
     * Handle deletion via admin-post.php
     */
    public static function handleDelete() {
        if (!isset($_GET['template_id'], $_GET['_wpnonce'])) {
            wp_die(__('Missing parameters.', 'x-studioapp-widget'));
        }

        $templateId = absint($_GET['template_id']);

        if (!wp_verify_nonce($_GET['_wpnonce'], 'xsa_delete_template_action')) {
            wp_die(__('Invalid nonce.', 'x-studioapp-widget'));
        }

        $deleted = wp_delete_post($templateId, true);

        $redirect_url = add_query_arg(
            'xsa_status',
            $deleted ? 'deleted' : 'error',
            admin_url('admin.php?page=xstudioapp_templates')
        );

        wp_safe_redirect($redirect_url);
        exit;
    }

    /**
     * Activate/deactivate templates based on selected IDs
     */
    public static function handleActivationToggle($activeIDs = []) {
        $allTemplates = self::allTemplateList();
        if (!$allTemplates) return;

        // Group templates by type
        $groupedByType = [];
        foreach ($allTemplates as $tpl) {
            $groupedByType[$tpl['type']][] = $tpl['ID'];
        }

        foreach ($groupedByType as $type => $ids) {
            $activeId = in_array($ids[0], $activeIDs) ? $ids[0] : false;

            if ($activeId) {
                update_option("xsa_active_{$type}_template", $activeId);
            } else {
                delete_option("xsa_active_{$type}_template");
            }

            foreach ($ids as $id) {
                update_post_meta($id, '_xsa_is_active', in_array($id, $activeIDs) ? '1' : '0');
            }
        }
    }

    /**
     * Show notice if Elementor is not active
     */
    public static function showElementorNotice() {
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', function() {
                ?>
                <div class="notice notice-error">
                    <p>
                        <strong><?php echo esc_html__('X-StudioApp Widget', 'x-studioapp-widget'); ?></strong>
                        <?php echo esc_html__('requires', 'x-studioapp-widget'); ?>
                        <a href="<?php echo esc_url('https://wordpress.org/plugins/elementor/'); ?>" target="_blank">
                            <?php echo esc_html__('Elementor', 'x-studioapp-widget'); ?>
                        </a>
                        <?php echo esc_html__('to be installed and activated.', 'x-studioapp-widget'); ?>
                    </p>
                </div>
                <?php
            });
            return;
        }
    }
}

// Initialize
add_action('init', ['Template', 'registerTemplatePostType']);
add_action('admin_post_xsa_delete_template', ['Template', 'handleDelete']);
Template::showElementorNotice();
