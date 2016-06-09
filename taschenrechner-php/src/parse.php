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
                    if($input[1][--$key] == "+" || $input[1][--$key] == "*" || $input[1][--$key] == "/" || $input[1][--$key] == null){
                        end($input[2]);
                        $input[2][1+key($input[2])] = $value;
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

    //check 4 brackets
    foreach($operations as $key=>$value){
        if($value == "("){
            $isBracket = true;
        }
    }
    if($isBracket){
        $result = "This function is not jet supported";
    } else {
        foreach ($operations as $key => $value) {
            if ($value == $operations[$key--]) {
                switch ($value) {
                    case "+": {
                        $result = Logic::getInstance()->add($numbers, Logic::getInstance()->getCoutofCalc($operations));
                    }break;

                    case "*":
                    case "/":
                    case "-":{
                        $result = "function not yet supported";
                    }break;

                    default: {
                        //TODO: build an actual error message
                        Logic::getInstance()->debug_to_console("Computer sagt Nein", " Error");
                    }
                }
            }
        }
    }

    $output[0] = $result;
    $output[1] = $input[0];

    session_start();
    $_SESSION['result'] = $output;

    var_dump($input, $result, $operations, $numbers);

//    header("Location: http://localhost:8888/taschenrechner-php/src/");
?>