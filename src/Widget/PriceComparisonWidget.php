<?php
namespace Affilicious\Theme\Widget;

use Carbon_Fields\Field\Field;

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
        $shops = affilicious_get_product_shops();
        if (!empty($shops)) {
            $this->render('priceComparison', $args, $instance);
        }
    }
}
