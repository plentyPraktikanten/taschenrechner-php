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


        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function add($a, $b){
            return $a + $b;
        }

        private function sub($num, $count){
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
                $result -= $val;
            }

            //var_dump($numsToCalc);
            return $result;
        }

        private function multi($a, $b){
            return $a * $b;
        }

        public function Calculate($operations, $numbers){
            //TODO: write function that calculate
            // Multiplied first
            while(isset($numbers[1])) {  // <- Hier hakt es noch!!!
                foreach ($operations as $key => $value) {
                    if ($value == "*") {
                        echo ",";
                        $c = $key + 1;
                        $numbers[$key] = Logic::multi($numbers[$key], $numbers[$c]);

                        // remove number & array reorder
                        unset($numbers[$c]);
                        $numbers = array_values($numbers);

                        // remove operator and reorder
                        unset($operations[$key]);
                        $operations = array_values($operations);

                        break;
                    }
                    switch ($value) {
                        case "+": {
                            echo ".";
                            $c = $key + 1;
                            $numbers[$key] = Logic::add($numbers[$key], $numbers[$c]);
                            echo "<br>";
                            var_dump($numbers);

                            // remove number & array reorder
                            unset($numbers[$c]);
                            $numbers = array_values($numbers);

                            // remove operator and reorder
                            unset($operations[$key]);
                            $operations = array_values($operations);
                        }
                            break;
                    }
                }
            }
            echo "<br>";
            var_dump($numbers, $operations);
            echo "<br>";
            return $numbers[0];
        }
    }
?>