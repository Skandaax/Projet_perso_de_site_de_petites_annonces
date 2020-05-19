<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Publier une annonce</title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css"> -->

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
                <a href="../index.php?route=home" class="m-link">Accueil</a>
                <a href="../index.php?route=membre" class="m-link">Mon compte</a>
                <a href="../index.php?route=publish" class="m-link">Publier une annonce</a>
            </div>
        </div>
    </nav>

</header>
<body>

<div id="center">
    <h2>Publier une annonce <h2>
</div>
&nbsp;
<div class="center_div troisd ">
    <form action="index.php?route=connect_user" method="POST">

        <div><select name="Catégorie informatique" size="1">
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
        <br>
        <div id=""> <input type="password" id="" name="titre_annonce" placeholder="Titre de l'annonce"></div>
        <br>
        <div><textarea id="" name="description"></textarea>
        <br>
        <div id=""> <input type="prix" id="" name="prix" placeholder="Prix"></div>
        <br>
        <input type="file" name="fichier"/>
        <div>
        <h2>Vos informations personnelles<h2>
        </div>
        <div id=""> <input type="Pseudo" id="" name="pseudo" placeholder="pseudo"></div>
        <div id=""> <input type="telephone" id="" name="telephone" placeholder="Téléphone"></div>
        <div id=""> <input type="email" id="" name="email" placeholder="Email"></div>
        <div id=""> <input type="password" id="" name="password" placeholder="Mot de passe"></div>
        <br>
        <div id=""><input type="submit" value="Publier cette annonce"></div>
        
    </form>    
</div>

<!--Footer-->
<footer  class="f-footer">
    <p class="mentions" ><a id="link" href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a>
        <h6>Copyright &copy2020</h6>
    </p>
</footer>

</body>
</html>