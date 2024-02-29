<?php
    //Ex2
    function helloNumero() : string {
        $a = "<ul>\n";
        for ($i = 1; $i <= 20; $i++) {
            $a .= "\t\t\t<li>Hello numéro $i</li>\n";
            
        }
        $a .= "\t\t</ul>\n";
        return $a;
    }

    //Ex3
    function conversionASCII(string $s) : string {
        $r = "<span>";

        if (strpos($s,"0x") != "") { //cas hexa
            $r .= "$s = " . hexdec($s) . " = '" . chr(hexdec($s)) . "'";
        } elseif (ord($s) >= 33 && ord($s) <= 127 && strlen($s) == 1) { //cas caractere ascii
            $r .= "0x" . dechex(ord($s)) . " = " . ord($s) . " = '$s'";
        } else { // cas decimal
            $r .= "0x" . dechex($s) . " = $s = '" . chr($s) . "'";
        }

        return $r . "</span>";
    }

    //Ex4
    function chiffresHexa() {
        $r = "<ul>";
        for ( $i = 0; $i < 16; $i++) {
            $r .= "<li>0x" . dechex($i) . "</li>";
        }
        return $r . "</ul>";
    }

    //Ex5
    function tabConversion() : string {
        $r = "<table>";
        $r .= "<caption>Illustration 1 : conversion bases 2, 8, 10, 16.</caption>";
        $r .= "<thead><tr><th>binaire</th><th>octa</th><th>décimal</th><th>hexadécimal</th></tr></thead><tbody>";

        for ($i = 0; $i <= 17; $i++) {
            $r .= "<tr><td>" . sprintf("%08b", $i) . "</td><td>" . decoct($i) . "</td><td>$i</td><td>". strtoupper(str_pad(dechex($i), 2, "0", STR_PAD_LEFT)) . "</td></tr>";
        }

        return $r . "</tbody></table>";
    }

    //ascii table 
    /*
    function asciitable() : string{
        $r = "<ul>";
        for ($i = 1; $i <= 255; $i++) {
            $r .= "<li>ASCII code of " . chr($i) . " is : $i</li>";
        }
        return $r;
    }
    */
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