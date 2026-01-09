<?php

namespace XStudioApp\ThemeHook;

use Elementor\Plugin;
use XStudioApp\Utils\Utils;

if (!defined('ABSPATH')) exit;

/**
 * Astra theme compatibility class.
 */
class Astra {

	private $elementor;
	private $header;
	private $footer;
	private $single;
	private $editor_mode;

	public function __construct($templates = []) {
		[$this->header, $this->footer, $this->single] = $templates;
		$this->editor_mode = defined('ELEMENTOR_VERSION') && Plugin::$instance->editor->is_edit_mode();

		// Elementor instance
		if (defined('ELEMENTOR_VERSION') && is_callable(['Elementor\\Plugin', 'instance'])) {
			$this->elementor = Plugin::instance();
		}

		// Header actions
		if ($this->header) {
			add_action('template_redirect', [$this, 'remove_theme_header']);
			add_action('astra_header', [$this, 'render_header']);
		}

		// Footer actions
		if ($this->footer) {
			add_action('template_redirect', [$this, 'remove_theme_footer']);
			add_action('astra_footer', [$this, 'render_footer']);
		}

		// Single post template override
		if ($this->single) {
			add_filter('template_include', [$this, 'override_single_content']);
		}
	}

	/**
	 * Remove default Astra header
	 */
	public function remove_theme_header() {
		remove_action('astra_header', 'astra_header_markup');
	}

	/**
	 * Render Elementor header
	 */
	public function render_header() {
		if (!$this->header) return;

		echo '<div class="ekit-template-content-markup ekit-template-content-header">';
		echo wp_kses_post(Utils::render_elementor_content($this->header));
		echo '</div>';
	}

	/**
	 * Remove default Astra footer
	 */
	public function remove_theme_footer() {
		remove_action('astra_footer', 'astra_footer_markup');
	}

	/**
	 * Render Elementor footer
	 */
	public function render_footer() {
		if (!$this->footer) return;

		do_action('elementskit/template/before_footer');

		echo '<div class="ekit-template-content-markup ekit-template-content-footer">';
		echo wp_kses_post(Utils::render_elementor_content($this->footer));
		echo '</div>';

		do_action('elementskit/template/after_footer');
	}

	/**
	 * Override single post content with Elementor templates
	 */
	public function override_single_content($content) {

		if (!is_single() || !$this->single) {
			return $content;
		}

		// Only render for non-preview mode
		if (!isset($_GET['elementor-preview'])) {
			wp_head();

			// Header
			if ($this->header) {
				echo '<div class="ekit-template-content ekit-header">';
				echo wp_kses_post(Utils::render_elementor_content($this->header));
				echo '</div>';
			}

			// Single content
			echo '<main class="ekit-template-content ekit-single">';
			echo wp_kses_post(Utils::render_elementor_content($this->single));
			echo '</main>';

			// Footer
			if ($this->footer) {
				do_action('elementskit/template/before_footer');
				echo '<div class="ekit-template-content ekit-footer">';
				echo wp_kses_post(Utils::render_elementor_content($this->footer));
				echo '</div>';
				do_action('elementskit/template/after_footer');
			}

			wp_footer();
		}

		return ''; // Prevent default template
	}
}
