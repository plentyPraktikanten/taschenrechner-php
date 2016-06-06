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

    //get input string from index.php
    if (isset($_POST['input'])){
        $input = $_POST['input'];
    }
    echo $input;

    $numbers    = multiexplode(array("(", ")", "+", "-", "*", "/", "sqrt2", "sqrt3"), $input);
    $operations = multiexplode(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"), $input);

    // removes empty array elements
    $i = 0;
    foreach($operations as $a){
        if($a == "") {
            unset($operations[$i]);
            array_values($operations);
        }
        $i++;
    }
    $operations = array_values($operations);

//    $operator = $operations[3];
    foreach($operations as $key=>$value) {
        if ($value == $operations[$key--]) {
            switch ($value) {
                case "+": {
                    $result = Logic::getInstance()->add($numbers, Logic::getInstance()->getCoutofCalc($operations));
                } break;

                default: {
                    echo "<b>Computer sagt Nein</b><br>";
                }
            }
        }
    }

        echo "=", $result, "<br>";
        var_dump($operations, $numbers);
        echo "<br>", getCoutofCalc($operations);