
</main>

<footer>
    <address>Auteur : Iulian ESANU
             Contact : <a class="lienPbContr" href="mailto:20iulian04@gmail.com">20iulian04@gmail.com</a>
    </address>
    <time datetime="<?php echo $lastUpdate?>">Date de derniere mise a jour : <?php 
                                                                                $lud = new DateTime($lastUpdate);
                                                                                echo $lud->format('j F Y');
                                                                              ?> </time>
    <time datetime="<?php echo $creation?>">Date de creation : <?php 
                                                                    $cd = new DateTime($creation);
                                                                    echo $cd->format('j F Y');
                                                                ?></time>
</footer>

</body>
</html>