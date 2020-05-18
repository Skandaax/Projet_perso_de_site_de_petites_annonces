<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

<div id="center">
    <h1>Inscription</h1>
</div>

<div class="center_div troisd">
    <div class="center">  
        <h2> Inscription </h2>
    </div>
&nbsp;
    <form action="index.php?route=insert_user" method="POST">
        <div id="espace_1">
            <input type="text" id="pseudo" name="pseudo" placeholder="pseudo"  required>
        </div>
        <div id="espace_2">
            <input type="text" id="email" name="email" placeholder="Votre email" required>
        </div>
        <div id="espace_2">
            <input type="text" id="telephone" name="telephoe" placeholder="téléphone" >
        </div>
        <div id="espace_3">
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
        </div>
        <div id="espace_4">
            <input type="password" id="password2" name="password2" placeholder="Confirmer votre mot de passe">
        </div>
        <div id="espace_5">
            <input type="submit" value="envoyer">
        </div>
    </form>
    <div class="log"><a href="index.php?route=login">Login</a></div>
</div>

</body>
</html>