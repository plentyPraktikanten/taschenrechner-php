<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 19.10.15
 * Time: 14:57
 */
    $content = file_get_contents("layout/page.html");
    if(!$content){
        echo "Ein Fehler ist aufgetreten";
    }

    echo $content;

    session_start();
    var_dump($_SESSION['result']);

//TODO: write replaceMarkers function so that via showClac display you can see the calculation (maybe in makeShowCalc.php)
?>