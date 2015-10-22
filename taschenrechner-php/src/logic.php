<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 20.10.15
 * Time: 14:35
 */
    function multiexplode ($delimiters,$string) {
        $ready  = str_replace($delimiters,    $delimiters[0], $string);
        $launch = explode    ($delimiters[0], $ready);
        return  $launch;
    }

    //floatval()  <- könnte noch nützlich sein

    if(isset($_POST['input'])){
        $input = $_POST['input'];
    }


    $numbers    = multiexplode(array("(", ")", "+", "-", "*", "/", "sqrt2", "sqrt3"), $input);
    $operations = multiexplode(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"), $input);

    $result     = 0.00;

    foreach($operations as $a){
        if($a == "+"){
            $result = $numbers['0'] + $numbers['1'];
        }

        if($a == "-"){
            $result = $numbers['0'] - $numbers['1'];
        }
    }

    echo $result; // Is not jet a float !!!!
    echo '<br>';

    var_dump($numbers, $operations);
?>