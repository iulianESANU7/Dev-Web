<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="iulianESANU" content="DevWeb"/>
    <title>DevWeb iulianESANU</title>
    <link rel="icon"
        type="image/x-icon"
        href="./images/favicon.ico"/>
    <link rel="stylesheet" 
          type="text/css"
          href="./styles.css"/>
    <?php
    if (isset($style)) {
        echo $style;
    }
    ?>
</head>
<body>

<header>
    <a href='./index.php'>
        <img src="./images/cy_logo_dark.png" 
            alt="logo cy"
            title="Logo CY"
        />
    </a>
    <h1><?php if (isset($title)) {echo $title;} else {echo "Titre a placer";}?></h1>
</header>

<main>

<?php                  
if (isset($article)) {
    echo $article;
}
?>

<nav>
    <h2>Navigation</h2>
    <ul>
        <li><a href="./td5.php">Td5</a></li>
        <li><a href="./td6.php">Td6</a></li>
        <li><a href="./td7.php">Td7</a></li>
		<li><a href="./td8.php">Td8 (en construction)</a></li>
    </ul>
</nav>

