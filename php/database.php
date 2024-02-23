<?php

    require_once(__DIR__."/env.php");

    require("composer/vendor/autoload.php");

    class DataBaseController {

        public function connect($type = "local") {
            if($type == "local")
                $client = new MongoDB\Client(MONGODB_LOCAL);
            else if($type == "prod")
                $client = new MongoDB\Client(MONGODB);
            
            return $client;
        }

        public function disconnect($client) {
            unset($client);
        }

        public function randomList($length = 10, $numbers = true, $lowercase_letters = false, $uppercase_letters = false, $specials = false) {
            $numbers = "0123456789";
            $lowercase_letters = "abcdefghijklmnopqrstuvwxyz";
            $uppercase_letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $specials = "!@#$%^&*()_-=+;:,.?éèàù";

            $random_road = ($numbers ? $numbers : "") . ($lowercase_letters ? $lowercase_letters : "") . ($uppercase_letters ? $uppercase_letters : "") . ($specials ? $specials : "");

            $code='';
            for($i=0;$i<$length;$i++){
                $code .= $random_road[rand(0, 35)];
            }

            return $code;
        }

        public function generateUUID() {
            $version = "100";
            
            //FORMAT: XXX-YYYYMMDD-HHMMSS-XXXXXX-VVV-ZZZZZX
            //X = Random beetween numbers and letters
            //Y = Year
            //M = Month
            //D = Day
            //H = Hour
            //M = Minute
            //S = Second
            //V = Version
            //Z = Random beetween uppers letters

            $uuid = implode('-', array(
                $this->randomList(3, true, true, true, false),
                date('Ymd'),
                date('His'),
                $this->randomList(6, true, true, true, false),
                $version,
                $this->randomList(5, false, false, true, false).$this->randomList(1, true, true, true, false)
            ));

            return $uuid;
        }
    }

?>