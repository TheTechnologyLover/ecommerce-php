<?php

    class Session {

        private $signed_in;
        public $user_id;
        public $role;
        public $error;
        public $name;

        function __construct() {
            session_start();
            $this->check_login_status();
            $this->check_message();
        }

        public function is_signed_in(){
            return $this->signed_in;
        }

        public function set_capability($capability){
            $this->role = $_SESSION['role'] = $capability;
        }

        public function login($user) {
            if($user){
                $this->user_id = $_SESSION['user_id'] = $user["id"];
                $this->signed_in = true;
                $this->name = $_SESSION['name'] = $user['firstname'];
            }
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($this->user_id);
            unset($this->name);
            unset($_SESSION['name']);
            session_unset();
            session_destroy();
            $this->signed_in = false;
        }

        private function check_login_status() {
            if(isset($_SESSION['user_id'])) {
                $this->signed_in = true;
                $this->user_id = $_SESSION['user_id'];
                $this->name = $_SESSION['name'];
                $this->role = isset($_SESSION["role"]) ? $_SESSION["role"] : NULL;
            }else{
                unset($this->user_id);
                unset($this->role);
                $this->signed_in = false;
                unset($this->name);
                unset($_SESSION['name']);
            }
        }

        public function message($msg = ""){

            if(!empty($msg)){
                $_SESSION['error'] = $msg;
            }
            else{
                return $this->error;
            }

        }

        private function check_message(){
            if(isset($_SESSION['error'])){
                $this->error = $_SESSION['error'];
                unset($_SESSION['error']);
            }else{
                $this->error = '';
            }

        }


    }

    $Session = new Session();