<?php
//---crée une session ou restaure celle trouvée sur le serveur,------------------- 
//---via l'identifiant de session passé dans une requête GET, 
//---POST ou par un cookie--------------------------------------------------------
session_start();
var_dump($_SESSION);

//---Chargement automatique des class---------------------------------------------
spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")) {
        require_once "models/$class.php";
    }
});

//--------------------------------------------------------------------------------
//Inclusions class//
// Dans le premier temps, nous allons inclure les fichiers de nos cloasse ici pour pouvoir les utiliser
require "config/global.php";

//--------------------------------------------------------------------------------
//Rooter
//---Structure permetant d'appeler une action en fonction de la requête utilisteur
$route = isset($_REQUEST["route"])? $_REQUEST["route"] : "home";

// var_dump($route);

switch($route) {
    case "home" : $view = showHome(); // Affiche la page d'accueil
        break;
    case "insert_user" : insert_User(); // enregigetrement d'un utilisateur
        break;
    case "connect_user" : connect_User(); // Connection d'un utilisateur
        break;
    case "membre" : $view = showMembre(); // Afficher l'espace membre pour un utilisateur connecter
        break; 
    case "deconnect" : deconnectUser(); // Deconnection de l'utilisateur
        break;
    case "login" : $view = showLogin(); // Action pour charger la page de connection
        break;
    case "inscription" : $view = showInscription(); // Action pour charger la page d'inscription
        break;
    case "publish" : $view = showPublish(); // Action pour charger la page d'insertion d'une annonce
        break;
    case "insert_annonce" : insert_Annonce(); // Action pour enregistrer une annonce
        break;
    default : $view = showHome(); // Afficher la page d'accueil
}

//--------------------------------------------------------------------------------
//---Fonctionnalités d'affichage :
//---Actions déclenchées en fonction du choix de l'utilisateur
//---choix = 1 fonction avc deux "types" de fonctions, celles qui 
//---mèneront à un affichage, et celles qui seront redirigés 
//---(vers un choix conduisant à un affichage)
//---Fonctionnalités d'affichage : 
//--->redirigé vers l'accueil
function showHome()   {
    if(isset($_SESSION["utilisateur"])) { 
       header("location:index.php?route=membre"); 
    }

    $datas = [];
    return ["template" => "home.php", "datas" => $datas];
}

//--->redirigé vers l'espace membre
function showMembre() {

    $ad = new Annonce();
    $ad->setIdUtilisateur($_SESSION["utilisateur"]["id"]);
    $datas = [""];
    $datas['ads'] = $ad->selectByUser();

    
    return ["template" => "membre.php", "datas" => $datas];
}

//--->redirigé vers la page login
function showLogin() {
    return ["template" => "login.php"];
}

//--->redirigé vers la page publish(publier une annonce)
function showPublish() {
    return ["template" => "publish.php"];
}

//--->Redirigé vers la page inscription
function showInscription() {
    return ["template" => "inscription.php"];
}

//--->Fonctionnalité redirigées
function insert_User() {

//---Traitement d'un nouvelle utilisateur---
if(!empty($_POST["Pseudo"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["Password"] === $_POST["Password2"])) {

    echo "ok";

    if (preg_match('#^[a-zA-Z-àâäéèêëïîôöùûüçæœÆŒ-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿÇ()]*$#', $_POST["Pseudo"])) {

        echo "ok";

        $user = new Utilisateur();
        $user->setPseudo($_POST["Pseudo"]);
        $user->setEmail($_POST["email"]);
        $user->setPhone($_POST["phone"]);
        $user->setPassword(password_hash($_POST["Password"], PASSWORD_DEFAULT));

        $verif = $user->Insert();
        
        var_dump($verif);

        if($verif->getIdUtilisateur() != 0) {
            $_SESSION['Pseudo'] = $verif->getPseudo();
            header('Location:index.php?route=membre');

            echo "condition ok";
        }

        echo "Le pseudo est correct";

    }else {
            //on ne peut pas ajouter le nom à la base de données
            echo "Le pseudo est déja utilisé";
        }

        header('Location:index.php?route=login');
    }
    
}

//--->Inserer des annonces
function insert_Annonce() {
    if(!empty($_POST["Titre_annonce"]) && !empty($_POST["description"])
    && !empty($_POST["prix"]) && !empty($_POST["fichier"])) {

    $ad = new Annonce();
    $ad->setIdUtilisateur($_SESSION["utilisateur"]["id"]);
    $ad->setTitre_Annonce($_POST["Titre_annonce"]);
    $ad->setDescription($_POST["description"]);
    $ad->setPrix($_POST["prix"]);
    $ad->setFichier($_POST["fichier"]);

    $ad->insert();
    }
    
    header('Location:index.php?route=membre');
}

//---Connection d'un utilisateur---
function connect_User() {
    
    if(!empty($_POST["Pseudo"]) && !empty($_POST["Password"])) {
        $user = new Utilisateur();
        $user->setPseudo($_POST["Pseudo"]);
        $user->setPassword($_POST["Password"]);
        $new = $user->selectbyuser();
        
        var_dump($new);

        if($new && password_verify($_POST["Password"], $new['Password'])) {
            $_SESSION['idutilisateur'] = $new['idutilisateur'];
            $_SESSION['Pseudo'] = $new['Pseudo'];
            $_SESSION['Password'] = $new['Password'];
            header('Location:index.php?route=membre');
        }else{
            header('Location:index.php');
        }
    }
    header('Location:index.php?route=membre');
}

//---Déconnection de l'utilisateur-----------------------------------------------
function deconnectUser() {
    unset($_SESSION["utilisateur"]);
    header('Location:index.php');
 }


//--------------------------------------------------------------------------------
//.TEMPLATE
// Affichage du système de templates HTML
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <title>Site de petites annonces</title>
</head>
<body>

        <!---Inclusion sous templates--->

        <?php  require "html/{$view['template']}"; ?>

</body>
</html>