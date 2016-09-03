<?php
namespace Affilicious\Theme\Design\Domain\Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

abstract class AbstractCustomizer implements CustomizerInterface
{
	/**
	 * @inheritdoc
	 */
	public function render()
	{
		// Overwrite this method
	}

	/**
	 * A helper function to render the CSS selectors
	 *
	 * @since 0.3.5
	 */
	protected function renderSelectors()
	{
		$args = func_get_args();

		if ($args == 2) {
			$callback = $args[1];
			$setting  = $args[0];

			$mod    = get_theme_mod($setting, customizer_library_get_default($setting));
			$styles = call_user_func_array($callback, $mod);
		} elseif ($args > 2) {
			$callback = array_pop($args);
			$settings = $args;

			$mods = array_map(function ($setting) {
				$mod = get_theme_mod($setting, customizer_library_get_default($setting));

				return $mod;
			}, $settings);

			$styles = call_user_func_array($callback, $mods);
		}

		if (!empty($styles['selectors']) && !empty($styles['declarations'])) {
			\Customizer_Library_Styles::instance()->add($styles);
		}
	}

	/**
	 * Enqueue all necessary scripts and styles.
	 * Overwrite this function, if you need it.
	 *
	 * @since 0.3.5
	 */
	public function enqueueScripts()
	{
		// Nothing to do here
	}
}
