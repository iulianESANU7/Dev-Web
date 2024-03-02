<?php

$style = 
"<style>
        #ex4 ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        #ex4 ul li {
            margin-right: 10px;
        }
    </style>
";
$title = "TD5";
require './include/header.inc.php';
require './include/functions.inc.php';
?>
    <article>
        <h2>Exercice 1</h2>
        <?php
            echo "L'heure du serveur est : " . date("H:i:s") . "\n";
        ?>
    </article>

    <article>
        <h2>Exercice 2</h2>
        <?php
            echo helloNumero();
        ?>
    </article>

    <article>
        <h2>Exercice 3</h2>
        <?php
        echo conversionASCII("A");
        echo conversionASCII("0x2B")
        ?>
    </article>

    <article id="ex4">
        <h2>Exercice 4</h2>
        <?php
        echo chiffresHexa();
        ?>
    </article>


    <article>
        <h2>Exercice 5</h2>
        <?php
        echo tabConversion();
        ?>
    </article>

<?php
$lastUpdate = '2024-02-29';
$creation = '2024-02-09';
require './include/footer.inc.php';
?>