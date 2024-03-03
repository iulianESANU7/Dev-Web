<?php
$title = "TD7";
require './include/header.inc.php';
require_once './include/functions.inc.php';
?>

<article>
	<h2>Exercice 3.1</h2>
	<?php echo regions();?>
</article>

<article>
	<h2>Exercice 3.2</h2>
	<?php echo regions(true);?>
</article>

<article>
	<h2>Exercice 4</h2>
	<?php 
		$origines = originesEtymologiques();
		echo "Origine étymologique du jour de la semaine : " . $origines[0] . "<br>";
		echo "Origine étymologique du mois de l'année : " . $origines[1] . "<br>";
	?>
</article>

<article>
	<h2>Exercice 5</h2>
	<?php 
		echo get_navigateur();
	?>
</article>

<?php
$lastUpdate = "2024-03-01";
$creation = "2024-03-01";
require './include/footer.inc.php'
?>