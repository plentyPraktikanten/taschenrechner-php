<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 22.10.15
 * Time: 11:09
 */
    require_once('logic.php');

    session_start();
    $_SESSION['result'] = null;


    //get input from index.php
    if (isset($_POST['input'])){
        $input[0] = $_POST['input'];
    }

//  parse input

    $input[1] = str_split($input[0]);

    foreach($input[1] as $key => $value) {
        if(is_numeric($value)) {
            if(is_numeric($input[1][--$key])){
                end($input[2]);
                $input[2][key($input[2])] .= $value;
            } elseif(Logic::getInstance()->checkArrayForComma($input[1]) && strpos($input[2][key($input[2])], '.') - strlen($input[2][key($input[2])]) == -1 && $key-1 > 0){
                $input[2][key($input[2])] .= $value;
            } else {
                end($input[2]);
                if($input[2][key($input[2])] == "-") {
                    $input[2][key($input[2])] .= $value;
                } else {
                    $input[2][] = $value;
                }
            }
        } else {
            switch($value){
                case "+":
                case "*":
                case "/":
                case "(":
                case ")":{
                    $input[3][] = $value;
                }break;

                case "-": {
                    if(($input[1][--$key] == "+" || $input[1][--$key] == "*" || $input[1][--$key] == "/" || $input[1][--$key] == null) && is_numeric($input[1][--$key])){
                        end($input[2]);
                        $input[2][1+key($input[2])] = $value;
                    } else {
                        $input[3][] = $value;
                    }
                }break;

                case ".": {
                    if(is_numeric($input[1][--$key])){
                        end($input[2]);
                        $input[2][key($input[2])] .= $value;
                    }
                }break;
            }
        }
    }

    //echo strpos($input[2][key($input[2])], '.')-strlen($input[2][key($input[2])]);

    //TODO: change variables so that they are not twice there
    $operations = $input[3];
    $numbers    = $input[2];

// cleanup array (actual needed?)
    $operations = Logic::getInstance()->cleanupArray($operations);
    $numbers    = Logic::getInstance()->cleanupArray($numbers);

    /***
     * Calculate
     */

    $clipboard[0] = $operations;
    $clipboard[1] = $numbers;

    //check for brackets
    /*foreach($operations as $key=>$value){
        if($value == "("){
            $isBracket = true;
        }
    }
    if($isBracket){
        $result = "function not yet supported";
    } else {*/
    $i = 0;
    while (count($clipboard[0]) != $i) {
        if($clipboard[0][$i] == "*" || $clipboard[0][$i] == "/"){
            $result = "function not yet supported";
        } else {
            switch($clipboard[0][0]){
                case "+":{
                    $clipboard[1][0] = Logic::getInstance()->add($clipboard[1][0], $clipboard[1][1]);
                }break;

                case "-":{
                    $clipboard[1][0] = Logic::getInstance()->sub($clipboard[1][0], $clipboard[1][1]);
                }break;
            }
        }
        Logic::getInstance()->unsetAndReorderArray($clipboard);
        ++$i;
    }

    print_r($clipboard);
    //}

    $output[0] = $result;   // result
    $output[1] = $input[0]; // calculation

    session_start();
    $_SESSION['result'] = $output;

    var_dump($input, $clipboard); //$result, $operations, $numbers,

//    header("Location: http://localhost:8888/taschenrechner-php/src/");
?>