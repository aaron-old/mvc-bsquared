<?php

/**
 * Created by PhpStorm.
 * User: Aaron Young
 * Date: 4/17/2016
 * Time: 1:28 AM
 */

use App\Product;

class ProductTest extends PHPUnit_Framework_TestCase
{

    protected $product;

    public function setUp()
    {
        $this->product = new Product('Fallout 4', 59);
    }
    
    public function test_a_product_has_name()
    {

        static::assertEquals('Fallout 4', $this->product->name());
    }


    public function test_a_product_has_cost()
    {

        static::assertEquals(59, $this->product->cost());
    }

}
