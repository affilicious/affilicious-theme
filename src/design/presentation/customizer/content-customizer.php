<?php
namespace Affilicious_Theme\Design\Presentation\Customizer;

if (!defined('ABSPATH')) {
	exit('Not allowed to access pages directly.');
}

class Content_Customizer extends Abstract_Customizer
{
	/**
	 * @inheritdoc
	 * @since 0.6
	 */
	public function init()
	{
		$panel = 'afft-content';

		$panels[] = array(
			'id'       => $panel,
			'title'    => __('Content', 'affilicious-theme'),
			'priority' => '40'
		);

		$section = 'afft-content-product';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Product', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['afft-content-product-current-price-color'] = array(
			'id'        => 'afft-content-product-current-price-color',
			'label'     => __('Current Price Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#2fa32f',
			'transport' => 'postMessage',
		);

		$options['afft-content-product-old-price-color'] = array(
			'id'        => 'afft-content-product-old-price-color',
			'label'     => __('Old Price Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ff2320',
			'transport' => 'postMessage',
		);

		$options['afft-content-product-star-rating-color'] = array(
			'id'        => 'afft-content-product-star-rating-color',
			'label'     => __('Star Rating Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#FFD700',
			'transport' => 'postMessage',
		);

        $options['afft-content-product-custom-tag-text-color'] = array(
            'id'        => 'afft-content-product-custom-tag-text-color',
            'label'     => __('Custom Tag Text Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-custom-tag-text-color-hover'] = array(
            'id'        => 'afft-content-product-custom-tag-text-color-hover',
            'label'     => __('Custom Tag Text Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#9ad3e8',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-custom-tag-background-color'] = array(
            'id'        => 'afft-content-product-custom-tag-background-color',
            'label'     => __('Custom Tag Background Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3bafda',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-custom-tag-background-color-hover'] = array(
            'id'        => 'afft-content-product-custom-tag-background-color-hover',
            'label'     => __('Custom Tag Background Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#359dc4',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-price-tag-text-color'] = array(
            'id'        => 'afft-content-product-price-tag-text-color',
            'label'     => __('Price Tag Text Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-price-tag-text-color-hover'] = array(
            'id'        => 'afft-content-product-price-tag-text-color-hover',
            'label'     => __('Price Tag Text Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ceeace',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-price-tag-background-color'] = array(
            'id'        => 'afft-content-product-price-tag-background-color',
            'label'     => __('Price Tag Background Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#5cb85c',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-price-tag-background-color-hover'] = array(
            'id'        => 'afft-content-product-price-tag-background-color-hover',
            'label'     => __('Price Tag Background Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#5ab45a',
            'transport' => 'postMessage',
        );

		$options['afft-content-product-details-background-color-odd'] = array(
			'id'        => 'afft-content-product-details-background-color-odd',
			'label'     => __('Details Background Color (Odd)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#f9f9f9',
			'transport' => 'postMessage',
		);

		$options['afft-content-product-details-background-color-even'] = array(
			'id'        => 'afft-content-product-details-background-color-even',
			'label'     => __('Details Background Color (Even)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#fff',
			'transport' => 'postMessage',
		);

		$options['afft-content-product-details-border-color'] = array(
			'id'        => 'afft-content-product-details-border-color',
			'label'     => __('Details Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ddd',
			'transport' => 'postMessage',
		);

        $options['afft-content-product-attributes-choice-background-color'] = array(
            'id'        => 'afft-content-product-attributes-choice-background-color',
            'label'     => __('Attribute Choice Background Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-attributes-choice-background-color-hover'] = array(
            'id'        => 'afft-content-product-attributes-choice-background-color-hover',
            'label'     => __('Attribute Choice Background Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-attributes-choice-background-color-selected'] = array(
            'id'        => 'afft-content-product-attributes-choice-background-color-selected',
            'label'     => __('Attribute Choice Background Color (Selected)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-attributes-choice-border-color'] = array(
            'id'        => 'afft-content-product-attributes-choice-border-color',
            'label'     => __('Attribute Choice Border Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#999',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-attributes-choice-border-color-hover'] = array(
            'id'        => 'afft-content-product-attributes-choice-border-color-hover',
            'label'     => __('Attribute Choice Border Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#333',
            'transport' => 'postMessage',
        );

        $options['afft-content-product-attributes-choice-border-color-selected'] = array(
            'id'        => 'afft-content-product-attributes-choice-border-color-selected',
            'label'     => __('Attribute Choice Border Color (Selected)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#000',
            'transport' => 'postMessage',
        );

        $section = 'afft-content-post';

        $sections[] = array(
            'id'       => $section,
            'title'    => __('Post'),
            'priority' => '10',
            'panel'    => $panel
        );

        $options['afft-content-post-date-day-color'] = array(
            'id'        => 'afft-content-post-date-day-color',
            'label'     => __('Day Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#000',
            'transport' => 'postMessage',
        );

        $options['afft-content-post-date-month-color'] = array(
            'id'        => 'afft-content-post-date-month-color',
            'label'     => __('Month Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#555',
            'transport' => 'postMessage',
        );

        $options['afft-content-post-date-year-color'] = array(
            'id'        => 'afft-content-post-date-year-color',
            'label'     => __('Year Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#555',
            'transport' => 'postMessage',
        );

        $options['afft-content-post-category-color'] = array(
            'id'        => 'afft-content-post-category-color',
            'label'     => __('Category Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-post-category-color-hover'] = array(
            'id'        => 'afft-content-post-category-color-hover',
            'label'     => __('Category Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3fc2ea',
            'transport' => 'postMessage',
        );

        $options['afft-content-post-tag-link-color'] = array(
            'id'        => 'afft-content-post-tag-link-color',
            'label'     => __('Tag Link Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-post-tag-link-color-hover'] = array(
            'id'        => 'afft-content-post-tag-link-color-hover',
            'label'     => __('Tag Link Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#9ad3e8',
            'transport' => 'postMessage',
        );

        $options['afft-content-post-tag-background-color'] = array(
            'id'        => 'afft-content-post-tag-background-color',
            'label'     => __('Tag Background Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3bafda',
            'transport' => 'postMessage',
        );

        $options['afft-content-post-tag-background-color-hover'] = array(
            'id'        => 'afft-content-post-tag-background-color-hover',
            'label'     => __('Tag Background Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#359dc4',
            'transport' => 'postMessage',
        );

        $section = 'afft-content-main-sidebar';

        $sections[] = array(
            'id'       => $section,
            'title'    => __('Main Sidebar', 'affilicious-theme'),
            'priority' => '10',
            'panel'    => $panel
        );

        $options['afft-content-main-sidebar-heading-background-color-top'] = array(
            'id'        => 'afft-content-main-sidebar-heading-background-color-top',
            'label'     => __('Heading Background Color (Top)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-content-main-sidebar-heading-background-color-bottom'] = array(
            'id'        => 'afft-content-main-sidebar-heading-background-color-bottom',
            'label'     => __('Heading Background Color (Bottom)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-content-main-sidebar-headline-color'] = array(
            'id'        => 'afft-content-main-sidebar-headline-color',
            'label'     => __('Heading Title Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#000',
            'transport' => 'postMessage',
        );

        $options['afft-content-main-sidebar-tag-link-color'] = array(
            'id'        => 'afft-content-main-sidebar-tag-link-color',
            'label'     => __('Tag Link Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-main-sidebar-tag-link-color-hover'] = array(
            'id'        => 'afft-content-main-sidebar-tag-link-color-hover',
            'label'     => __('Tag Link Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#9ad3e8',
            'transport' => 'postMessage',
        );

        $options['afft-content-main-sidebar-tag-background-color'] = array(
            'id'        => 'afft-content-main-sidebar-tag-background-color',
            'label'     => __('Tag Background Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3bafda',
            'transport' => 'postMessage',
        );

        $options['afft-content-main-sidebar-tag-background-color-hover'] = array(
            'id'        => 'afft-content-main-sidebar-tag-background-color-hover',
            'label'     => __('Tag Background Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#359dc4',
            'transport' => 'postMessage',
        );

		$section = 'afft-content-alert';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Alert', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

		$options['afft-content-alert-success-background-color'] = array(
			'id'        => 'afft-content-alert-success-background-color',
			'label'     => __('Success Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#d2eab8',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-success-text-color'] = array(
			'id'        => 'afft-content-alert-success-text-color',
			'label'     => __('Success Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#2fa32f',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-success-link-color'] = array(
			'id'        => 'afft-content-alert-success-link-color',
			'label'     => __('Success Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#2b542c',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-success-link-color-hover'] = array(
			'id'        => 'afft-content-alert-success-link-color-hover',
			'label'     => __('Success Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#256826',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-success-border-color'] = array(
			'id'        => 'afft-content-alert-success-border-color',
			'label'     => __('Success Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#a0d468',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-info-background-color'] = array(
			'id'        => 'afft-content-alert-info-background-color',
			'label'     => __('Info Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#a9e1f5',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-info-text-color'] = array(
			'id'        => 'afft-content-alert-info-text-color',
			'label'     => __('Info Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#31708f',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-info-link-color'] = array(
			'id'        => 'afft-content-alert-info-link-color',
			'label'     => __('Info Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#245269',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-info-link-color-hover'] = array(
			'id'        => 'afft-content-alert-info-link-color-hover',
			'label'     => __('Info Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#255d75',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-info-border-color'] = array(
			'id'        => 'afft-content-alert-info-border-color',
			'label'     => __('Info Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#4fc1e9',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-warning-background-color'] = array(
			'id'        => 'afft-content-alert-warning-background-color',
			'label'     => __('Warning Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ffebba',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-warning-text-color'] = array(
			'id'        => 'afft-content-alert-warning-text-color',
			'label'     => __('Warning Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#8a6d3b',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-warning-link-color'] = array(
			'id'        => 'afft-content-alert-warning-link-color',
			'label'     => __('Warning Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#66512c',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-warning-link-color-hover'] = array(
			'id'        => 'afft-content-alert-warning-link-color-hover',
			'label'     => __('Warning Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#725529',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-warning-border-color'] = array(
			'id'        => 'afft-content-alert-warning-border-color',
			'label'     => __('Warning Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ffce54',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-danger-background-color'] = array(
			'id'        => 'afft-content-alert-danger-background-color',
			'label'     => __('Danger Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#f7b1b9',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-danger-text-color'] = array(
			'id'        => 'afft-content-alert-danger-text-color',
			'label'     => __('Danger Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#a94442',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-danger-link-color'] = array(
			'id'        => 'afft-content-alert-danger-link-color',
			'label'     => __('Danger Link Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#843534',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-danger-link-color-hover'] = array(
			'id'        => 'afft-content-alert-danger-link-color-hover',
			'label'     => __('Danger Link Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#9b3c3c',
			'transport' => 'postMessage',
		);

		$options['afft-content-alert-danger-border-color'] = array(
			'id'        => 'afft-content-alert-danger-border-color',
			'label'     => __('Danger Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ed5565',
			'transport' => 'postMessage',
		);

		$section = 'afft-content-button';

		$sections[] = array(
			'id'       => $section,
			'title'    => __('Buttons', 'affilicious-theme'),
			'priority' => '10',
			'panel'    => $panel
		);

        $options['afft-content-button-search-background-color'] = array(
            'id'        => 'afft-content-button-search-background-color',
            'label'     => __('Search Background Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-button-search-background-color-hover'] = array(
            'id'        => 'afft-content-button-search-background-color-hover',
            'label'     => __('Search Background Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#3bafda',
            'transport' => 'postMessage',
        );

        $options['afft-content-button-search-border-color'] = array(
            'id'        => 'afft-content-button-search-border-color',
            'label'     => __('Search Border Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ccc',
            'transport' => 'postMessage',
        );

        $options['afft-content-button-search-border-color-hover'] = array(
            'id'        => 'afft-content-button-search-border-color-hover',
            'label'     => __('Search Border Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ccc',
            'transport' => 'postMessage',
        );

        $options['afft-content-button-search-icon-color'] = array(
            'id'        => 'afft-content-button-search-icon-color',
            'label'     => __('Search Icon Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#000',
            'transport' => 'postMessage',
        );

        $options['afft-content-button-search-icon-color-hover'] = array(
            'id'        => 'afft-content-button-search-icon-color-hover',
            'label'     => __('Search Icon Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#FFF',
            'transport' => 'postMessage',
        );

		$options['afft-content-button-buy-background-color'] = array(
			'id'        => 'afft-content-button-buy-background-color',
			'label'     => __('Buy Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ff8c14',
			'transport' => 'postMessage',
		);

		$options['afft-content-button-buy-background-color-hover'] = array(
			'id'        => 'afft-content-button-buy-background-color-hover',
			'label'     => __('Buy Background Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ed7709',
			'transport' => 'postMessage',
		);

		$options['afft-content-button-buy-border-color'] = array(
			'id'        => 'afft-content-button-buy-border-color',
			'label'     => __('Buy Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ff870a',
			'transport' => 'postMessage',
		);

        $options['afft-content-button-buy-border-color-hover'] = array(
            'id'        => 'afft-content-button-buy-border-color-hover',
            'label'     => __('Buy Border Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ed7709',
            'transport' => 'postMessage',
        );

		$options['afft-content-button-buy-text-color'] = array(
			'id'        => 'afft-content-button-buy-text-color',
			'label'     => __('Buy Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ffffff',
			'transport' => 'postMessage',
		);

        $options['afft-content-button-buy-text-color-hover'] = array(
            'id'        => 'afft-content-button-buy-text-color-hover',
            'label'     => __('Buy Text Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ffffff',
            'transport' => 'postMessage',
        );

		$options['afft-content-button-review-background-color'] = array(
			'id'        => 'afft-content-button-review-background-color',
			'label'     => __('Review Background Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#3bafda',
			'transport' => 'postMessage',
		);

		$options['afft-content-button-review-background-color-hover'] = array(
			'id'        => 'afft-content-button-review-background-color-hover',
			'label'     => __('Review Background Color (Hover)', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#35a0c6',
			'transport' => 'postMessage',
		);

		$options['afft-content-button-review-border-color'] = array(
			'id'        => 'afft-content-button-review-border-color',
			'label'     => __('Review Border Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#35a0c6',
			'transport' => 'postMessage',
		);

        $options['afft-content-button-review-border-color-hover'] = array(
            'id'        => 'afft-content-button-review-border-color-hover',
            'label'     => __('Review Border Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#35a0c6',
            'transport' => 'postMessage',
        );

		$options['afft-content-button-review-text-color'] = array(
			'id'        => 'afft-content-button-review-text-color',
			'label'     => __('Review Text Color', 'affilicious-theme'),
			'section'   => $section,
			'type'      => 'color',
			'default'   => '#ffffff',
			'transport' => 'postMessage',
		);

        $options['afft-content-button-review-text-color-hover'] = array(
            'id'        => 'afft-content-button-review-text-color-hover',
            'label'     => __('Review Text Color (Hover)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#ffffff',
            'transport' => 'postMessage',
        );

        $section = 'afft-content-empty-search';

        $sections[] = array(
            'id'       => $section,
            'title'    => __('Empty Search', 'affilicious-theme'),
            'priority' => '10',
            'panel'    => $panel
        );

        $options['afft-content-empty-search-icon-color'] = array(
            'id'        => 'afft-content-empty-search-icon-color',
            'label'     => __('Icon Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#999',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-headline-color'] = array(
            'id'        => 'afft-content-empty-search-headline-color',
            'label'     => __('Headline Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#000',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-text-color'] = array(
            'id'        => 'afft-content-empty-search-text-color',
            'label'     => __('Text Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#555555',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-background-color-top'] = array(
            'id'        => 'afft-content-empty-search-background-color-top',
            'label'     => __('Background Color (Top)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-background-color-bottom'] = array(
            'id'        => 'afft-content-empty-search-background-color-bottom',
            'label'     => __('Background Color (Bottom)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-background-image'] = array(
            'id'        => 'afft-content-empty-search-background-image',
            'label'     => __('Background Image', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'upload',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-background-repeat'] = array(
            'id'        => 'afft-content-empty-search-background-repeat',
            'label'     => __('Background Repeat', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'select',
            'choices'   => array(
                'no-repeat' => __('None', 'affilicious-theme'),
                'repeat'    => __('Repeat', 'affilicious-theme'),
                'repeat-x'  => __('Repeat X', 'affilicious-theme'),
                'repeat-y'  => __('Repeat Y', 'affilicious-theme'),
            ),
            'default'   => 'no-repeat',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-background-attachment'] = array(
            'id'        => 'afft-content-empty-search-background-attachment',
            'label'     => __('Background Attachment', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'select',
            'choices'   => array(
                'initial' => __('None', 'affilicious-theme'),
                'scroll'  => __('Scroll', 'affilicious-theme'),
                'fixed'   => __('Fixed', 'affilicious-theme'),
                'local'   => __('Local', 'affilicious-theme'),
            ),
            'default'   => 'initial',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-background-size'] = array(
            'id'        => 'afft-content-empty-search-background-size',
            'label'     => __('Background Size', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'select',
            'choices'   => array(
                'auto'    => __('None', 'affilicious-theme'),
                'custom'  => __('Custom', 'affilicious-theme'),
                'contain' => __('Contain', 'affilicious-theme'),
                'cover'   => __('Cover', 'affilicious-theme'),
            ),
            'default'   => 'auto',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-background-width'] = array(
            'id'        => 'afft-content-empty-search-background-width',
            'label'     => __('Background Width', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'text',
            'transport' => 'postMessage',
        );

        $options['afft-content-empty-search-background-height'] = array(
            'id'        => 'afft-content-empty-search-background-height',
            'label'     => __('Background Height', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'text',
            'transport' => 'postMessage',
        );

        $section = 'afft-content-not-found';

        $sections[] = array(
            'id'       => $section,
            'title'    => __('Not Found', 'affilicious-theme'),
            'priority' => '10',
            'panel'    => $panel
        );

        $options['afft-content-not-found-error-code-color'] = array(
            'id'        => 'afft-content-not-found-error-code-color',
            'label'     => __('Error Code Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#999',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-headline-color'] = array(
            'id'        => 'afft-content-not-found-headline-color',
            'label'     => __('Headline Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#000',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-text-color'] = array(
            'id'        => 'afft-content-not-found-text-color',
            'label'     => __('Text Color', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#555555',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-background-color-top'] = array(
            'id'        => 'afft-content-not-found-background-color-top',
            'label'     => __('Background Color (Top)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-background-color-bottom'] = array(
            'id'        => 'afft-content-not-found-background-color-bottom',
            'label'     => __('Background Color (Bottom)', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'color',
            'default'   => '#fff',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-background-image'] = array(
            'id'        => 'afft-content-not-found-background-image',
            'label'     => __('Background Image', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'upload',
            'default'   => '',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-background-repeat'] = array(
            'id'        => 'afft-content-not-found-background-repeat',
            'label'     => __('Background Repeat', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'select',
            'choices'   => array(
                'no-repeat' => __('None', 'affilicious-theme'),
                'repeat'    => __('Repeat', 'affilicious-theme'),
                'repeat-x'  => __('Repeat X', 'affilicious-theme'),
                'repeat-y'  => __('Repeat Y', 'affilicious-theme'),
            ),
            'default'   => 'no-repeat',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-background-attachment'] = array(
            'id'        => 'afft-content-not-found-background-attachment',
            'label'     => __('Background Attachment', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'select',
            'choices'   => array(
                'initial' => __('None', 'affilicious-theme'),
                'scroll'  => __('Scroll', 'affilicious-theme'),
                'fixed'   => __('Fixed', 'affilicious-theme'),
                'local'   => __('Local', 'affilicious-theme'),
            ),
            'default'   => 'initial',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-background-size'] = array(
            'id'        => 'afft-content-not-found-background-size',
            'label'     => __('Background Size', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'select',
            'choices'   => array(
                'auto'    => __('None', 'affilicious-theme'),
                'custom'  => __('Custom', 'affilicious-theme'),
                'contain' => __('Contain', 'affilicious-theme'),
                'cover'   => __('Cover', 'affilicious-theme'),
            ),
            'default'   => 'auto',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-background-width'] = array(
            'id'        => 'afft-content-not-found-background-width',
            'label'     => __('Background Width', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'text',
            'transport' => 'postMessage',
        );

        $options['afft-content-not-found-background-height'] = array(
            'id'        => 'afft-content-not-found-background-height',
            'label'     => __('Background Height', 'affilicious-theme'),
            'section'   => $section,
            'type'      => 'text',
            'transport' => 'postMessage',
        );

		$options['sections'] = $sections;
		$options['panels'] = $panels;

		return $options;
	}

	/**
	 * @inheritdoc
	 * @since 0.6
	 */
	public function render()
	{
		$this->render_selectors('afft-content-product-current-price-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.current-price',
					'.price'
				),
				'declarations' => array(
					'color' => $color . ' !important',
				)
			);
		});

		$this->render_selectors('afft-content-product-old-price-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.old-price'
				),
				'declarations' => array(
					'color' => $color . ' !important',
				)
			);
		});

		$this->render_selectors('afft-content-product-star-rating-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.product-review-rating'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

        $this->render_selectors('afft-content-product-custom-tag-text-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.product-preview-tag-bar .tag',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-custom-tag-text-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.product-preview-tag-bar .tag:hover',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-custom-tag-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.product-preview-tag-bar .tag',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-custom-tag-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.product-preview-tag-bar .tag:hover',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-price-tag-text-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.product-preview-tag-bar .tag-price',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-price-tag-text-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.product-preview-tag-bar .tag-price:hover',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-price-tag-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.product-preview-tag-bar .tag-price',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-price-tag-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.product-preview-tag-bar .tag-price:hover',
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

		$this->render_selectors('afft-content-product-details-background-color-odd', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.product-details.table > tbody > tr:nth-child(odd)'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-product-details-background-color-even', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.product-details.table > tbody > tr:nth-child(even)'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-product-details-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.product-details.table > tbody > tr > td'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

        $this->render_selectors('afft-content-product-attributes-choice-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    'li.aff-product-attributes-choice:not(.selected)'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-attributes-choice-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    'li.aff-product-attributes-choice:not(.selected):hover'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-attributes-choice-background-color-selected', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    'li.aff-product-attributes-choice.selected'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-attributes-choice-border-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    'li.aff-product-attributes-choice:not(.selected)'
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-attributes-choice-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    'li.aff-product-attributes-choice:not(.selected):hover'
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-product-attributes-choice-border-color-selected', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    'li.aff-product-attributes-choice.selected'
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-post-date-day-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-date .day',
                    '.entry-preview-date .day'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-post-date-month-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-date .month',
                    '.entry-preview-date .month'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-post-date-year-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-date .year',
                    '.entry-preview-date .year'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-post-category-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-categories a',
                    '.entry-preview-categories a'
                ),
                'declarations' => array(
                    'color' => $color,
                )
            );
        });

        $this->render_selectors('afft-content-post-category-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-categories a:hover',
                    '.entry-preview-categories a:hover'
                ),
                'declarations' => array(
                    'color' => $color,
                )
            );
        });

        $this->render_selectors('afft-content-post-tag-link-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-tags a.tag',
                    '.entry-preview-tags a.tag'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-post-tag-link-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-tags a.tag:hover',
                    '.entry-preview-tags a.tag:hover'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-post-tag-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-tags a.tag',
                    '.entry-preview-tags a.tag'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-post-tag-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.entry-tags a.tag:hover',
                    '.entry-preview-tags a.tag:hover'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-main-sidebar-tag-link-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#main-sidebar .tagcloud a'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-main-sidebar-tag-link-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#main-sidebar .tagcloud a:hover'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-main-sidebar-tag-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#main-sidebar .tagcloud a'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-main-sidebar-tag-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#main-sidebar .tagcloud a:hover'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors(
            'afft-content-main-sidebar-heading-background-color-top',
            'afft-content-main-sidebar-heading-background-color-bottom',
            function ($mod1, $mod2) {
                $top    = sanitize_hex_color($mod1);
                $bottom = sanitize_hex_color($mod2);

                if($top == '') {
                    $top = 'transparent';
                }

                if($bottom == '') {
                    $bottom = 'transparent';
                }

                if($top === $bottom) {
                    return array(
                        'selectors'    => array(
                            '#main-sidebar .widget-heading',
                        ),
                        'declarations' => array(
                            'background-color' => $bottom,
                        )
                    );
                }

                // The spaces are necessary to avoid duplicated keys
                return array(
                    'selectors'    => array(
                        '#main-sidebar .widget-heading'
                    ),
                    'declarations' => array(
                        'background-color' => $bottom,
                        'background'       => "-webkit-gradient(linear, 0% 0%, 0% 100%, from($top), to($bottom))",
                        'background '      => "-webkit-linear-gradient(top, $top, $bottom)",
                        'background  '     => "-moz-linear-gradient(top, $top, $bottom)",
                        'background   '    => "-o-linear-gradient(top, $top, $bottom)",
                        'background    '   => "linear-gradient($top, $bottom)",
                    )
                );
            }
        );

        $this->render_selectors('afft-content-main-sidebar-headline-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#main-sidebar .widget-headline',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-alert-success-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success .alert-link:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-success-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-success-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-success-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-success-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-success .alert-link'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-info-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-info-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-info-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info .alert-link'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-info-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info .alert-link:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-info-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-info'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-warning-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-warning-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-warning-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning .alert-link'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-warning-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning .alert-link:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-warning-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-warning'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-danger-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-danger-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-danger-link-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger .alert-link'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-danger-link-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger .alert-link:hover'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-alert-danger-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.alert.alert-danger'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

        $this->render_selectors('afft-content-button-search-background-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.searchform button.btn'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-button-search-background-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.searchform button.btn:hover'
                ),
                'declarations' => array(
                    'background-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-button-search-border-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.searchform button.btn'
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-button-search-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.searchform button.btn:hver'
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-button-search-icon-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.searchform button.btn i'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-button-search-icon-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.searchform button.btn:hover i'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

		$this->render_selectors('afft-content-button-buy-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-buy'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-button-buy-background-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-buy:hover'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-button-buy-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-buy'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

        $this->render_selectors('afft-content-button-buy-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.btn-buy:hover'
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

		$this->render_selectors('afft-content-button-buy-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-buy'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

        $this->render_selectors('afft-content-button-buy-text-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.btn-buy:hover'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

		$this->render_selectors('afft-content-button-review-background-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-review'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-button-review-background-color-hover', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-review:hover'
				),
				'declarations' => array(
					'background-color' => $color
				)
			);
		});

		$this->render_selectors('afft-content-button-review-border-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-review'
				),
				'declarations' => array(
					'border-color' => $color
				)
			);
		});

        $this->render_selectors('afft-content-button-review-border-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.btn-review:hover'
                ),
                'declarations' => array(
                    'border-color' => $color
                )
            );
        });

		$this->render_selectors('afft-content-button-review-text-color', function ($mod) {
			$color = sanitize_hex_color($mod);

			return array(
				'selectors'    => array(
					'.btn-review'
				),
				'declarations' => array(
					'color' => $color
				)
			);
		});

        $this->render_selectors('afft-content-button-review-text-color-hover', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '.btn-review:hover'
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-empty-search-icon-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#empty-search-icon',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-empty-search-headline-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#empty-search-headline',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-empty-search-text-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#empty-search-text',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors(
            'afft-content-empty-search-background-color-top',
            'afft-content-empty-search-background-color-bottom',
            function ($mod1, $mod2) {
                $top    = sanitize_hex_color($mod1);
                $bottom = sanitize_hex_color($mod2);

                // The spaces are necessary to avoid duplicated keys
                return array(
                    'selectors'    => array(
                        '#empty-search'
                    ),
                    'declarations' => array(
                        'background-color' => $bottom,
                        'background'       => "-webkit-gradient(linear, 0% 0%, 0% 100%, from($top), to($bottom))",
                        'background '      => "-webkit-linear-gradient(top, $top, $bottom)",
                        'background  '     => "-moz-linear-gradient(top, $top, $bottom)",
                        'background   '    => "-o-linear-gradient(top, $top, $bottom)",
                        'background    '   => "linear-gradient($top, $bottom)",
                    )
                );
            }
        );

        $this->render_selectors('afft-content-empty-search-background-image', function ($mod) {
            $url = esc_url($mod);
            if(empty($url)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#empty-search',
                ),
                'declarations' => array(
                    'background-image' => 'url(' . $url . ')'
                )
            );
        });

        $this->render_selectors('afft-content-empty-search-background-repeat', function ($mod) {
            if(empty($mod)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#empty-search',
                ),
                'declarations' => array(
                    'background-repeat' => $mod
                )
            );
        });

        $this->render_selectors('afft-content-empty-search-background-attachment', function ($mod) {
            if(empty($mod)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#empty-search',
                ),
                'declarations' => array(
                    'background-attachment' => $mod
                )
            );
        });

        $this->render_selectors(
            'afft-content-empty-search-background-size',
            'afft-content-empty-search-background-width',
            'afft-content-empty-search-background-height',
            function ($size, $width, $height) {
                if(empty($size)) {
                    return null;
                }

                if ($size === 'custom') {
                    return array(
                        'selectors'    => array(
                            '#empty-search',
                        ),
                        'declarations' => array(
                            'background-size' => $width . ' ' . $height,
                        )
                    );
                }

                return array(
                    'selectors'    => array(
                        '#empty-search',
                    ),
                    'declarations' => array(
                        'background-size' => $size
                    )
                );
            }
        );

        $this->render_selectors('afft-content-not-found-error-code-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#not-found-error-code',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-not-found-headline-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#not-found-headline',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors('afft-content-not-found-text-color', function ($mod) {
            $color = sanitize_hex_color($mod);

            return array(
                'selectors'    => array(
                    '#not-found-text',
                ),
                'declarations' => array(
                    'color' => $color
                )
            );
        });

        $this->render_selectors(
            'afft-content-not-found-background-color-top',
            'afft-content-not-found-background-color-bottom',
            function ($mod1, $mod2) {
                $top    = sanitize_hex_color($mod1);
                $bottom = sanitize_hex_color($mod2);

                // The spaces are necessary to avoid duplicated keys
                return array(
                    'selectors'    => array(
                        '#not-found'
                    ),
                    'declarations' => array(
                        'background-color' => $bottom,
                        'background'       => "-webkit-gradient(linear, 0% 0%, 0% 100%, from($top), to($bottom))",
                        'background '      => "-webkit-linear-gradient(top, $top, $bottom)",
                        'background  '     => "-moz-linear-gradient(top, $top, $bottom)",
                        'background   '    => "-o-linear-gradient(top, $top, $bottom)",
                        'background    '   => "linear-gradient($top, $bottom)",
                    )
                );
            }
        );

        $this->render_selectors('afft-content-not-found-background-image', function ($mod) {
            $url = esc_url($mod);
            if(empty($url)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#not-found',
                ),
                'declarations' => array(
                    'background-image' => 'url(' . $url . ')'
                )
            );
        });

        $this->render_selectors('afft-content-not-found-background-repeat', function ($mod) {
            if(empty($mod)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#not-found',
                ),
                'declarations' => array(
                    'background-repeat' => $mod
                )
            );
        });

        $this->render_selectors('afft-content-not-found-background-attachment', function ($mod) {
            if(empty($mod)) {
                return null;
            }

            return array(
                'selectors'    => array(
                    '#not-found',
                ),
                'declarations' => array(
                    'background-attachment' => $mod
                )
            );
        });

        $this->render_selectors(
            'afft-content-not-found-background-size',
            'afft-content-not-found-background-width',
            'afft-content-not-found-background-height',
            function ($size, $width, $height) {
                if(empty($size)) {
                    return null;
                }

                if ($size === 'custom') {
                    return array(
                        'selectors'    => array(
                            '#not-found',
                        ),
                        'declarations' => array(
                            'background-size' => $width . ' ' . $height,
                        )
                    );
                }

                return array(
                    'selectors'    => array(
                        '#not-found',
                    ),
                    'declarations' => array(
                        'background-size' => $size
                    )
                );
            }
        );
	}
}
