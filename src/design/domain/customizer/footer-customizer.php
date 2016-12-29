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
            'default'   => '#555',
            'transport' => 'postMessage',
        );

        $options['afft-footer-breadcrumbs-link-color'] = array(
            'id'        => 'afft-footer-breadcrumbs-link-color',
            'label'     => __('Link Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#555',
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

		$section = 'afft-footer-content';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Content', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['afft-footer-content-background-color-top'] = array(
			'id'        => 'afft-footer-content-background-color-top',
			'label'     => __('Background Color (Top)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#1f1f1f',
			'transport' => 'postMessage',
		);

		$options['afft-footer-content-background-color-bottom'] = array(
			'id'        => 'afft-footer-content-background-color-bottom',
			'label'     => __('Background Color (Bottom)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#1f1f1f',
			'transport' => 'postMessage',
		);

        $options['afft-footer-content-background-image'] = array(
            'id'        => 'afft-footer-content-background-image',
            'label'     => __('Background Image', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'upload',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-footer-content-background-repeat'] = array(
            'id'        => 'afft-footer-content-background-repeat',
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

        $options['afft-footer-content-background-attachment'] = array(
            'id'        => 'afft-footer-content-background-attachment',
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

        $options['afft-footer-content-background-size'] = array(
            'id'        => 'afft-footer-content-background-size',
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

        $options['afft-footer-content-background-width'] = array(
            'id'        => 'afft-footer-content-background-width',
            'label'     => __('Background Width', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'text',
            'transport' => 'postMessage',
        );

        $options['afft-footer-content-background-height'] = array(
            'id'        => 'afft-footer-content-background-height',
            'label'     => __('Background Height', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'text',
            'transport' => 'postMessage',
        );

        $section = 'afft-footer-content-menu';

        $sections[] = array(
            'id'       => $section,
            'title'    => __('Content Menu', 'affilicious-theme'),
            'priority' => '10',
            'panel'    => $panel
        );

        $options['afft-footer-content-menu-title-color'] = array(
            'id'        => 'afft-footer-content-menu-title-color',
            'label'     => __('Title Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ffffff',
            'transport' => 'postMessage',
        );

        $options['afft-footer-content-menu-link-color'] = array(
            'id'        => 'afft-footer-content-menu-link-color',
            'label'     => __('Link Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#aab2bd',
            'transport' => 'postMessage',
        );

        $options['afft-footer-content-menu-link-color-hover'] = array(
            'id'        => 'afft-footer-content-menu-link-color-hover',
            'label'     => __('Link Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3bafda',
            'transport' => 'postMessage',
        );

        $section = 'afft-footer-sidebar';

        $sections[] = array(
            'id'       => $section,
            'title'    => __('Footer Sidebar', 'affilicious-theme'),
            'priority' => '10',
            'panel'    => $panel
        );

        $options['afft-footer-sidebar-headline-color'] = array(
            'id'        => 'afft-footer-sidebar-headline-color',
            'label'     => __('Headline Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-footer-sidebar-text-color'] = array(
            'id'        => 'afft-footer-sidebar-text-color',
            'label'     => __('Text Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#aab2bd',
            'transport' => 'postMessage',
        );

        $options['afft-footer-sidebar-link-color'] = array(
            'id'        => 'afft-footer-sidebar-link-color',
            'label'     => __('Link Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#aab2bd',
            'transport' => 'postMessage',
        );

        $options['afft-footer-sidebar-link-color-hover'] = array(
            'id'        => 'afft-footer-sidebar-link-color-hover',
            'label'     => __('Link Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3bafda',
            'transport' => 'postMessage',
        );

        $options['afft-footer-footer-sidebar-tag-link-color'] = array(
            'id'        => 'afft-footer-footer-sidebar-tag-link-color',
            'label'     => __('Tag Link Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-footer-footer-sidebar-tag-link-color-hover'] = array(
            'id'        => 'afft-footer-footer-sidebar-tag-link-color-hover',
            'label'     => __('Tag Link Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-footer-footer-sidebar-tag-background-color'] = array(
            'id'        => 'afft-footer-footer-sidebar-tag-background-color',
            'label'     => __('Tag Background Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#333',
            'transport' => 'postMessage',
        );

        $options['afft-footer-footer-sidebar-tag-background-color-hover'] = array(
            'id'        => 'afft-footer-footer-sidebar-tag-background-color-hover',
            'label'     => __('Tag Background Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#222',
            'transport' => 'postMessage',
        );

        $section = 'afft-footer-plinth';

        $sections[] = array(
            'id'       => $section,
            'title'    => __('Plinth', 'affilicious-theme'),
            'priority' => '10',
            'panel'    => $panel
        );

        $options['afft-footer-plinth-background-color-top'] = array(
            'id'        => 'afft-footer-plinth-background-color-top',
            'label'     => __('Background Color (Top)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#1a1a1a',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-background-color-bottom'] = array(
            'id'        => 'afft-footer-plinth-background-color-bottom',
            'label'     => __('Background Color (Bottom)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#1a1a1a',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-copyright-color'] = array(
            'id'        => 'afft-footer-plinth-copyright-color',
            'label'     => __('Copyright Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#606469',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-facebook-icon-color'] = array(
            'id'        => 'afft-footer-plinth-facebook-icon-color',
            'label'     => sprintf(__('%s Icon Color', 'affilicious-theme'), 'Facebook'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-facebook-icon-color-hover'] = array(
            'id'        => 'afft-footer-plinth-facebook-icon-color-hover',
            'label'     => sprintf(__('%s Icon Color (Hover)', 'affilicious-theme'), 'Facebook'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-facebook-background-color'] = array(
            'id'        => 'afft-footer-plinth-facebook-background-color',
            'label'     => sprintf(__('%s Background Color', 'affilicious-theme'), 'Facebook'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-facebook-background-color-hover'] = array(
            'id'        => 'afft-footer-plinth-facebook-background-color-hover',
            'label'     => sprintf(__('%s Background Color (Hover)', 'affilicious-theme'), 'Facebook'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3B5998',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-facebook-border-color'] = array(
            'id'        => 'afft-footer-plinth-facebook-border-color',
            'label'     => sprintf(__('%s Border Color', 'affilicious-theme'), 'Facebook'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3B5998',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-facebook-border-color-hover'] = array(
            'id'        => 'afft-footer-plinth-facebook-border-color-hover',
            'label'     => sprintf(__('%s Border Color (Hover)', 'affilicious-theme'), 'Facebook'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3B5998',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-twitter-icon-color'] = array(
            'id'        => 'afft-footer-plinth-twitter-icon-color',
            'label'     => sprintf(__('%s Icon Color', 'affilicious-theme'), 'Twitter'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-twitter-icon-color-hover'] = array(
            'id'        => 'afft-footer-plinth-twitter-icon-color-hover',
            'label'     => sprintf(__('%s Icon Color (Hover)', 'affilicious-theme'), 'Twitter'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-twitter-background-color'] = array(
            'id'        => 'afft-footer-plinth-twitter-background-color',
            'label'     => sprintf(__('%s Background Color', 'affilicious-theme'), 'Twitter'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-twitter-background-color-hover'] = array(
            'id'        => 'afft-footer-plinth-twitter-background-color-hover',
            'label'     => sprintf(__('%s Background Color (Hover)', 'affilicious-theme'), 'Twitter'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3CF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-twitter-border-color'] = array(
            'id'        => 'afft-footer-plinth-twitter-border-color',
            'label'     => sprintf(__('%s Border Color', 'affilicious-theme'), 'Twitter'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3CF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-twitter-border-color-hover'] = array(
            'id'        => 'afft-footer-plinth-twitter-border-color-hover',
            'label'     => sprintf(__('%s Border Color (Hover)', 'affilicious-theme'), 'Twitter'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3CF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-google-plus-icon-color'] = array(
            'id'        => 'afft-footer-plinth-google-plus-icon-color',
            'label'     => sprintf(__('%s Icon Color', 'affilicious-theme'), 'Google Plus'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-google-plus-icon-color-hover'] = array(
            'id'        => 'afft-footer-plinth-google-plus-icon-color-hover',
            'label'     => sprintf(__('%s Icon Color (Hover)', 'affilicious-theme'), 'Google Plus'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-google-plus-background-color'] = array(
            'id'        => 'afft-footer-plinth-google-plus-background-color',
            'label'     => sprintf(__('%s Background Color', 'affilicious-theme'), 'Google Plus'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-google-plus-background-color-hover'] = array(
            'id'        => 'afft-footer-plinth-google-plus-background-color-hover',
            'label'     => sprintf(__('%s Background Color (Hover)', 'affilicious-theme'), 'Google Plus'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#DC4A38',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-google-plus-border-color'] = array(
            'id'        => 'afft-footer-plinth-google-plus-border-color',
            'label'     => sprintf(__('%s Border Color', 'affilicious-theme'), 'Google Plus'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#DC4A38',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-google-plus-border-color-hover'] = array(
            'id'        => 'afft-footer-plinth-google-plus-border-color-hover',
            'label'     => sprintf(__('%s Border Color (Hover)', 'affilicious-theme'), 'Google Plus'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#DC4A38',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-pinterest-icon-color'] = array(
            'id'        => 'afft-footer-plinth-pinterest-icon-color',
            'label'     => sprintf(__('%s Icon Color', 'affilicious-theme'), 'Pinterest'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-pinterest-icon-color-hover'] = array(
            'id'        => 'afft-footer-plinth-pinterest-icon-color-hover',
            'label'     => sprintf(__('%s Icon Color (Hover)', 'affilicious-theme'), 'Pinterest'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-pinterest-background-color'] = array(
            'id'        => 'afft-footer-plinth-pinterest-background-color',
            'label'     => sprintf(__('%s Background Color', 'affilicious-theme'), 'Pinterest'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-pinterest-background-color-hover'] = array(
            'id'        => 'afft-footer-plinth-pinterest-background-color-hover',
            'label'     => sprintf(__('%s Background Color (Hover)', 'affilicious-theme'), 'Pinterest'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#C92228',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-pinterest-border-color'] = array(
            'id'        => 'afft-footer-plinth-pinterest-border-color',
            'label'     => sprintf(__('%s Border Color', 'affilicious-theme'), 'Pinterest'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#C92228',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-pinterest-border-color-hover'] = array(
            'id'        => 'afft-footer-plinth-pinterest-border-color-hover',
            'label'     => sprintf(__('%s Border Color (Hover)', 'affilicious-theme'), 'Pinterest'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#C92228',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-reddit-icon-color'] = array(
            'id'        => 'afft-footer-plinth-reddit-icon-color',
            'label'     => sprintf(__('%s Icon Color', 'affilicious-theme'), 'Reddit'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-reddit-icon-color-hover'] = array(
            'id'        => 'afft-footer-plinth-reddit-icon-color-hover',
            'label'     => sprintf(__('%s Icon Color (Hover)', 'affilicious-theme'), 'Reddit'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFFFFF',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-reddit-background-color'] = array(
            'id'        => 'afft-footer-plinth-reddit-background-color',
            'label'     => sprintf(__('%s Background Color', 'affilicious-theme'), 'Reddit'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-reddit-background-color-hover'] = array(
            'id'        => 'afft-footer-plinth-reddit-background-color-hover',
            'label'     => sprintf(__('%s Background Color (Hover)', 'affilicious-theme'), 'Reddit'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ff4500',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-reddit-border-color'] = array(
            'id'        => 'afft-footer-plinth-reddit-border-color',
            'label'     => sprintf(__('%s Border Color', 'affilicious-theme'), 'Reddit'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ff4500',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-reddit-border-color-hover'] = array(
            'id'        => 'afft-footer-plinth-reddit-border-color-hover',
            'label'     => sprintf(__('%s Border Color (Hover)', 'affilicious-theme'), 'Reddit'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ff4500',
            'transport' => 'postMessage',
        );

        $section = 'afft-footer-plinth-menu';

        $sections[] = array(
            'id'       => $section,
            'title'    => __('Plinth Menu', 'affilicious-theme'),
            'priority' => '10',
            'panel'    => $panel
        );

        $options['afft-footer-plinth-menu-link-color'] = array(
            'id'        => 'afft-footer-plinth-menu-link-color',
            'label'     => __('Link Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#aab2bd',
            'transport' => 'postMessage',
        );

        $options['afft-footer-plinth-menu-link-color-hover'] = array(
            'id'        => 'afft-footer-plinth-menu-link-color-hover',
            'label'     => __('Link Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3bafda',
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
            'afft-footer-breadcrumbs-background-color-top',
            'afft-footer-breadcrumbs-background-color-bottom',
            function ($mod1, $mod2) {
                $top    = sanitize_hex_color($mod1);
                $bottom = sanitize_hex_color($mod2);

                // The spaces are necessary to avoid duplicated keys
                return array(
                    'selectors'    => array(
                        '#footer-breadcrumbs'
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
                    '#footer-breadcrumbs',
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
                    '#footer-breadcrumbs',
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
                    '#footer-breadcrumbs a',
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
                    '#footer-breadcrumbs a:hover',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

		$this->render_selectors(
			'afft-footer-content-background-color-top',
			'afft-footer-content-background-color-bottom',
			function ($mod1, $mod2) {
				$top    = sanitize_hex_color($mod1);
				$bottom = sanitize_hex_color($mod2);

				// The spaces are necessary to avoid duplicated keys
				return array(
					'selectors'    => array(
						'#footer-content'
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

        $this->render_selectors('afft-footer-content-background-image', function ($mod) {
            $url = esc_url($mod);
            if(empty($url)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#footer-content',
                ),
                'declarations' => array(
                    'background-image' => 'url(' . $url . ')'
                )
            );
        });

        $this->render_selectors('afft-footer-content-background-repeat', function ($mod) {
            if(empty($mod)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#footer-content',
                ),
                'declarations' => array(
                    'background-repeat' => $mod
                )
            );
        });

        $this->render_selectors('afft-footer-content-background-attachment', function ($mod) {
            if(empty($mod)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#footer-content',
                ),
                'declarations' => array(
                    'background-attachment' => $mod
                )
            );
        });

        $this->render_selectors(
            'afft-footer-content-background-size',
            'afft-footer-content-background-width',
            'afft-footer-content-background-height',
            function ($size, $width, $height) {
                if(empty($size)) {
                    return null;
                }

                if ($size === 'custom') {
                    return array(
                        'selectors'    => array(
                            '#footer-content',
                        ),
                        'declarations' => array(
                            'background-size' => $width . ' ' . $height,
                        )
                    );
                }

                return array(
                    'selectors'    => array(
                        '#footer-content',
                    ),
                    'declarations' => array(
                        'background-size' => $size
                    )
                );
            }
        );

        $this->render_selectors('afft-footer-content-menu-title-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-content-first-menu .nav-title',
                    '#footer-content-second-menu .nav-title',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-content-menu-link-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-content-first-menu .nav-item a',
                    '#footer-content-second-menu .nav-item a',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-content-menu-link-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-content-first-menu .nav-item a:hover',
                    '#footer-content-second-menu .nav-item a:hover',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-sidebar-headline-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-sidebar h1',
                    '#footer-sidebar h2',
                    '#footer-sidebar h3',
                    '#footer-sidebar h4',
                    '#footer-sidebar h5',
                    '#footer-sidebar h6',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-sidebar-text-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-sidebar',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-sidebar-link-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-sidebar a',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-sidebar-link-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-sidebar a:hover',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-footer-sidebar-tag-link-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-sidebar .tagcloud a'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-footer-sidebar-tag-link-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-sidebar .tagcloud a:hover'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-footer-sidebar-tag-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-sidebar .tagcloud a'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-footer-sidebar-tag-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-sidebar .tagcloud a:hover'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors(
            'afft-footer-plinth-background-color-top',
            'afft-footer-plinth-background-color-bottom',
            function ($mod1, $mod2) {
                $top    = sanitize_hex_color($mod1);
                $bottom = sanitize_hex_color($mod2);

                // The spaces are necessary to avoid duplicated keys
                return array(
                    'selectors'    => array(
                        '#footer-plinth'
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

        $this->render_selectors('afft-footer-plinth-copyright-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-copyright',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-facebook-icon-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.facebook i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-facebook-icon-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.facebook:hover i',
                    '#footer-social .social-btn.facebook:focus i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-facebook-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.facebook',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-facebook-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.facebook:before',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-facebook-border-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.facebook',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-facebook-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.facebook:hover',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-twitter-icon-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.twitter i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-twitter-icon-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.twitter:hover i',
                    '#footer-social .social-btn.twitter:focus i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-twitter-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.twitter',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-twitter-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.twitter:before',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-twitter-border-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.twitter',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-twitter-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.twitter:hover',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-google-plus-icon-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.google-plus i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-google-plus-icon-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.google-plus:hover i',
                    '#footer-social .social-btn.google-plus:focus i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-google-plus-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.google-plus',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-google-plus-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.google-plus:before',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-google-plus-border-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.google-plus',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-google-plus-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.google-plus:hover',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-pinterest-icon-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.pinterest i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-pinterest-icon-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.pinterest:hover i',
                    '#footer-social .social-btn.pinterest:focus i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-pinterest-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.pinterest',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-pinterest-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.pinterest:before',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-pinterest-border-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.pinterest',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-pinterest-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.pinterest:hover',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-reddit-icon-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.reddit i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-reddit-icon-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.reddit:hover i',
                    '#footer-social .social-btn.reddit:focus i',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-reddit-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.reddit',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-reddit-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.reddit:before',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-reddit-border-color', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.reddit',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-reddit-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);
            if($color === '') {
                $color = 'transparent';
            }

            return array(
                'selectors'    => array(
                    '#footer-social .social-btn.reddit:hover',
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-menu-link-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-plinth .menu-item a',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-footer-plinth-menu-link-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#footer-plinth .menu-item a:hover',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });
    }
}
