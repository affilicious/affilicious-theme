<?php
namespace ProjektAffiliateTheme\Product\Detail;

use ProjektAffiliateTheme\Product\Field\FieldGroup;
use ProjektAffiliateTheme\Product\Field\FieldGroupFactory;
use Carbon_Fields\Container as CarbonContainer;
use Carbon_Fields\Field as CarbonField;
use ProjektAffiliateTheme\Product\Product;

if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class DetailGroupSetup
{
    /**
     * @var FieldGroupFactory
     */
    private $fieldGroupFactory;

    /**
     * @var DetailGroupFactory
     */
    private $detailGroupFactory;

    /**
     * Hook into the required Wordpress actions
     */
    public function __construct()
    {
        $this->fieldGroupFactory = new FieldGroupFactory();
        $this->detailGroupFactory = new DetailGroupFactory();

        add_action('init', array($this, 'render'), 4);
    }

    /**
     * Render the product detail groups meta boxes
     */
    public function render()
    {
        $query = new \WP_Query(array(
            'post_type' => FieldGroup::POST_TYPE,
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));

        if(!$query->have_posts()) {
            return;
        }

        while ($query->have_posts()) {
            $query->the_post();

            $fieldGroup = $this->fieldGroupFactory->create($query->post);
            $title = $fieldGroup->getTitle();

            if (empty($title)) {
                continue;
            }

            $fields = $fieldGroup->getFields();
            $details = array();
            if(!empty($fields)) {
                foreach ($fields as $field) {
                    $fieldId = sprintf(
                        Detail::ID_TEMPLATE,
                        $fieldGroup->getId(),
                        $field->getKey()
                    );

                    $detail = CarbonField::make($field->getType(), $fieldId, $field->getLabel());

                    if ($field->hasDefaultValue()) {
                        $detail->default_value($field->getDefaultValue());
                    }

                    if ($field->getHelpText()) {
                        $detail->help_text($field->getHelpText());
                    }

                    $details[] = $detail;
                }
            }

            CarbonContainer::make('post_meta', $fieldGroup->getTitle())
                ->show_on_post_type('product')
                ->show_on_taxonomy_term($fieldGroup->getCategory(), Product::TAXONOMY)
                ->set_priority('default')
                ->add_fields($details);
        }
    }
}
