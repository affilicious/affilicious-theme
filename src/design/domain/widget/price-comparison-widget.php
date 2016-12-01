<?php
namespace Affilicious_Theme\Design\Domain\Widget;

use Carbon_Fields\Field as Carbon_Field;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Price_Comparison_Widget extends Abstract_Widget
{
    public function __construct()
    {
        $this->setup(
            __('AT Price Comparison', 'affilicious-theme'),
            __('Displays an Affilicious Theme price comparison only on product pages.', 'affilicious-theme'),
            array(
                Carbon_Field::make('text', 'title', __('Title', 'affilicious-theme')),
            )
        );
    }

    /**
     * Get the price comparison on the product page.
     *
     * @param array $args
     * @param array $instance
     */
    public function front_end($args, $instance)
    {
        if(!aff_is_product_page()) {
            return;
        }

        $shops = aff_get_product_shops();
        if (!empty($shops)) {
            $this->render('price-comparison', $args, $instance);
        }
    }
}
