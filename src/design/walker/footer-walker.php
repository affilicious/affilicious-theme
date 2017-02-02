<?php
namespace Affilicious_Theme\Design\Walker;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Footer_Walker extends \Walker_Nav_Menu
{
    /**
     * @inheritdoc
     * @since 0.6
     */
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent\n";
	}

    /**
     * @inheritdoc
     * @since 0.6
     */
	function end_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\n";
	}

    /**
     * @inheritdoc
     * @since 0.6
     */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		$indent      = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes     = empty($item->classes) ? array() : (array) $item->classes;
		$classes[]   = 'menu-item-' . $item->ID;
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		$id          = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id          = $id ? ' id="' . esc_attr($id) . '"' : '';
		$output .= $indent . '';

		// Set the link attributes
		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

		// Output the item
		$item_output = $args->before;
		$item_output .= '<dd class="nav-item">';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= '</dd>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

    /**
     * @inheritdoc
     * @since 0.6
     */
	function end_el(&$output, $item, $depth = 0, $args = array())
	{
		$output .= "\n";
	}
}
