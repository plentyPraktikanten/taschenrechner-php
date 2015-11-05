<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 22.10.15
 * Time: 11:09
 */
    require_once('logic.php');

    function multiexplode ($delimiters,$string) {
        $ready  = str_replace($delimiters,    $delimiters[0], $string);
        $launch = explode    ($delimiters[0], $ready);
        return  $launch;
    }


    //do not work as it should
//    function getCoutOfCalc($operations){
//        $out = array("+" => 0, "-" => 0);
//
//        foreach($operations as $key=>$values){
//            $c = $key-1;
//
//            if($values == $operations[$c]){
//                switch($values){
//                    case "+":{
//                        echo "test";
//                        $out["+"]++;
//                    }break;
//
//                    case "-":{
//                        echo "-";
//                        $out["-"]++;
//                    }break;
//
//                    default:{
//                        echo "Meh";
//                    }
//                }
//            } else if ($values != $operations[$c]){
//                $out[$values]++;
//                echo "bla";
//            }
//        }
//
//        foreach($out as $key2=>$values2){
//            if($values2 != 0){
//                $out[$key2]++;
//                echo ".";
//            }
//        }
//
//        return $out;
//    }

    if (isset($_POST['input'])){
        $input = $_POST['input'];
    }
    echo $input;

    $numbers    = multiexplode(array("(", ")", "+", "-", "*", "/", "sqrt2", "sqrt3"), $input);
    $operations = multiexplode(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", " "), $input);

    $i = 0;
    foreach($operations as $a){
        if($a == "") {
            unset($operations[$i]);
            array_values($operations);
        }
        $i++;
    }

    $numbers    = array_values($numbers);
    $operations = array_values($operations);
/*
    //check for Brackets
    // !!! before bracket has to be an " " !!!
    foreach($operations as $key=>$value){
        if($value = "("){
            //extract part in Brackets
            //  Extract operations
            foreach($operations as $key=>$value){
                if($value == "("){
                    $c = $key+1;
                    for($i = 0; $operations[$c] != ")"; $c++, $i++) {
                        $extractedBracketsOper[$i] = $operations[$c];
                    }
                }
            }

            //  Extract nums
            foreach($numbers as $key=>$value){
                if($value == " "){
                    $c = $key+1;
                    for($i = 0; $numbers[$c] != ""; $c++, $i++){
                        $extractedBracketsNums[$i] = $numbers[$c];
                    }
                }
            }

            $bracketResult = Logic::getInstance()->Calculate($extractedBracketsOper, $extractedBracketsNums);

            foreach($numbers as $key=>$value){
                if($value == " "){
                    $numbers[$key] = $bracketResult;

                    $c = $key + 1;
                    for($i = 0; $numbers[$c] != ""; $c++, $i++){
                        unset($numbers[$c]);
                    }
                }

                if($value == ""){
                    unset($numbers[$key]);
                }
            }

            foreach($operations as $key=>$value){
                if($value == "("){
                    $operations[$key] = null;

                    $c = $key + 1;
                    for($i = 0; $operations[$c] != ")"; $c++, $i++){
                        unset($operations[$c]);
                    }
                }

                if($value == ")"){
                    unset($operations[$key]);
                }
            }
        }
    }*/

    $result = Logic::getInstance()->Calculate($operations, $numbers);

    //debug outputs
    echo " = ", $result, "<br>";
    var_dump($operations, $numbers);
    echo "<br>";
    var_dump($extractedBracketsNums, $extractedBracketsOper);
?>