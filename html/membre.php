<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
</head>

<!--Header-->
<header >
    <!--Menu de navigation-->
    <nav class="menu">
        <div class="inner">
            <div class="m-left">
                <h1 class="logo">Mon compte</h1>
            </div>
            <div class="m-right">
                <a href="index.php?route=home" class="m-link">Accueil</a>
                <a href="index.php?route=publish" class="m-link">Publier une annonce</a>
                <a href="index.php?route=deconnect" class="m-link">Deconnexion</a>
            </div>
        </div>
    </nav>

</header>
<body>

<div id="center">
    <h2>Mon profil<h2>
</div>
<div class="center_div">
    <form action="#" method="POST">
        <div id="espace_1">
            <select name="Rôle de l'espace membre" size="1">
                <option>Super admin
                <option>Membre
            </select>
        </div>
        <div id="espace_1">
            <input type="text" id="pseudo" name="Pseudo" placeholder="pseudo">
        </div>
        <div id="espace_2">
            <input type="text" id="email" name="email" placeholder="Votre email" >
        </div>
        <div id="espace_2">
            <input type="text" id="phone" name="phone" placeholder="téléphone" >
        </div>
        <div id="espace_3">
            <input type="password" id="password" name="Password" placeholder="Modifier mon mot de passe" >
        </div>
        <div id="espace_4">
            <input type="password" id="password2" name="Password2" placeholder="Confirmer la modification de votre mot de passe">
        </div>
        <div id="espace_5">
            <h2>Ajouter / Modifier mon avatar</h2>
        </div>
        <div id="espace_4">
            <input type="file" name="fichier"/> 
        </div>
        <br>
        <div id="espace_5">
            <input type="submit" value="Mettre à jour">
        </div>
    </form>
</div>




<!-- Footer-->
<footer  class="f-footer">
    <p class="mentions" ><a id="link" href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a>
        <h6>Copyright &copy2020</h6>
    </p>
</footer> -->

</body>
</html>