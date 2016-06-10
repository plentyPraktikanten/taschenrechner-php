<?php
/**
 * Created by IntelliJ IDEA.
 * User: praktikant
 * Date: 09.06.16
 * Time: 13:44
 */



function showCalc($calc){
    $output  = "<div>";

    if(($calc[0] != "synErr" || $calc[0] != "mathErr") && isset($calc[0])){

        $output .= $calc[1] ." = ". $calc[0];

        //TODO: finish this...

    } else {
        switch($calc[0]){
            case "synErr":{
                $output = "<h1>Syntax Error</h1>";
            }break;

            case "mathErr":{
                $output = "<h1>Math Error</h1>";
            }break;
        }
    }

    $output .= "</div>";
    return $output;
}