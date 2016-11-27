<?php
namespace Affilicious_Theme\Design\Domain\Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class Footer_Customizer extends Abstract_Customizer
{
	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function init()
	{
		$panel = 'afft-footer';

		$panels[] = array(
			'id'       => $panel,
			'title'    => __('Footer', 'affilicious-theme'),
			'priority' => '50',
		);

		$section = 'afft-footer-general';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('General', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['afft-footer-general-background-color-top'] = array(
			'id'        => 'afft-footer-general-background-color-top',
			'label'     => __('Background Color (Top)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#434a54',
			'transport' => 'postMessage',
		);

		$options['afft-footer-general-background-color-bottom'] = array(
			'id'        => 'afft-footer-general-background-color-bottom',
			'label'     => __('Background Color (Bottom)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#434a54',
			'transport' => 'postMessage',
		);

		$options['afft-footer-general-logo-color'] = array(
			'id'        => 'afft-footer-general-logo-color',
			'label'     => __('Logo Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#fff',
			'transport' => 'postMessage',
		);

		$options['afft-footer-general-copyright-color'] = array(
			'id'        => 'afft-footer-general-copyright-color',
			'label'     => __('Copyright Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#aab2bd',
			'transport' => 'postMessage',
		);

		$section = 'afft-footer-breadcrumbs';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Breadcrumbs', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['afft-footer-breadcrumbs-background-color-top'] = array(
			'id'        => 'afft-footer-breadcrumbs-background-color-top',
			'label'     => __('Background Color (Top)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#f8f8f8',
			'transport' => 'postMessage',
		);

		$options['afft-footer-breadcrumbs-background-color-bottom'] = array(
			'id'        => 'afft-footer-breadcrumbs-background-color-bottom',
			'label'     => __('Background Color (Bottom)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#f8f8f8',
			'transport' => 'postMessage',
		);

		$options['afft-footer-breadcrumbs-border-color'] = array(
			'id'        => 'afft-footer-breadcrumbs-border-color',
			'label'     => __('Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#e7e7e7',
			'transport' => 'postMessage',
		);

		$options['afft-footer-breadcrumbs-text-color'] = array(
			'id'        => 'afft-footer-breadcrumbs-text-color',
			'label'     => __('Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#797979',
			'transport' => 'postMessage',
		);

		$options['afft-footer-breadcrumbs-link-color'] = array(
			'id'        => 'afft-footer-breadcrumbs-link-color',
			'label'     => __('Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#797979',
			'transport' => 'postMessage',
		);

		$options['afft-footer-breadcrumbs-link-color-hover'] = array(
			'id'        => 'afft-footer-breadcrumbs-link-color-hover',
			'label'     => __('Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#4fc1e9',
			'transport' => 'postMessage',
		);

		$section = 'afft-footer-bottom-menu';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Bottom Menu', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['afft-footer-bottom-menu-title-color'] = array(
			'id'        => 'afft-footer-bottom-menu-title-color',
			'label'     => __('Title Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#e6e9ed',
			'transport' => 'postMessage',
		);

		$options['afft-footer-bottom-menu-link-color'] = array(
			'id'        => 'afft-footer-bottom-menu-link-color',
			'label'     => __('Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#aab2bd',
			'transport' => 'postMessage',
		);

		$options['afft-footer-bottom-menu-link-color-hover'] = array(
			'id'        => 'afft-footer-bottom-menu-link-color-hover',
			'label'     => __('Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ccd1d9',
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
		$this->render_selectors(
			'afft-footer-general-background-color-top',
			'afft-footer-general-background-color-bottom',
			function ($mod1, $mod2) {
				$top    = sanitize_hex_color($mod1);
				$bottom = sanitize_hex_color($mod2);

				// The spaces are necessary to avoid duplicated keys
				return array(
					'selectors'    => array(
						'#footer'
					),
					'declarations' => array(
						'background-color' => $bottom,
						'background'       => "-webkit-gradient(linear, 0% 0%, 0% 100%, from($top), to($bottom))",
						'background '      => "-webkit-linear-gradient(top, $top, $bottom)",
						'background  '     => "-moz-linear-gradient(top, $top, $bottom)",
						'background   '    => "-o-linear-gradient(top, $top, $bottom)",
						'background    '   => "linear-gradient($top, $bottom)",
					)
				);
			}
		);

		$this->render_selectors('afft-footer-general-logo-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-logo a',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-footer-general-copyright-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-copyright',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors(
			'afft-footer-breadcrumbs-background-color-top',
			'afft-footer-breadcrumbs-background-color-bottom',
			function ($mod1, $mod2) {
				$top    = sanitize_hex_color($mod1);
				$bottom = sanitize_hex_color($mod2);

				// The spaces are necessary to avoid duplicated keys
				return array(
					'selectors'    => array(
						'#footer .footer-breadcrumbs'
					),
					'declarations' => array(
						'background-color' => $bottom,
						'background'       => "-webkit-gradient(linear, 0% 0%, 0% 100%, from($top), to($bottom))",
						'background '      => "-webkit-linear-gradient(top, $top, $bottom)",
						'background  '     => "-moz-linear-gradient(top, $top, $bottom)",
						'background   '    => "-o-linear-gradient(top, $top, $bottom)",
						'background    '   => "linear-gradient($top, $bottom)",
					)
				);
			}
		);

		$this->render_selectors('afft-footer-breadcrumbs-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-breadcrumbs',
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->render_selectors('afft-footer-breadcrumbs-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-breadcrumbs',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-footer-breadcrumbs-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-breadcrumbs a',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-footer-breadcrumbs-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-breadcrumbs a:hover',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-footer-bottom-menu-title-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-nav .nav-title',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-footer-bottom-menu-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-nav .nav-item a',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-footer-bottom-menu-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'#footer .footer-nav .nav-item a:hover',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});
	}
}
