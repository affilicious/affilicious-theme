<?php
namespace Affilicious_Theme\Design\Application\Setup;

use Affilicious\Product\Domain\Model\Product;
use Affilicious_Theme\Design\Domain\Sidebar\Footer_Sidebar;
use Affilicious_Theme\Design\Domain\Sidebar\Main_Sidebar;
use Affilicious_Theme\Design\Domain\Sidebar\Product_Sidebar;
use Carbon_Fields\Container as Carbon_Container;
use Carbon_Fields\Field as Carbon_Field;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Sidebar_Setup
{
    const PRODUCT_SIDEBAR = 'affilicious_theme_product_sidebar';

    /**
     * @var Main_Sidebar
     */
    private $main_sidebar;

    /**
     * @var Footer_Sidebar
     */
    private $footer_sidebar;

    /**
     * @since 0.3
     */
    public function __construct()
    {
        $this->main_sidebar = new Main_Sidebar();
        $this->footer_sidebar = new Footer_Sidebar();
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->main_sidebar->init();
        $this->footer_sidebar->init();
    }
}
