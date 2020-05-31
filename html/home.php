<?php

// $ads = $view["datas"]["ad"];
var_dump($view['datas']);

?>

<!DOCTYPE html>
<html lang="fr">
<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Sécurité</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">

</head>

<!--Header-->
<header >
    <!--Menu de navigation-->
    <nav class="menu">
        <div class="inner">
            <div class="m-left">
                <h1 class="logo">Annonces</h1>
            </div>
            <div class="m-right">
                <a href="index.php?route=home" class="m-link">Accueil</a>
                <a href="index.php?route=login" class="m-link">Mon compte</a>
            </div>
        </div>
    </nav>

</header>

<!--Body-->
<body>
    <div class="center_div">
    <ul><?php foreach($ads as $ad) :?> 
        <li>
        Titre de l'annonce : <?php $ad->getTitre_Annonce()?> 
        Description : <?php  $ad->getDescription()?> 
        Prix : <?php $ad->getPrix() ?> 
        Avatar: <?php $ad->getFichier()?> 
        </li>
        <?php endforeach ?>
    </ul>
    </div>
</body>

<!--Footer-->
<footer  class="f-footer">
    <p class="mentions" ><a id="link" href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a>
        <h6>Copyright &copy2020</h6>
    </p>
</footer>

</body>
</html>