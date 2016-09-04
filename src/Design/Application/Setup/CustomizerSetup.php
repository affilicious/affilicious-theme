<?php
namespace Affilicious\Theme\Design\Application\Setup;

use Affilicious\Common\Application\Setup\SetupInterface;
use Affilicious\Theme\Design\Domain\Customizer\CustomizerInterface;
use Affilicious\Theme\Design\Domain\Customizer\GeneralCustomizer;
use Affilicious\Theme\Design\Domain\Customizer\InformationCustomizer;
use Affilicious\Theme\Design\Domain\Customizer\HeaderCustomizer;
use Affilicious\Theme\Design\Domain\Customizer\TypographyCustomizer;
use Affilicious\Theme\Design\Domain\Customizer\FooterCustomizer;
use Affilicious\Theme\Design\Domain\Customizer\ContentCustomizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class CustomizerSetup implements SetupInterface
{
	/**
	 * @var CustomizerInterface[]
	 */
	private $customizers;

	/**
	 * @var \Customizer_Library
	 */
	protected $customizerLibrary;

	/**
	 * @since 0.3.5
	 */
	public function __construct()
	{
		$this->customizerLibrary = \Customizer_Library::instance();

		$this->customizers = array(
			new InformationCustomizer(),
			new GeneralCustomizer(),
			new TypographyCustomizer(),
			new HeaderCustomizer(),
			new ContentCustomizer(),
			new FooterCustomizer(),
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

		$this->customizerLibrary->add_options($options);
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
	public function enqueueScripts()
	{
		foreach ($this->customizers as $customizer) {
			$customizer->enqueueScripts();
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
