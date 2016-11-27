<?php
namespace Affilicious_Theme\Design\Application\Setup;

use Affilicious\Product\Domain\Model\Product;
use Affilicious_Theme\Design\Domain\Sidebar\Main_Sidebar;
use Affilicious_Theme\Design\Domain\Sidebar\Product_Sidebar;
use Carbon_Fields\Container as Carbon_Container;
use Carbon_Fields\Field as Carbon_Field;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Sidebar_Setup
{
    const PRODUCT_SIDEBAR = 'Affilicious_Theme_product_sidebar';

    /**
     * @var Main_Sidebar
     */
    private $main_sidebar;

    /**
     * @var Product_Sidebar
     */
    private $product_sidebar;

    /**
     * @since 0.3
     */
    public function __construct()
    {
        $this->main_sidebar = new Main_Sidebar();
        $this->product_sidebar = new Product_Sidebar();
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->main_sidebar->init();
        $this->product_sidebar->init();
    }

    /**
     * @inheritdoc
     */
    public function render($carbon_fields)
    {
        $result = array_merge($carbon_fields, array(
             Carbon_Field::make('sidebar', self::PRODUCT_SIDEBAR, __('Select a Sidebar', 'affilicious-theme'))
                ->exclude_sidebars(Main_Sidebar::get_id())
                ->set_help_text(__('The selected product sidebar will be shown above the main sidebar.', 'affilicious-theme'))
        ));

        return $result;
    }

	/**
	 * Set the default sidebar of the products
	 *
	 * @since 0.4.1
	 */
    public function set_default_sidebar()
    {
	    $post_id = !empty($_GET['post']) ? $_GET['post'] : null;
	    $post_id = empty($post_id) && !empty($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;
	    if(empty($post_id) && get_post_type($post_id) !== Product::POST_TYPE) {
	    	return;
	    }

	    $sidebar = carbon_get_post_meta($post_id, self::PRODUCT_SIDEBAR);
	    if(empty($sidebar)) {
			add_post_meta($post_id, self::PRODUCT_SIDEBAR, Product_Sidebar::get_id());
	    }
    }
}
