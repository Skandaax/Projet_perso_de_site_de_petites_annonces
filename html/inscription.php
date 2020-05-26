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
                <h1 class="logo">Annonces</h1>
            </div>
            <div class="m-right">
                <a href="index.php?route=home" class="m-link">Accueil</a>
                <a href="index.php?route=login" class="m-link">Mon compte</a>
            </div>
        </div>
    </nav>
</header>

<body>

<div id="center">
    <h1>Inscription</h1>
</div>

<div class="center_div troisd">
    <form action="index.php?route=insert_user" method="POST">
        <div id="espace_1">
            <input type="text" id="pseudo" name="Pseudo" placeholder="pseudo"  required>
        </div>
        <div id="espace_2">
            <input type="text" id="email" name="email" placeholder="Votre email" required>
        </div>
        <div id="espace_2">
            <input type="text" id="phone" name="phone" placeholder="téléphone" >
        </div>
        <div id="espace_3">
            <input type="password" id="password" name="Password" placeholder="Votre mot de passe" required>
        </div>
        <div id="espace_4">
            <input type="password" id="password2" name="Password2" placeholder="Confirmer votre mot de passe">
        </div>
        <div id="espace_5">
            <input type="submit" value="envoyer">
        </div>
    </form>
</div>
<div class="log center_div"><a href="index.php?route=login">Login</a></div>

<!--Footer-->
<footer  class="f-footer">
    <p class="mentions" ><a id="link" href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a>
        <h6>Copyright &copy2020</h6>
    </p>
</footer>

</body>
</html>