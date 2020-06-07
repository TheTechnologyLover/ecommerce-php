<?php


class Department extends Crud {

    protected static $db_table = "departments";
    protected static $db_fields = array(
        "id"         =>      "int",
        "title"      =>      "string"
    );

    public function __construct(){

        foreach( static::$db_fields as $key => $value ){
            $this->$key = $value === "int" ? -1 : "''";
        }

    }

}