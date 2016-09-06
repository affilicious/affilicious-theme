<?php
namespace Affilicious\Theme\Design\Domain\Sidebar;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class ProductSidebar extends AbstractSidebar
{
	/**
	 * @inheritdoc
	 */
	public static function getId()
	{
		return 'product-sidebar';
	}

	/**
	 * @inheritdoc
	 */
	public static function getName()
	{
		return __('Product Sidebar', 'affilicious-theme');
	}

	/**
     * @inheritdoc
     */
    public function init()
    {
        register_sidebar(array(
	        'id' => self::getId(),
	        'name' => self::getName(),
            'description' => __('Place your widgets into this sidebar, which is visible on every product page.', 'affilicious-theme'),
            'before_widget' => '<li><div class="panel panel-default">',
            'after_widget' => '</div></li>',
            'before_title' => '<div class="panel-heading"><h4>',
            'after_title' => '</h4></div>',
        ));
    }
}
