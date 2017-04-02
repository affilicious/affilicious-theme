<?php
namespace Affilicious_Theme\Admin\Notice;

if (!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

interface Admin_Notice_Interface
{
    /**
     * Render the admin notice.
     *
     * @since 0.8
     */
    public function render();

    /**
     * Dismiss the admin notice.
     *
     * @since 0.8
     */
    public function dismiss();
}
