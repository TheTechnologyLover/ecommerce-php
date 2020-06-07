<?php


class Order extends Crud {

    protected static $db_table = "orders";
    protected static $db_fields = array(
        "id"         =>      "int",
        "userid"      =>      "int",
        "date"      =>      "string",
        "transactionid" =>  "string",
        "total"     =>  "int",
        "pincode"   =>   "string",
        "address"   =>  "string",
        "landmark"  =>  "string",
        "coupon"    =>  "string",
        "saved"     =>  "int",
        "status"    =>  "string"
    );

    public function __construct(){

        foreach( static::$db_fields as $key => $value ){
            $this->$key = $value === "int" ? -1 : "''";
        }

    }

}