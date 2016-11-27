<?php
namespace Affilicious_Theme\Design\Application\Filter;

if (!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Custom_Sidebar_Filter
{
    /**
     * @since 0.4.4
     * @param array $params
     * @return array
     */
    public function filter($params)
    {
        if(empty($params)) {
            return array();
        }

        foreach ($params as $index => $param) {
            $params[$index]['before_widget'] = '<li><div class="panel panel-default">';
            $params[$index]['after_widget'] = '</div></li>';
            $params[$index]['before_title'] = '<div class="panel-heading"><h4>';
            $params[$index]['after_title' ] = '</h4></div>';
        }

        return $params;
    }
}
