<?php


class Coupon extends Crud {

    protected static $db_table = "coupons";
    protected static $db_fields = array(
        "id"        =>      "int",
        "code"      =>      "string",
        "type"      =>      "string",
        "value"     =>      "int",
        "mincart"   =>      "int" 
    );

    public $id;
    public $code;
    public $type;
    public $value;
    public $mincart;

    public function __construct(){

        foreach( static::$db_fields as $key => $value ){
            $this->$key = $value === "int" ? -1 : "''";
        }

    }
}