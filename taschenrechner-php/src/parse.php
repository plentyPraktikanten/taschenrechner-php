<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 22.10.15
 * Time: 11:09
 */


    function multiexplode ($delimiters,$string) {
        $ready  = str_replace($delimiters,    $delimiters[0], $string);
        $launch = explode    ($delimiters[0], $ready);
        return  $launch;
    }
        /*function parseOperations(){
            if (issset($_POST['input'])){
                $input = $_POST['input'];
            }

            $operations = $this->multiexplode(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"), $input);

            return $operations;
        }

        function parseNumbers($input) {
            if (isset($_POST['input'])) {
                $input = $_POST['input'];
            }

            $numbers = $this->multiexplode(array("(", ")", "+", "-", "*", "/", "sqrt2", "sqrt3"), $input);

            return $numbers;
        }*/

    if (isset($_POST['input'])){
        $input = $_POST['input'];
    }
    echo $input, "<br>";

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

    $a = $numbers[0];
    $b = $numbers[1];

    $operator = $operations[1];

    switch($operator){
        case "+":
        {
            $result = Logic::getInstance()->add($a, $b);
//            echo $result;
        } break;

        default:
        {
            echo "gäht nischt";
        }
    }

    var_dump($operations, $numbers);
?>
<!--
/*function parse($input) {
if (isset($_POST['input'])) {
$input = $_POST['input'];
}


$numbers    = $this->multiexplode(array("(", ")", "+", "-", "*", "/", "sqrt2", "sqrt3"), $input);
$operations = $this->multiexplode(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"), $input);

$parsd = array(
0 => $numbers,
1 => $operations
);

return $parsd;
}*/
