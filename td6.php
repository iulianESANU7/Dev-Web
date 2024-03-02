<?php
$style = 
"
<style>
    .digit { color: green; }
    .uppercase { color: green; }
    .lowercase { color: blue; }

    #menu {
        font-family: \"Arial\";
		margin: 20px;
		margin-top: 130px;
        position: fixed;
        right: 0;
        top: 0;
        width: 200px;
        height: 210px;
        overflow: auto;
        padding: 10px;
        background-color: #111;
        color: white;
		box-shadow: 0 2px 4px 0 rgba(0,0,0,0.3);
    }

    #content {
        margin-right: 210px;
        padding: 10px;
    }
</style>
";
$title = "TD6";
require './include/header.inc.php';
require_once './include/functions.inc.php';
?>

    <div id="menu">
        <h2>Menu</h2>
        <ul>
            <li><a class="lienPbContr" href="#ex1.1">Exercice 1.1</a></li>
            <li><a class="lienPbContr" href="#ex1.2">Exercice 1.2</a></li>
			<li><a class="lienPbContr" href="#ex1.3">Exercice 1.2</a></li>
            <li><a class="lienPbContr" href="#ex2">Exercice 2</a></li>

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
		<p>Test avec valeur (=7) transmise et compris entre 1 et 2 * DEFAULT_TAB_MULTIP</p>
        <?php
            echo tableauMultiplication(7);
        ?>
	</article>
	<article id = "ex1.3">
		<h2>Exercice 1.3</h2>
		<p>Test avec valeur (=0) transmise mais non comprise entre 1 et 2 * DEFAULT_TAB_MULTIP</p>
		<?php
			echo tableauMultiplication(0);
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