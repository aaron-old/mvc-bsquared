<?php
/**
 * Created by PhpStorm.
 * User: Aaron Young
 * Date: 4/17/2016
 * Time: 1:33 AM
 */

namespace App;


class Product
{
    protected $name;
    protected $cost;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function name() {

        return $this->name;

    }

    public function cost(){
        return $this->cost;
    }

}
