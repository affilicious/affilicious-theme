<?php
namespace Affilicious\Theme\Shortcode;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class AlertShortcode implements ShortcodeInterface
{
	const NAME = 'alert';

	/**
	 * @inheritdoc
	 */
	public function getName()
	{
		return self::NAME;
	}

	/**
	 * @inheritdoc
	 */
	public function render($attr, $content)
	{
		$context     = !empty($attr['context']) && in_array($attr['context'], array('success', 'info', 'warning', 'danger')) ? $attr['context'] : '';
		$dismissible = !empty($attr['dismissible']) && $attr['dismissible'] === 'true' ? 'alert-dismissible' : '';

		$result = '<div class="alert alert-' . $context . ' ' . $dismissible . '" role="alert">';
		$result .= !empty($dismissible) ? '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' : '';
		$result .= $this->prepareLinks($content);
		$result .= '</div>';

		return $result;
	}

	/**
	 * Prepare the links for the alert boxes. All links have to contain the class 'alert-link'
	 *
	 * @since 0.3.4
	 * @param string $html
	 * @return string
	 */
	private function prepareLinks($html)
	{
		$dom = new \DOMDocument();
		$dom->loadHTML($html);
		$links = $dom->getElementsByTagName('a');

		/** @var \DOMElement $a */
		foreach($links as $a){
			$attr = $a->getAttribute('class');

			if(strpos($attr, 'alert-link') === false) {
				if(strlen($attr) === 0) {
					$a->setAttribute('class', 'alert-link');
				} else {
					$a->setAttribute('class', $attr . ' alert-link');
				}
			}
		}

		$result = $dom->saveHTML();

		return $result;
	}
}
