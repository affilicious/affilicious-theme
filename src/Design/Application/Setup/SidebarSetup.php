<?php
namespace Affilicious\Theme\Design\Application\Setup;

use Affilicious\Common\Application\Setup\SetupInterface;
use Affilicious\Product\Domain\Model\Product;
use Affilicious\Theme\Design\Domain\Sidebar\MainSidebar;
use Affilicious\Theme\Design\Domain\Sidebar\ProductSidebar;
use Carbon_Fields\Container as CarbonContainer;
use Carbon_Fields\Field as CarbonField;

if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class SidebarSetup implements SetupInterface
{
    const PRODUCT_SIDEBAR = '_affilicious_theme_product_sidebar';

    /**
     * @var MainSidebar
     */
    private $mainSidebar;

    /**
     * @var ProductSidebar
     */
    private $productSidebar;

    /**
     * @since 0.3
     */
    public function __construct()
    {
        $this->mainSidebar = new MainSidebar();
        $this->productSidebar = new ProductSidebar();
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->mainSidebar->init();
        $this->productSidebar->init();
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        $carbonContainer = CarbonContainer::make('post_meta', __('Product Sidebar', 'affilicious-theme'))
            ->show_on_post_type(Product::POST_TYPE)
            ->set_priority('low')
            ->add_fields(array(
                CarbonField::make('sidebar', self::PRODUCT_SIDEBAR, __('Select a Sidebar', 'affilicious-theme'))
	                ->exclude_sidebars(MainSidebar::getId())
                    ->set_help_text(__('The selected product sidebar will be shown above the main sidebar.', 'affilicious-theme'))
            ));

        apply_filters('affilicious_product_render_sidebar', $carbonContainer);
    }

	/**
	 * Set the default sidebar of the products
	 *
	 * @since 0.4.1
	 */
    public function setDefaultSidebar()
    {
	    $postId = !empty($_GET['post']) ? $_GET['post'] : null;
	    $postId = empty($postId) && !empty($_POST['post_ID']) ? $_POST['post_ID'] : $postId;
	    if(empty($postId) && get_post_type($postId) !== Product::POST_TYPE) {
	    	return;
	    }

	    $sidebar = carbon_get_post_meta($postId, self::PRODUCT_SIDEBAR);
	    if(empty($sidebar)) {
			add_post_meta($postId, self::PRODUCT_SIDEBAR, ProductSidebar::getId());
	    }
    }
}
