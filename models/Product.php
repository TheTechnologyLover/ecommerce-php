<?php


class Product extends Crud {

    protected static $db_table = "products";
    protected static $db_fields = array(
        "id"         =>      "int",
        "title"      =>      "string",
        "weight"     =>      "int",
        "price"      =>      "int",
        "deptid"     =>      "int",
        "description"=>      "string",
        "fileid"    =>       "int",
        "out_stock" =>       "int"
    );

    public function __construct(){

        foreach( static::$db_fields as $key => $value ){
            $this->$key = $value === "int" ? -1 : "''";
        }

    }
}