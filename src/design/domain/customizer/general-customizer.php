<?php
namespace Affilicious_Theme\Design\Domain\Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class General_Customizer extends Abstract_Customizer
{
	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function init()
	{
		$section = 'afft-general';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('General', 'affilicious-theme'),
			'priority' => '10',
		);

		$options['afft-general-background-color-top'] = array(
			'id'        => 'afft-general-background-color-top',
			'label'     => __('Background Color (Top)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ebebeb',
			'transport' => 'postMessage',
		);

		$options['afft-general-background-color-bottom'] = array(
			'id'        => 'afft-general-background-color-bottom',
			'label'     => __('Background Color (Bottom)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ebebeb',
			'transport' => 'postMessage',
		);

		$options['afft-general-background-image'] = array(
			'id'        => 'afft-general-background-image',
			'label'     => __('Background Image', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'upload',
			'default'   => '',
			'transport' => 'postMessage',
		);

		$options['afft-general-background-repeat'] = array(
			'id'        => 'afft-general-background-repeat',
			'label'     => __('Background Repeat', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'select',
			'choices'   => array(
				'no-repeat' => __('None', 'affilicious-theme'),
				'repeat'    => __('Repeat', 'affilicious-theme'),
				'repeat-x'  => __('Repeat X', 'affilicious-theme'),
				'repeat-y'  => __('Repeat Y', 'affilicious-theme'),
			),
			'default'   => 'no-repeat',
			'transport' => 'postMessage',
		);

		$options['afft-general-background-attachment'] = array(
			'id'        => 'afft-general-background-attachment',
			'label'     => __('Background Attachment', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'select',
			'choices'   => array(
				'initial' => __('None', 'affilicious-theme'),
				'scroll'  => __('Scroll', 'affilicious-theme'),
				'fixed'   => __('Fixed', 'affilicious-theme'),
				'local'   => __('Local', 'affilicious-theme'),
			),
			'default'   => 'initial',
			'transport' => 'postMessage',
		);

		$options['afft-general-background-size'] = array(
			'id'        => 'afft-general-background-size',
			'label'     => __('Background Size', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'select',
			'choices'   => array(
				'auto'    => __('None', 'affilicious-theme'),
				'custom'  => __('Custom', 'affilicious-theme'),
				'contain' => __('Contain', 'affilicious-theme'),
				'cover'   => __('Cover', 'affilicious-theme'),
			),
			'default'   => 'auto',
			'transport' => 'postMessage',
		);

		$options['afft-general-background-width'] = array(
			'id'        => 'afft-general-background-width',
			'label'     => __('Background Width', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'text',
			'transport' => 'postMessage',
		);

		$options['afft-general-background-height'] = array(
			'id'        => 'afft-general-background-height',
			'label'     => __('Background Height', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'text',
			'transport' => 'postMessage',
		);

		$options['sections'] = $sections;

		return $options;
	}

	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function render()
	{
		$this->render_selectors(
			'afft-general-background-color-top',
			'afft-general-background-color-bottom',
			function ($mod1, $mod2) {
				$top    = sanitize_hex_color($mod1);
				$bottom = sanitize_hex_color($mod2);

				if($top === $bottom) {
					return array(
						'selectors'    => array(
							'body',
						),
						'declarations' => array(
							'background-color' => $bottom,
						)
					);
				}

				// The spaces are necessary to avoid duplicated keys
				return array(
					'selectors'    => array(
						'body',
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

		$this->render_selectors('afft-general-background-image', function ($mod) {
			$url = esc_url($mod);
			if(empty($url)) {
				return null;
			}

			return array(
				'selectors'    => array(
					'body',
				),
				'declarations' => array(
					'background-image' => 'url(' . $url . ')'
				)
			);
		});

		$this->render_selectors('afft-general-background-image', function ($mod) {
			if(empty($mod)) {
				return null;
			}

			return array(
				'selectors'    => array(
					'body',
				),
				'declarations' => array(
					'background-repeat' => $mod
				)
			);
		});

		$this->render_selectors('afft-general-background-attachment', function ($mod) {
			if(empty($mod)) {
				return null;
			}

			return array(
				'selectors'    => array(
					'body',
				),
				'declarations' => array(
					'background-attachment' => $mod
				)
			);
		});

		$this->render_selectors(
			'afft-general-background-size',
			'afft-general-background-width',
			'afft-general-background-height',
			function ($size, $width, $height) {
				if(empty($size)) {
					return null;
				}

				if ($size === 'custom') {
					return array(
						'selectors'    => array(
							'body',
						),
						'declarations' => array(
							'background-size' => $width . ' ' . $height,
						)
					);
				}

				return array(
					'selectors'    => array(
						'body',
					),
					'declarations' => array(
						'background-size' => $size
					)
				);
			}
		);
	}
}
