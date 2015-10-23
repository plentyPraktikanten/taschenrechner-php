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
    function getCoutOfCalc($operations){
        $i = 0;
        foreach($operations as $key=>$values){
            if($values == "+"){
                $i++;
            }
        }
        return $i+1;
    }

    if (isset($_POST['input'])){
        $input = $_POST['input'];
    }
    echo $input;

    $numbers    = multiexplode(array("(", ")", "+", "-", "*", "/", "sqrt2", "sqrt3"), $input);
    $operations = multiexplode(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"), $input);

    $i = 0;
    foreach($operations as $a){
        if($a == "") {
            unset($operations[$i]);
            array_values($operations);
        }
        $i++;
    }

//    $operator = $operations[3];
    foreach($operations as $key=>$value) {
        if ($value == $operations[$key--]) {
            switch ($value) {
                case "+": {
                    $result = Logic::getInstance()->add($numbers, getCoutofCalc($operations));
                } break;

                default: {
                    echo " gäht nischt<br>";
                }
            }
        }
    }

    echo "=", $result, "<br>";
    var_dump($operations, $numbers);
    echo "<br>", getCoutofCalc($operations);
?>