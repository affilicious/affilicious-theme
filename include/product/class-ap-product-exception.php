<?php
if(!defined('ABSPATH')) exit('Not allowed to access pages directly.');

class AP_Product_Not_Found extends Exception
{
    /**
     * @param string $id
     */
    public function __construct($id)
    {
        parent::__construct(sprintf(
            __('Failed to find the product with the id %d.'), $id
        ));
    }
}
