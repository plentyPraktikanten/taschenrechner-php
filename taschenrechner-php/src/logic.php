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
/**
 *  some usual function
 */
        public function debug_to_console($data, $object) {
            if($data) {
                if (is_array($data))
                    $output = "<script>console.log( 'Debug Objects" . $object . ": " . implode(',', $data) . "' );</script>";
                else
                    $output = "<script>console.log( 'Debug Objects" . $object . ": " . $data . "' );</script>";

                echo $output;
            }
        }

        public function cleanUpArray($array){
            $i = 0;
            foreach($array as $a){
                if($a == "") {
                    unset($array[$i]);
                    array_values($array);
                }

                if($a == "."){
                    unset($array[$i]);
                    array_values($array);
                }
                $i++;
            }
            $array = array_values($array);

            return $array;
        }

        public function multiexplode ($delimiters,$string) {
            $ready  = str_replace($delimiters,    $delimiters[0], $string);
            $launch = explode    ($delimiters[0], $ready);
            return  $launch;
        }

/**
 *  The main mathematical functions
 */

        public function add($num, $count){
            $numsToCalc = null;
            $result = null;

            foreach($num as $key=>$value){
                if($key <= $count){
                    $numsToCalc[] = $value;
                }
            }

            //All elements of the array add
            foreach($numsToCalc as $key=>$val){
                $result += $val;
            }

            return $result;
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
            $this->debug_to_console(++$i, " count of calc");
            return $i+1;
        }

// the bracket stuff
        public function extractBracketPart($numbers, $operations)
        {
            $this->extractBracketNumbers($numbers, InnerBracket);
        }

        //  Extract nums
        public function extractBracketNumbers($numbers, $startAtInnerBracket){
            foreach($numbers as $key=>$value){
                if($key == $startAtInnerBracket) {
                    if ($value == " ") {
                        $c = ++$key;
                        for ($i = 0; $numbers[$c] != " "; $c++, $i++) {
                            $extractedBracketsNums[$i] = $numbers[$c];
                        }
                    }
                }
            }

            var_dump($extractedBracketsNums);
            return $extractedBracketsNums;
        }

        public function findInnerBracket($array){
            $out = null;

            foreach($array as $key=>$value){
                if($value == "("){
                    $c = ++$key;
                    $out = $key;
                    foreach($array as $key=>$value){
                        if($key == $c){
                            if($value == "("){
                                echo "Test";
                            } elseif($value == ")") {
                                return $out+$key;
                            }
                        }
                    }
                }
            }
        }
    }