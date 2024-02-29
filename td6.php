<?php
// Les \t et \n polluent vraiment la lisibilite des 
// differents programmes mais en contrepartie on a un code HTML 
// parfaitement lisible.

//Ex1
/**
 * La fonction dresse le tableau de multiplication du parametre
 * donnee et retourne une string qui contient un tableau HTML.
 * Contient une valeur par defaut (10) si l'utilisateur n'en a pas fournit.
 * 
 * @param int Le tableau de multiplication sera celui du parametre
 * @return string String contenant le tableau de multiplication HTML 
 */

 define("DEFAULT_TAB_MULTIP", 10);

 function tableauMultiplication(int $val = DEFAULT_TAB_MULTIP) : string {

    if ($val == 0) { return "Muliplication par 0";}

    $r = "<table>\n";
    $r .= "\t\t\t<caption>\n";
    $r .= "\t\t\t\tTableau de multiplication jusqu'a $val\n";
    $r .= "\t\t\t</caption>\n";

    $r .= "\t\t\t<thead>\n\t\t\t\t<tr>\n\t\t\t\t\t<th>X</th>\n";

    // Generation premiere ligne
    for ($i = 1; $i <= $val; $i++) {
        $r .= "\t\t\t\t\t<th>$i</th>\n";
    }

    $r .= "\t\t\t\t</tr>\n\t\t\t</thead>\n";
    $r .= "\t\t\t<tbody>\n";

    for ($i = 1; $i <= DEFAULT_TAB_MULTIP; $i++) {
        $r .= "\t\t\t\t<tr>\n\t\t\t\t\t<td>$i</td>\n";          // sert a ajouter la premiere colone
        for ($j = 1; $j <= $val; $j++) {                            // dresse le tableau
            $r .= "\t\t\t\t\t<td>" . $j*$i . "</td>\n";
        }
        $r .= "\t\t\t\t</tr>\n";
    }

    $r .= "\t\t\t</tbody>\n";

    return $r . "\t\t</table>\n";
 }

//Ex2
/**
 * Génère une chaine contenant un tableau ASCII en HTML
 * 
 * @return string String contenant le tableau HTML représentant la table ASCII standard
 */

?>
<?php
function tabASCII() {
    $r = "<table>\n";
    $r .= "\t\t\t<caption>Tableau ASCII</caption>\n";
    $r .= "\t\t\t<thead>\n\t\t\t\t<tr>\n\t\t\t\t\t<th></th>\n";

    for ($i = 0; $i < 16; $i++) {                              // mise en place du header
        $r .= "\t\t\t\t\t<th>" . strtoupper(dechex($i)) . "</th>\n";
    }

    $r .= "\t\t\t\t</tr>\n\t\t\t</thead>\n";
    $r .= "\t\t\t<tbody>\n";

    for ($i = 0; $i < 6*17; $i++) {
        
        $decalage = 2 + (int)($i/17);     // decalage du au fait qu'on veut intexer un 
                                          // tableau de 17 colonnes comme un tableau de 16 colonnes.     
        if ($i % 17 == 0) {
            $r .= "\t\t\t\t<tr>\n\t\t\t\t\t<td>$decalage</td>\n";
        } elseif (($i + 31 - $decalage + 2) == 127 ) {
            $r .= "\t\t\t\t\t<td>&#x00A0;</td>\n\t\t\t\t\t</tr>\n";
        } elseif ($i % 17 == 16) {
            $char = htmlspecialchars(chr($i + 31 - $decalage + 2), ENT_QUOTES | ENT_HTML5);
            $class = ctype_digit($char) ? 'digit' : (ctype_upper($char) ? 'uppercase' : (ctype_lower($char) ? 'lowercase' : ''));
            $r .= "\t\t\t\t\t<td class='$class'>" . $char . "</td>\n\t\t\t\t</tr>\n";
        } else {
            $char = htmlspecialchars(chr($i + 31 - $decalage + 2), ENT_QUOTES | ENT_HTML5);
            $class = ctype_digit($char) ? 'digit' : (ctype_upper($char) ? 'uppercase' : (ctype_lower($char) ? 'lowercase' : ''));
            $r .= "\t\t\t\t\t<td class='$class'>" . $char . "</td>\n";
        }
    }

    $r .= "\t\t\t</tbody>\n\t\t</table>\n";

    return $r;
}

$style = 
"
<style>
    .digit { color: red; }
    .uppercase { color: green; }
    .lowercase { color: blue; }

    #menu {
        font-family: \"Arial\";
        position: fixed;
        right: 0;
        top: 0;
        width: 200px;
        height: 100%;
        overflow: auto;
        padding: 10px;
        background-color: black;
        color: white;
    }

    #content {
        margin-right: 210px;
        padding: 10px;
    }
</style>
";
$title = "TD6";
require './include/header.inc.php'
?>

    <div id="menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="#ex1.1">Exercice 1.1</a></li>
            <li><a href="#ex1.2">Exercice 1.2</a></li>
            <li><a href="#ex2">Exercice 2</a></li>

        </ul>
    </div>
    <article id = "ex1.1">
        <h2>Exercice 1.1</h2>
        <?php
            echo tableauMultiplication();
        ?>            
    </article>
    <article id = "ex1.2">
        <h2>Exercice 1.2</h2>
        <?php
            echo tableauMultiplication(7);
        ?>            
    </article>
    <article id = "ex2">
        <h2>Exercice 2</h2>
        <?php
            echo tabASCII();
        ?>
    </article>

<?php
$lastUpdate = "2024-03-01";
$creation = "2024-02-12";
require './include/footer.inc.php';
?>