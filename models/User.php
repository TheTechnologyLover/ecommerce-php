<?php

class User extends Crud {
    protected static $db_table = "user";
    protected static $db_fields = array(
        "id"        =>      "int", 
        "firstname"      =>      "string",
        "lastname"      =>      "string",
        "email"     =>      "string", 
        "mobileno"  =>      "string",
        "password"  =>      "string",
        "is_admin"  =>      "int"
    );

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $mobileno;
    public $password;
    public $is_admin;

    public function __construct(){

        foreach( static::$db_fields as $key => $value ){
            $this->$key = $value === "int" ? -1 : "''";
        }

    }

    public static function verify( $email, $password ){
        $result = Crud::read("SELECT * FROM user WHERE email = '$email' and password = '$password'");
        return !empty($result) ? array_shift($result) : false;
    }
}