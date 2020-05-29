<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Publier une annonce</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="header.css">

</head>

<!--Header-->
<header >
    <!--Menu de navigation-->
    <nav class="menu">
        <div class="inner">
            <div class="m-left">
                <h1 class="logo">Publier une nnonces</h1>
            </div>
            <div class="m-right">
                <a href="index.php?route=home" class="m-link">Accueil</a>
                <a href="index.php?route=login" class="m-link">Mon compte</a>
                <a href="index.php?route=publish" class="m-link">Publier une annonce</a>
            </div>
        </div>
    </nav>

</header>
<body>

<div id="center">
    <h2>Publier une annonce <h2>
</div>
<div class="center_div">
    <form action="index.php?route=insert_annonce" method="POST">
        <div>
            <select name="Catégorie informatique" size="1">
            <option>Catégorie informatique
            <option>unité central
            <option>carte mère
            <option>processeur
            <option>RAM
            <option>Lecteur DVD/bluray
            <option>Disque dur
            <option>SSD
            <option>PC portable
            <option>PC de bureau
            </select>
        </div>
        <div id="espace_2"> <input type="text" id="" name="Titre_annonce" placeholder="Titre de l'annonce" required></div>
            <div><textarea id="espace_3" name="description" placeholder="description" required></textarea>
        <div id="espace_4"> <input type="text" id="" name="prix" placeholder="Prix" required></div>
            <input id="espace_4" type="file" name="fichier" >
        <div>
        <div id="espace_5">
            <input type="submit" value="Publier">
        </div>
    </form>    
</div>

<!-- Footer
<footer  class="f-footer">
    <p class="mentions" ><a id="link" href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a>
        <h6>Copyright &copy2020</h6>
    </p>
</footer> -->

</body>
</html>