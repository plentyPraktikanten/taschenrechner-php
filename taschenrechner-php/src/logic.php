<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 20.10.15
 * Time: 14:35
 */

    //floatval()  <- könnte noch nützlich sein

    class Logic {
        private $numbers;
        private $operations;
        private static $instance = null;

        //Getter & Setter
        public function setNumber($value){
            $this->numbers = $value;
        }

        public function getNumber(){
            return $this->numbers;
        }

        public function setOperations($value){
            $this->operations = $value;
        }

        public function getOperations(){
            return $this->operations;
        }

        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function add($num, $count){
            $i = 0;
            $numsToCalc = null;
            $result = null;

            foreach($num as $key=>$value){
                if($key <= $count){
                    $numsToCalc[$i] = $value;
                    $i++;
                }
            }

            //All elements of the array add
            foreach($numsToCalc as $key=>$val){
                $result += $val;
            }

            //var_dump($numsToCalc);
            return $result;
        }
    }
?>