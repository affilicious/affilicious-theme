<?php
namespace Affilicious\Theme\Design\Domain\Widget;

use Carbon_Fields\Field\Field;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class PriceComparisonWidget extends AbstractWidget
{
    public function __construct()
    {
        $this->setup(
            __('AT Price Comparison', 'affilicious-theme'),
            __('Displays an Affilicious Theme price comparison only on product pages.', 'affilicious-theme'),
            array(
                Field::make('text', 'title', __('Title', 'affilicious-theme')),
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
        $shops = aff_get_product_shops();
        if (!empty($shops)) {
            $this->render('priceComparison', $args, $instance);
        }
    }
}
