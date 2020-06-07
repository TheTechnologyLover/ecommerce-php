<?php

    class Database {
        
        private $connection;

        public function __construct(){
            $this->set_connection();
        }

        public function set_connection(){
            $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            
            if(mysqli_connect_errno()){
                die("Database connection failed: " . mysqli_error($this->connection));
            }
        }

        public function query($query){
        
            $result = mysqli_query($this->connection, $query);
           
            if($result){
                return $result;
            }

            return false;

        }


    }

    $database = new Database();