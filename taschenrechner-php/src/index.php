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

//    echo '<form action="parse.php" method="post"> <input type="text" name="input"> <input type="submit" value="="> </form>';
//    echo "Vor und Nach Klammern muss ein Leerzeichen sein sonst geht das nicht";
?>