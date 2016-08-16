<?php
namespace Affilicious\Theme\Exception;

class ViewNotFoundException extends \RuntimeException
{
    /**
     * @param string $name
     * @param $dir
     */
    public function __construct($name, $dir)
    {
        parent::__construct(sprintf(
            __('View "%s" at "%s" not found.', 'affilicious-theme'),
            $name,
            $dir
        ));
    }
}
