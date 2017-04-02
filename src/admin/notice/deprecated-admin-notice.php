<?php
namespace Affilicious_Theme\Admin\Notice;

use Affilicious_Theme\Common\Helper\View_Helper;

if (!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Deprecated_Admin_Notice implements Admin_Notice_Interface
{
    /**
     * @inheritdoc
     * @since 0.8
     */
    public function render()
    {
        $dismissed = get_option('affilicious_theme_admin_notice_deprecated_dismissed');
        if(!empty($dismissed)) {
            return;
        }

        View_Helper::render(sprintf(
            '%s/src/admin/view/notice/deprecated.php',
            \Affilicious_Theme::get_root_path()
        ));
    }

    /**
     * @inheritdoc
     * @since 0.8
     */
    public function dismiss()
    {
        if (defined('DOING_AJAX') && DOING_AJAX) {
            update_option('affilicious_theme_admin_notice_deprecated_dismissed', true, false);
        }

        die();
    }
}
