<?php
namespace Affilicious\Theme\Design\Domain\Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class TypographyCustomizer extends AbstractCustomizer
{
	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function init()
	{
		$font_choices = array(
			'serif'          => 'Serif',
			'sans-serif'     => 'Sans Serif',
			'helvetica'      => 'Helvetica',
			'helvetica neue' => 'Helvetica Neue',
			'monospace'      => 'Monospaced',
		);

		$panel = 'afft-typography';

		$panels[] = array(
			'id'       => $panel,
			'title'    => __('Typography', 'affilicious-theme'),
			'priority' => '20'
		);

		$section = 'afft-typography-headline';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Headline', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['afft-typography-headline-font-family'] = array(
			'id'        => 'afft-typography-headline-font-family',
			'label'     => __('Font Family', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'select',
			'choices'   => $font_choices,
			'default'   => 'helvetica neue',
			'transport' => 'postMessage'
		);

		$options['afft-typography-headline-color'] = array(
			'id'        => 'afft-typography-headline-color',
			'label'     => __('Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#000',
			'transport' => 'postMessage',
		);

		$section = 'afft-typography-text';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Text', 'affilicious-theme'),
			'priority' => '11',
			'panel'    => $panel
		);

		$options['afft-typography-text-font-family'] = array(
			'id'        => 'afft-typography-text-font-family',
			'label'     => __('Font Family', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'select',
			'choices'   => $font_choices,
			'default'   => 'helvetica neue',
			'transport' => 'postMessage'
		);

		$options['afft-typography-text-color'] = array(
			'id'        => 'afft-typography-text-color',
			'label'     => __('Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#555',
			'transport' => 'postMessage',
		);

		$options['afft-typography-text-link-color'] = array(
			'id'        => 'afft-typography-text-link-color',
			'label'     => __('Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#3bafda',
			'transport' => 'postMessage',
		);

		$options['afft-typography-text-link-color-hover'] = array(
			'id'        => 'afft-typography-text-link-color-hover',
			'label'     => __('Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#3fc2ea',
			'transport' => 'postMessage',
		);

		$options['sections'] = $sections;
		$options['panels']   = $panels;

		return $options;
	}

	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function render()
	{
		$this->renderSelectors('afft-typography-headline-font-family', function ($mod) {
			$stack = customizer_library_get_font_stack($mod);

			return array(
				'selectors'    => array(
					'h1, h2, h3, h4, h5, h6'
				),
				'declarations' => array(
					'font-family' => $stack
				)
			);
		});

		$this->renderSelectors('afft-typography-headline-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'main h1',
					'main h2',
					'main h3',
					'main h4',
					'main h5',
					'main h6'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('afft-typography-text-font-family', function ($mod) {
			$stack = customizer_library_get_font_stack($mod);

			return array(
				'selectors'    => array(
					'main',
					'main p',
					'main span',
					'main li',
					'main time',
				),
				'declarations' => array(
					'font-family' => $stack
				)
			);
		});

		$this->renderSelectors('afft-typography-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'main',
					'main p',
					'main span',
					'main li',
					'main time',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('afft-typography-link-font-family', function ($mod) {
			$stack = customizer_library_get_font_stack($mod);

			return array(
				'selectors'    => array(
					'main a',
				),
				'declarations' => array(
					'font-family' => $stack
				)
			);
		});

		$this->renderSelectors('afft-typography-text-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'main a:not(.price, .btn)',
                    'main a > span.unit'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('afft-typography-text-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'main a:hover:not(.price, .btn)',
                    'main a > span.unit:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});
	}

	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function enqueueScripts()
	{
		// Font options
		$fonts = array(
			get_theme_mod('afft-typography-headline-font-family', customizer_library_get_default('afft-typography-headline-font-family')),
		);
		$font_uri = customizer_library_get_google_font_uri($fonts);

		// Load Google Fonts
		wp_enqueue_style('fonts', $font_uri, array(), null, 'screen');
	}
}
