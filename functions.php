<?php
if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

require_once(__DIR__ . '/affilicious-theme.php');

$affiliciousTheme = \Affilicious_Theme::get_instance();
$affiliciousTheme->run();

function pagination_bar() {
    global $wp_query;

    $wp_query->set('posts_per_page', 1);
    $total_pages = $wp_query->max_num_pages;

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
