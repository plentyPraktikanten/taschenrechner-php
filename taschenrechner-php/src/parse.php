<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 22.10.15
 * Time: 11:09
 */
    require_once('logic.php');


    //get input from index.php
    if (isset($_POST['input'])){
        $input[0] = $_POST['input'];
    }

//  parse input

    $input[1] = str_split($input[0]);

    foreach($input[1] as $key => $value) {
        if(is_numeric($value)) {
            if(is_numeric($input[1][--$key])){
                end($input[2]);                         // move the internal pointer to the end of the array
                $input[2][key($input[2])] .= $value;    // fetches the key of the element pointed to by the internal pointer
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
                case "+": {
                    $input[3][] = $value;
                }break;

                case "-": {
                    if($input[1][--$key] == "+" || $input[1][--$key] == "*" || $input[1][--$key] == "/"){
                        end($input[2]);
                        $input[2][1+key($input[2])] = $value;
                    }
                }break;

                //TODO: add cases for "*" and  "/" below here
            }
        }
    }

    //TODO: change variables so that they are not twice there
    $operations = $input[3];
    $numbers    = $input[2];

// cleanup array (actual needed?)
    $operations = Logic::getInstance()->cleanupArray($operations);
    $numbers    = Logic::getInstance()->cleanupArray($numbers);


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

                    default: {
                        Logic::getInstance()->debug_to_console("Computer sagt Nein", " Error");
                    }
                }
            }
        }
    }

    //TODO: make an nice output (like: 1+1=2 or 15+-154=139)


?>