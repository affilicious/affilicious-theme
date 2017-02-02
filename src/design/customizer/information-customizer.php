<?php
namespace Affilicious_Theme\Design\Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class Information_Customizer extends Abstract_Customizer
{
	/**
	 * @inheritdoc
	 * @since 0.6
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

		$options['afft-information-copyright-text'] = array(
			'id'        => 'afft-information-copyright-text',
			'label'     => __('Copyright', 'affilicious-theme'),
			'section'   => $section,
			'priority'  => '11',
			'type'      => 'text',
			'default'   => 'Copyright © ' . date('Y'),
			'transport' => 'postMessage',
		);

		$options['afft-information-logo'] = array(
			'id'          => 'afft-information-logo',
			'label'       => __('Logo', 'affilicious-theme'),
			'description' => __('Upload a logo for your site. The recommend size is <b>400x100</b> pixels, but you can use any size.', 'affilicious-theme'),
			'priority'  => '12',
			'section'     => $section,
			'type'        => 'upload',
			'default'     => '',
		);

		$options['afft-information-logo-retina'] = array(
			'id'          => 'afft-information-logo-retina',
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
