<?php
namespace ProjektAffiliateTheme\Product;

class ProductDetail
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * ProductDetail constructor.
     * @param string $key
     * @param string $name
     * @param mixed $value
     */
    public function __construct($key, $name, $value)
    {
        $this->key = $key;
        $this->name = $name;
        $this->value = $value;
    }
}

