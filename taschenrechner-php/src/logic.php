<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 20.10.15
 * Time: 14:35
 */

    //floatval()  <- könnte noch nützlich sein

    class Logic {
        private static $instance = null;

<<<<<<< HEAD
=======

>>>>>>> 311fcc5ea385d190718a5bec4e7d7f2d79172222
        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self();
            }
            return self::$instance;
<<<<<<< HEAD
=======
        }

        private function add($a, $b){
            return $a + $b;
        }

        private function sub($a, $b){
           return $a - $b;
        }

        private function multi($a, $b){
            return $a * $b;
        }

        private function div($a, $b){
            return $a / $b;
        }

        private function sqrt($a){
            return bcsqrt($a, 5);
        }

        private function pow($a, $b){
            return pow($a, $b);
>>>>>>> 311fcc5ea385d190718a5bec4e7d7f2d79172222
        }

        public function Calculate($operations, $numbers){
            //TODO: write function that calculate
            // Multiplied first
            foreach($operations as $key => $value){
                if ($value == "*") {
                    echo ",";
                    $c = $key + 1;
                    $numbers[$key] = Logic::multi($numbers[$key], $numbers[$c]);

                    // remove number & array reorder
                    unset($numbers[$c]);
                    $numbers = array_values($numbers);

<<<<<<< HEAD
            foreach($num as $key=>$value){
                if($key <= $count){
                    $numsToCalc[$i] = $value;
                    //$i++;
=======
                    // remove operator and reorder
                    unset($operations[$key]);
                    $operations = array_values($operations);

                    break;
>>>>>>> 311fcc5ea385d190718a5bec4e7d7f2d79172222
                }
            }

            // than calculate the other
            while(isset($numbers[1])) {
                foreach ($operations as $key => $value) {
                    switch ($value) {
                        case "+": {
                            $c = $key + 1;
                            $numbers[$key] = Logic::add($numbers[$key], $numbers[$c]);

                            // remove number & array reorder
                            unset($numbers[$c]);
                            $numbers = array_values($numbers);

                            // remove operator and reorder
                            unset($operations[$key]);
                            $operations = array_values($operations);
                        }break;

                        case "-": {
                            $c = $key + 1;
                            $numbers[$key] = Logic::sub($numbers[$key], $numbers[$c]);

<<<<<<< HEAD
            return $result;
=======
                            // remove number & array reorder
                            unset($numbers[$c]);
                            $numbers = array_values($numbers);

                            // remove operator and reorder
                            unset($operations[$key]);
                            $operations = array_values($operations);
                        }break;

                        case "/": {
                            $c = $key + 1;
                            $numbers[$key] = Logic::div($numbers[$key], $numbers[$c]);

                            // remove number & array reorder
                            unset($numbers[$c]);
                            $numbers = array_values($numbers);

                            // remove operator and reorder
                            unset($operations[$key]);
                            $operations = array_values($operations);
                        }break;

                    }
                }
            }
            return $numbers[0];
>>>>>>> 311fcc5ea385d190718a5bec4e7d7f2d79172222
        }

        //do not work as it should
        //TODO: fix it
        public function getCoutOfCalc($operations){
            $i = 0;
            foreach($operations as $key=>$values){
                if($values == "+"){
                    $i++;
                }
            }
            echo "<b>".++$i."</b>";
            return $i+1;
        }
    }