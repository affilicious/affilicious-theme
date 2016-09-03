<?php
namespace Affilicious\Theme\Design\Domain\Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class MainCustomizer extends AbstractCustomizer
{
	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function init()
	{
		$panel = 'main';

		$panels[] = array(
			'id'       => $panel,
			'title'    => __('Main', 'affilicious-theme'),
			'priority' => '100'
		);

		$section = 'main-product';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Product', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['main-product-current-price-color'] = array(
			'id'        => 'main-product-current-price-color',
			'label'     => __('Current Price Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#2fa32f',
			'transport' => 'postMessage',
		);

		$options['main-product-old-price-color'] = array(
			'id'        => 'main-product-old-price-color',
			'label'     => __('Old Price Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ff2320',
			'transport' => 'postMessage',
		);

		$options['main-product-star-rating-color'] = array(
			'id'        => 'main-product-star-rating-color',
			'label'     => __('Star Rating Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#FFD700',
			'transport' => 'postMessage',
		);

		$options['main-product-details-background-color-odd'] = array(
			'id'        => 'main-product-details-background-color-odd',
			'label'     => __('Details Background Color (Odd)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#f9f9f9',
			'transport' => 'postMessage',
		);

		$options['main-product-details-background-color-even'] = array(
			'id'        => 'main-product-details-background-color-even',
			'label'     => __('Details Background Color (Even)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#fff',
			'transport' => 'postMessage',
		);

		$options['main-product-details-border-color'] = array(
			'id'        => 'main-product-details-border-color',
			'label'     => __('Details Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ddd',
			'transport' => 'postMessage',
		);

		$section = 'main-alert';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Alert', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['main-alert-success-background-color'] = array(
			'id'        => 'main-alert-success-background-color',
			'label'     => __('Success Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#d2eab8',
			'transport' => 'postMessage',
		);

		$options['main-alert-success-text-color'] = array(
			'id'        => 'main-alert-success-text-color',
			'label'     => __('Success Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#2fa32f',
			'transport' => 'postMessage',
		);

		$options['main-alert-success-link-color'] = array(
			'id'        => 'main-alert-success-link-color',
			'label'     => __('Success Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#2b542c',
			'transport' => 'postMessage',
		);

		$options['main-alert-success-link-color-hover'] = array(
			'id'        => 'main-alert-success-link-color-hover',
			'label'     => __('Success Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#256826',
			'transport' => 'postMessage',
		);

		$options['main-alert-success-border-color'] = array(
			'id'        => 'main-alert-success-border-color',
			'label'     => __('Success Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#a0d468',
			'transport' => 'postMessage',
		);

		$options['main-alert-info-background-color'] = array(
			'id'        => 'main-alert-info-background-color',
			'label'     => __('Info Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#a9e1f5',
			'transport' => 'postMessage',
		);

		$options['main-alert-info-text-color'] = array(
			'id'        => 'main-alert-info-text-color',
			'label'     => __('Info Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#31708f',
			'transport' => 'postMessage',
		);

		$options['main-alert-info-link-color'] = array(
			'id'        => 'main-alert-info-link-color',
			'label'     => __('Info Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#245269',
			'transport' => 'postMessage',
		);

		$options['main-alert-info-link-color-hover'] = array(
			'id'        => 'main-alert-info-link-color-hover',
			'label'     => __('Info Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#255d75',
			'transport' => 'postMessage',
		);

		$options['main-alert-info-border-color'] = array(
			'id'        => 'main-alert-info-border-color',
			'label'     => __('Info Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#4fc1e9',
			'transport' => 'postMessage',
		);

		$options['main-alert-warning-background-color'] = array(
			'id'        => 'main-alert-warning-background-color',
			'label'     => __('Warning Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ffebba',
			'transport' => 'postMessage',
		);

		$options['main-alert-warning-text-color'] = array(
			'id'        => 'main-alert-warning-text-color',
			'label'     => __('Warning Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#8a6d3b',
			'transport' => 'postMessage',
		);

		$options['main-alert-warning-link-color'] = array(
			'id'        => 'main-alert-warning-link-color',
			'label'     => __('Warning Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#66512c',
			'transport' => 'postMessage',
		);

		$options['main-alert-warning-link-color-hover'] = array(
			'id'        => 'main-alert-warning-link-color-hover',
			'label'     => __('Warning Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#725529',
			'transport' => 'postMessage',
		);

		$options['main-alert-warning-border-color'] = array(
			'id'        => 'main-alert-warning-border-color',
			'label'     => __('Warning Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ffce54',
			'transport' => 'postMessage',
		);

		$options['main-alert-danger-background-color'] = array(
			'id'        => 'main-alert-danger-background-color',
			'label'     => __('Danger Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#f7b1b9',
			'transport' => 'postMessage',
		);

		$options['main-alert-danger-text-color'] = array(
			'id'        => 'main-alert-danger-text-color',
			'label'     => __('Danger Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#a94442',
			'transport' => 'postMessage',
		);

		$options['main-alert-danger-link-color'] = array(
			'id'        => 'main-alert-danger-link-color',
			'label'     => __('Danger Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#843534',
			'transport' => 'postMessage',
		);

		$options['main-alert-danger-link-color-hover'] = array(
			'id'        => 'main-alert-danger-link-color-hover',
			'label'     => __('Danger Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#9b3c3c',
			'transport' => 'postMessage',
		);

		$options['main-alert-danger-border-color'] = array(
			'id'        => 'main-alert-danger-border-color',
			'label'     => __('Danger Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ed5565',
			'transport' => 'postMessage',
		);

		$section = 'main-panel';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Panel', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['main-panel-default-heading-background-color-top'] = array(
			'id'        => 'main-panel-default-heading-background-color-top',
			'label'     => __('Heading Background Color (Top)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#e6e9ed',
			'transport' => 'postMessage',
		);

		$options['main-panel-default-heading-background-color-bottom'] = array(
			'id'        => 'main-panel-default-heading-background-color-bottom',
			'label'     => __('Heading Background Color (Bottom)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#e6e9ed',
			'transport' => 'postMessage',
		);

		$options['main-panel-default-heading-border-color'] = array(
			'id'        => 'main-panel-default-heading-border-color',
			'label'     => __('Heading Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#e6e9ed',
			'transport' => 'postMessage',
		);

		$options['main-panel-default-title-color'] = array(
			'id'        => 'main-panel-default-title-color',
			'label'     => __('Title Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#000',
			'transport' => 'postMessage',
		);

		$section = 'main-button';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Button', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['main-button-buy-background-color'] = array(
			'id'        => 'main-button-buy-background-color',
			'label'     => __('Buy Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ff8c14',
			'transport' => 'postMessage',
		);

		$options['main-button-buy-background-color-hover'] = array(
			'id'        => 'main-button-buy-background-color-hover',
			'label'     => __('Buy Background Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ff870a',
			'transport' => 'postMessage',
		);

		$options['main-button-buy-border-color'] = array(
			'id'        => 'main-button-buy-border-color',
			'label'     => __('Buy Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ff870a',
			'transport' => 'postMessage',
		);

		$options['main-button-buy-text-color'] = array(
			'id'        => 'main-button-buy-text-color',
			'label'     => __('Buy Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ffffff',
			'transport' => 'postMessage',
		);



		$options['main-button-review-background-color'] = array(
			'id'        => 'main-button-review-background-color',
			'label'     => __('Review Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#3bafda',
			'transport' => 'postMessage',
		);

		$options['main-button-review-background-color-hover'] = array(
			'id'        => 'main-button-review-background-color-hover',
			'label'     => __('Review Background Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#35a0c6',
			'transport' => 'postMessage',
		);

		$options['main-button-review-border-color'] = array(
			'id'        => 'main-button-review-border-color',
			'label'     => __('Review Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#35a0c6',
			'transport' => 'postMessage',
		);

		$options['main-button-review-text-color'] = array(
			'id'        => 'main-button-review-text-color',
			'label'     => __('Review Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ffffff',
			'transport' => 'postMessage',
		);

		$options['sections'] = $sections;
		$options['panels'] = $panels;

		return $options;
	}

	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function render()
	{
		$this->renderSelectors('main-product-current-price-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.current-price',
					'.price'
				),
				'declarations' => array(
					'color' => $color . ' !important',
				)
			);
		});

		$this->renderSelectors('main-product-old-price-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.old-price'
				),
				'declarations' => array(
					'color' => $color . ' !important',
				)
			);
		});

		$this->renderSelectors('main-product-star-rating-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.product-review-rating'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-product-details-background-color-odd', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.product-details.table > tbody > tr:nth-child(odd)'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-product-details-background-color-even', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.product-details.table > tbody > tr:nth-child(even)'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-product-details-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.product-details.table > tbody > tr > td'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-success-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success .alert-link:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-success-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-success-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-success-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-success-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success .alert-link'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-info-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-info-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-info-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info .alert-link'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-info-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info .alert-link:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-info-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-warning-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-warning-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-warning-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning .alert-link'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-warning-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning .alert-link:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-warning-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});


		$this->renderSelectors('main-alert-danger-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-danger-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-danger-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger .alert-link'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-danger-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger .alert-link:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->renderSelectors('main-alert-danger-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors(
			'main-panel-default-heading-background-color-top',
			'main-panel-default-heading-background-color-bottom',
			function ($mod1, $mod2) {
				$top    = sanitize_hex_color($mod1);
				$bottom = sanitize_hex_color($mod2);

				if($top === $bottom) {
					return array(
						'selectors'    => array(
							'.panel.panel-default .panel-heading',
						),
						'declarations' => array(
							'background-color' => $bottom,
						)
					);
				}

				// The spaces are necessary to avoid duplicated keys
				return array(
					'selectors'    => array(
						'.panel.panel-default .panel-heading'
					),
					'declarations' => array(
						'background-color' => $bottom,
						'background'       => "webkit-gradient(linear, 0% 0%, 0% 100%, from($top), to($bottom))",
						'background '      => "-webkit-linear-gradient(top, $top, $bottom)",
						'background  '     => "-moz-linear-gradient(top, $top, $bottom)",
						'background   '    => "-o-linear-gradient(top, $top, $bottom)",
					)
				);
			}
		);

		$this->renderSelectors('main-panel-default-heading-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.panel.panel-default .panel-heading'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-panel-default-title-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.panel.panel-default .panel-heading h1',
					'.panel.panel-default .panel-heading h2',
					'.panel.panel-default .panel-heading h3',
					'.panel.panel-default .panel-heading h4',
					'.panel.panel-default .panel-heading h5',
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});




		$this->renderSelectors('main-panel-default-heading-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.panel.panel-default .panel-heading'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-panel-default-heading-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.panel.panel-default .panel-heading'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-panel-default-heading-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.panel.panel-default .panel-heading'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-button-buy-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-buy'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-button-buy-background-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-buy:hover'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-button-buy-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-buy, .btn-buy:hover'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-button-buy-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-buy'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});


		$this->renderSelectors('main-button-review-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-review'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-button-review-background-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-review:hover'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->renderSelectors('main-button-review-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-review, .btn-review:hover'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->renderSelectors('main-button-review-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-review'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});
	}
}
