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

    //get input from index.php
    if (isset($_POST['input'])){
        $input = $_POST['input'];
    }
    echo $input;

    //Parse $input
    $numbers    = multiexplode(array("(", ")", "+", "-", "*", "/", "sqrt2", "sqrt3", "pow"), $input);
    $operations = multiexplode(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", " "), $input);

    // removes empty array elements
    $i = 0;
    foreach($operations as $a){
        if($a == "") {
            unset($operations[$i]);
            array_values($operations);
        }

        if($a == "."){
            unset($operations[$i]);
            array_values($operations);
        }
        $i++;
    }
    $operations = array_values($operations);


    //check 4 brackets
    foreach($operations as $key=>$value){
        if($value == "("){
            $isBracket = true;
        }
    }
    if($isBracket){
        //extract part in brackets
        //Logic::getInstance()->extractBracketNumbers($numbers);
        var_dump(Logic::getInstance()->findInnerBracket($operations));
    } else {
        foreach ($operations as $key => $value) {
            if ($value == $operations[$key--]) {
                switch ($value) {
                    case "+": {
                        $result = Logic::getInstance()->add($numbers, Logic::getInstance()->getCoutofCalc($operations));
                    }break;

                    default: {
                        echo "<b>Computer sagt Nein</b><br>";
                    }
                }
            }
        }
    }


/*
    //check for Brackets
    // !!! before bracket has to be an " " & after it!!!
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
                    for($i = 0; $numbers[$c] != " "; $c++, $i++){
                        $extractedBracketsNums[$i] = $numbers[$c];
                    }
                }
            }

            $bracketResult = Logic::getInstance()->Calculate($extractedBracketsOper, $extractedBracketsNums);

            foreach($numbers as $key=>$value){
                if($value == " "){
                    $numbers[$key] = $bracketResult;

                    for($c = $key+1; $numbers[$c] != " "; $c++){
                        unset($numbers[$c]);
                    }
                }

                if($value == " "){
                    unset($numbers[$key]);
                }
            }

            foreach($operations as $key=>$value){
                if($value == "("){
                    $operations[$key] = null;

                    for($c = $key+1; $operations[$c] != ")"; $c++){
                        unset($operations[$c]);
                    }
                }

                if($value == ")"){
                    unset($operations[$key]);
                }
            }
        }
    }*/

    echo " = ", $result, "<br>";
    var_dump($operations, $numbers);
    echo "<br>";
?>