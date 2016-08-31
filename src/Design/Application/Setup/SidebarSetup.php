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
                    ->set_help_text(__('The selected product sidebar will be shown above the main sidebar.', 'affilicious-theme'))
            ));

        apply_filters('affilicious_product_render_sidebar', $carbonContainer);
    }
}
