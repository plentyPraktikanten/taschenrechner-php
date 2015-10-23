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

        public function getVarInstance(){
            return $this->instance;
        }

        public static function getInstance(){
            private static $instance = null;

            if(!$instance){
                $instance = new self();
            }
            return $instance;
        }

        public function add($a, $b){
            return $a + $b;
        }
    }

/*    $result     = 0.00;
    $i          = 0;
    $c          = 0;

    foreach($operations as $a){
        if($a == "") {
            unset($operations[$i]);
            array_values($operations);
        }

        $i++;
    }

    $i = 0;
    while (sizeof($operations) >= $c){
        foreach($operations as $a) {
            if ($a == "+") {
                //$result = $numbers['0'] + $numbers['1'];


            }

            if ($a == "-") { $result = $numbers['0'] - $numbers['1']; }

            $i++;
        }

        $c++;
    }

    echo $result; // Is not jet a float !!!!
    echo '<br>';

    var_dump($numbers, $operations);*/
?>