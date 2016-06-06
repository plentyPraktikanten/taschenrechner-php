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

        public function add($num, $count){
            $i = 0;
            $numsToCalc = null;
            $result = null;

            foreach($num as $key=>$value){
                if($key <= $count){
                    $numsToCalc[$i] = $value;
                    //$i++;
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
            echo "<b>".++$i."</b>";
            return $i+1;
        }
    }