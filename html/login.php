<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Publier une annonce</title>
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
    <h2>Connexion <h2>
</div>
&nbsp;
<div class="center_div ">
    <form action="index.php?route=connect_user" method="POST">
        <div id="espace_2 login_center"><input type="text" id="pseudo name="utilisateur" placeholder="Votre pseudo" required></div>
        
        <div id="espace_3"> <input type="password" id="password" name="password" placeholder="Votre mot de passe" required></div>
       
        <div id="espace_4"><input type="submit" value="Se connecter"></div>
        
    </form>    
</div>
<div class="log center_div"><a href="index.php?route=inscription">Inscription</a></div>

<!--Footer-->
<footer  class="f-footer">
    <p class="mentions" ><a id="link" href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a>
        <h6>Copyright &copy2020</h6>
    </p>
</footer>

</body>
</html>