<?php

    class Crud {


        public function instantiation(){

            $properties = array();
            foreach( static::$db_fields as $row => $value ){
                $properties[$row] =  $value === "int" ? $this->$row : "'". $this->$row ."'";
            }

            return $properties;

        }

        public function insert(){

            global $database;
            $properties = $this->instantiation();
            unset($properties["id"]);
            $query = "INSERT INTO " . static::$db_table . " (" . implode(", ", array_keys($properties)) . ")" . " VALUES (" . implode(", ", array_values($properties)) . ")";
            
            return $database->query($query);

        }


        public function update(){

            global $database;
            $properties = $this->instantiation();
            $query = "UPDATE " . static::$db_table . " SET ";
            foreach($properties as $key => $value){
                $query .= $key . " = " . $value . ", ";
            }

            $query = substr($query, 0, strlen($query)-2);
            $query .= " WHERE id = " . $this->id;
        
            return $database->query($query);
           
        }

        public function delete() {

            global $database;
            $query = "DELETE FROM " . static::$db_table . " WHERE id = " . $this->id . " LIMIT 1";
            return $database->query($query) ? true : false;

        }

        public static function read($query) {
            
            global $database;
            $result = $database->query($query);
    
            if ($result) {
                $array = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $array[] = $row;
                }
                return $array;
            }
    
            return false;
        }

        public static function search($key, $value, $isNo = true) {

            $calling_class = get_called_class();
            $obj = new $calling_class;
            $attrs = get_object_vars( $obj );


            if($isNo){
                $result = static::read("SELECT * FROM " . static::$db_table . " WHERE $key = $value LIMIT 1");
            }else{
                $result = static::read("SELECT * FROM " . static::$db_table . " WHERE $key = '$value' LIMIT 1");
            }


            if(!empty($result)){
                $result = array_shift($result);
                foreach( $attrs as $key => $value ){
                    if(isset($result[$key])){
                        $obj->$key = $result[$key];
                    }
                }
                return $obj;
            }

            return false;

        }

        public static function multiCreate($key, $value, $table, $toDelete) {
            global $database;
            $sql = "";
    
            if (empty($toDelete)) {
                $query = "insert into " . $table . "( " . implode(", ", $key) . " ) values ";
                for ($i = 0; $i < sizeof($value); $i++) {
                    $sql .= "( " . implode(", ", $value[$i]) . " ), ";
                }
    
                $sql = substr($sql, 0, strlen($sql) - 2);
                $query .= $sql;
                if ($database->query($query)) {
                    return true;
                }
            } else {
    
                foreach ($toDelete as $keyVal => $val) {
                    $sql = $keyVal . " = " . $val . " and ";
                }
                $sql = substr($sql, 0, strlen($sql) - 5);
                $query = "delete from " . $table . " where " . $sql;
                $database->query($query);
                $query = "insert into " . $table . "( " . implode(", ", $key) . " ) values ";
                $sql = "";
                for ($i = 0; $i < sizeof($value); $i++) {
                    $sql .= "( " . implode(", ", $value[$i]) . " ), ";
                }
    
                $sql = substr($sql, 0, strlen($sql) - 2);
                $query .= $sql;
                if ($database->query($query)) {
                    return true;
                }
            }
    
            return false;
        }


        

    }