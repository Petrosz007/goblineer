<?php

class Item
{
    var $id;
    var $name;

    var $marketvalue;
    var $min;
    var $quantity;

    function __construct($id)
    {
        $this->id = $id;

        $this->min = item($id);
    }

    function 
}