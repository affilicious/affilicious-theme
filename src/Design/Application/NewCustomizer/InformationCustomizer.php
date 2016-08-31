<?php
namespace Affilicious\Theme\Design\Application\NewCustomizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class InformationCustomizer extends AbstractCustomizer
{
	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function init()
	{
		$section = 'title_tagline';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Information', 'affilicious-theme'),
			'priority' => '10',
		);

		$options['blogname'] = array(
			'transport' => 'postMessage',
		);

		$options['blogdescription'] = array(
			'transport' => 'postMessage',
		);

		$options['general-copyright-text'] = array(
			'id'        => 'general-copyright-text',
			'label'     => __('Copyright', 'affilicious-theme'),
			'section'   => $section,
			'priority'  => '11',
			'type'      => 'text',
			'default'   => 'Copyright © ' . date('Y'),
			'transport' => 'postMessage',
		);

		$options['general-logo'] = array(
			'id'          => 'general-logo',
			'label'       => __('Logo', 'affilicious-theme'),
			'description' => __('Upload a logo for your site. The recommend size is <b>400x100</b> pixels, but you can use any size.', 'affilicious-theme'),
			'priority'  => '12',
			'section'     => $section,
			'type'        => 'upload',
			'default'     => '',
		);

		$options['general-logo-retina'] = array(
			'id'          => 'general-logo-retina',
			'label'       => __('Logo (Retina)', 'affilicious-theme'),
			'description' => __('Upload a retina logo for your site. The recommend size is <b>800x200</b> pixels, which is 2 times larger than the regular logo.', 'affilicious-theme'),
			'priority'  => '13',
			'section'     => $section,
			'type'        => 'upload',
			'default'     => '',
		);

		$options['sections'] = $sections;

		return $options;
	}
}
