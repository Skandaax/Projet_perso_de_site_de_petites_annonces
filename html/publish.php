<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Publier un annonce</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

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

</body>
</html>