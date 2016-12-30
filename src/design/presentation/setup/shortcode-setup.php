<?php
namespace Affilicious_Theme\Design\Presentation\Setup;

use Affilicious_Theme\Design\Presentation\Shortcode\Alert_Shortcode;

if(!defined('ABSPATH')) {
    exit('Not allowed to access pages directly.');
}

class Shortcode_Setup
{
    protected $alert_shortcode;

    /**
     * @since 0.6
     */
    public function __construct()
    {
        $this->alert_shortcode = new Alert_Shortcode();
    }

    /**
     * Initialize the shortcodes.
     *
     * @since 0.6
     */
    public function init()
    {
        add_shortcode($this->alert_shortcode->get_name(), array($this->alert_shortcode, 'render'));
    }
}
