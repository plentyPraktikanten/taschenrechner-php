<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 22.10.15
 * Time: 11:09
 */

    class Parse {

        function multiexplode ($delimiters,$string) {
            $ready  = str_replace($delimiters,    $delimiters[0], $string);
            $launch = explode    ($delimiters[0], $ready);
            return  $launch;
        }

        function parseOperations(){
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
        }
    }

    if (issset($_POST['input'])){
        $input = $_POST['input'];
    }
    echo $input;


?>

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
