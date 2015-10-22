<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 20.10.15
 * Time: 14:35
 */

    //floatval()  <- könnte noch nützlich sein

    class Logic {
        public $numbers;
        public $operations;

        function abc (){
            $obj1 = new Parse();
            return $obj1->parseOperations();
        }

        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self();
            }
            return self::$instance;
        }
    }

    $result     = 0.00;
    $i          = 0;
    $c          = 0;

//    foreach($operations as $a){
//        if($a == "") {
//            unset($operations[$i]);
//            array_values($operations);
//        }
//
//        $i++;
//    }

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

    var_dump($numbers, $operations);
?>