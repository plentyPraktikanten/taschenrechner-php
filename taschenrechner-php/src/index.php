<?php
/**
 * Created by IntelliJ IDEA.
 * User: prakikant
 * Date: 19.10.15
 * Time: 14:57
 */
    session_start();
    $content = '<!DOCTYPE html>
    <html>
        <head lang="de">
            <meta charset="UTF-8">
            <title>Rechner</title>
            <link rel="stylesheet" type="text/css" href="layout/stylesheet.css">
        </head>
        <body>
    <script src="layout/keypadButtonPressLogic.js"></script>
    <div class="outer">
        <div class="middle">
            <div class="showCalc">
                ###PLACEHOLDER###
            </div>
            <form action="../src/parse.php" method="post">
                <input type="text" value="'.$_SESSION["result"][0].'" name="input" id="screen"/>
                <div id="keypad">
                    <button class="button">7</button>
                    <button class="button">8</button>
                    <button class="button">9</button>
                    <button class="button" value="/">÷</button>
                    <button class="button" value="clear">c</button>
                    <br />
                    <button class="button">4</button>
                    <button class="button">5</button>
                    <button class="button">6</button>
                    <button class="button" value="*">x</button>
                    <input  class="button b1" type="submit" value="=" />
                    <br />
                    <button class="button">1</button>
                    <button class="button">2</button>
                    <button class="button">3</button>
                    <button class="button">-</button>
                    <br />
                    <button class="button">0</button>
                    <button value="BtnSign" class="button">±</button>
                    <button class="button">.</button>
                    <button class="button">+</button>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>';

    //<input value="$input"></input>

    echo $content;

//TODO: write replaceMarkers function so that via showClac display you can see the calculation (maybe in makeShowCalc.php)
?>