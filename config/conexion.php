<?php
    // Stable connection to the database using PDO
    class Conectar {
        protected $dbhost; //

        // Function to connect to the database
        protected function connection() {
            try {
                // $connect = $this->dbhost = new PDO("mysql:host=localhost; dbname=bd_ferreteria", "root", "");
                $connect = $this->dbhost = new PDO("mysql:host=us-cdbr-east-06.cleardb.net; dbname=heroku_58dab3502a9936b", "b1788cb2826d0c", "7e326332");
                return $connect;
            }
            catch (Exception $e) {
                print"Error connecting to database: ".$e->getMessage()." <br>";
                die();
            }
        }

        //Function for convertion of special characters UTF8
        public function set_names() {
            return $this->dbhost->query("SET NAMES 'utf8'");
        }

    }

?>