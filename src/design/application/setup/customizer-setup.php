<?php
namespace Affilicious\Theme\Design\Application\Setup;

use Affilicious\Common\Application\Setup\Setup_Interface;
use Affilicious\Theme\Design\Domain\Customizer\Customizer_Interface;
use Affilicious\Theme\Design\Domain\Customizer\General_Customizer;
use Affilicious\Theme\Design\Domain\Customizer\Information_Customizer;
use Affilicious\Theme\Design\Domain\Customizer\Header_Customizer;
use Affilicious\Theme\Design\Domain\Customizer\Typography_Customizer;
use Affilicious\Theme\Design\Domain\Customizer\Footer_Customizer;
use Affilicious\Theme\Design\Domain\Customizer\Content_Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class Customizer_Setup implements Setup_Interface
{
	/**
	 * @var Customizer_Interface[]
	 */
	private $customizers;

	/**
	 * @var \Customizer_Library
	 */
	protected $customizer_library;

	/**
	 * @since 0.3.5
	 */
	public function __construct()
	{
		$this->customizer_library = \Customizer_Library::instance();

		$this->customizers = array(
			new Information_Customizer(),
			new General_Customizer(),
			new Typography_Customizer(),
			new Header_Customizer(),
			new Content_Customizer(),
			new Footer_Customizer(),
		);
	}

	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function init()
	{
		$options = array();
		$options['panels'] = array();
		$options['sections'] = array();

		foreach ($this->customizers as $customizer) {
			$_options = $customizer->init();

			if (!empty($_options)) {
				if (isset($_options['panels'])) {
					$options['panels'] = array_merge($options['panels'], $_options['panels']);
					unset($_options['panels']);
				}

				if (isset($_options['sections'])) {
					$options['sections'] = array_merge($options['sections'], $_options['sections']);
					unset($_options['sections']);
				}

				$options = array_merge($options, $_options);
			}
		}

		$this->customizer_library->add_options($options);
	}

	/**
	 * @inheritdoc
	 * @since 0.3.5
	 */
	public function render()
	{
		foreach ($this->customizers as $customizer) {
			$customizer->render();
		}
	}

	/**
	 * @since 0.3.5
	 */
	public function enqueue_scripts()
	{
		foreach ($this->customizers as $customizer) {
			$customizer->enqueue_scripts();
		}
	}

	/**
	 * @since 0.3.5
	 */
	public function head()
	{
		do_action('customizer_library_styles');

		$css = \Customizer_Library_Styles::instance()->build();
		if (!empty($css)) {
			echo "\n<style type=\"text/css\" >\n";
			echo $css;
			echo "\n</style>\n";
		}
	}
}
