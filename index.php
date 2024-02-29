<?php
/**
 * On peut personnaliser le resultat du require en renseignant ces options:
 * -title : Personnalise le titre de la page (le h1)
 * -article : Permet d'ajouter du code avant le menu de navigation
 * -style : permet d'ajouter du style interne directement dans le head
 * -creation : permet de personnaliser la date de creation    (YYYY-MM-DD)
 * -lastUpdate : permet de personnaliser la date de la derniere mise a jour    (YYYY-MM-DD)
 */

$title = "Bienvenu sur ma page !";
$article = 
"<article>
    <h2>Introduction</h2>
    <p>Cette page est faite dans le contexte des TD du module \"DevWeb\" pendant mon S4 a <a href=\"https://www.cyu.fr/\">CY Cergy Paris Universite</a>. 
        Elle permet de visiter les pages specifiques de chaque TD. N'hesitez pas a y faire un tour!</p>
</article>";
require './include/header.inc.php';
?>

<?php
$lastUpdate = "2024-03-01";
$creation = "2024-02-29";
require './include/footer.inc.php';
?>
