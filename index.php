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

var_dump($route);

switch($route) {
    case "home" : $include = showHome(); // Affiche la page d'accueil
        break;
    case "insert_user" : insert_User(); // enregigetrement d'un utilisateur
        break;
    case "connect_user" : connect_User(); // Connection d'un utilisateur
        break;
    case "membre" : $include = showMembre(); // Afficher l'espace membre pour un utilisateur connecter
        break; 
    case "deconnect" : deconnectUser(); // Deconnection de l'utilisateur
        break;
    case "login" : $include = showLogin(); // Action pour charger la page de connection
        break;
    case "publish" : $include = showPublish(); // Action pour charger la page d'insertion d'une annonce
        break;
    default : $include = showHome(); // Afficher la page d'accueil
}

//--------------------------------------------------------------------------------
// Fonctionnalités d'affichage :
// Actions déclenchées en fonction du choix de l'utilisateur
// choix = 1 fonction avc deux "types" de fonctions, celles qui mèneront à un affichage, et celles qui seront redirigés (vers un choix conduisant à un affichage)
// Fonctionnalités d'affichage : 

function showHome() : string {
    if(isset($_SESSION["utilisateur"])) { 
       // header("location:index.php?route=membre"); 
    }
    return "home.php";
}

function showMembre() {
    $user = new Utilisateur();
    $user->selectAll();
    return "membre.php";
}

function showLogin() {
    return "login.php";
}

function showPublish() {
    return "publish.php";
}

//Fonctionnalité redirigées :
function insert_user() {

//---Traitement d'un nouvelle utilisateur---
if(!empty($_POST["Pseudo"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["Password"] === $_POST["Password2"])) {

    if (preg_match('#^[a-zA-Z-àâäéèêëïîôöùûüçæœÆŒ-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿÇ()]*$#', $_POST["PSEUDO"])) {

        echo "ok";

        $user = new Utilisateur();
        $user->setIdUtilisateur($_POST["utlisateur"]);
        $user->setPseudo($_POST["Pseudo"]);
        $user->setEmail($_POST["email"]);
        $user->setPhone($_POST["phone"]);
        $user->setPassword(password_hash($_POST["Password"], PASSWORD_DEFAULT));

        $user->Insert();

        $_SESSION['Pseudo'] = $pseudo;
        $_SESSION['Password'] = $password;

        echo "Le pseudo est correct";

    }else {
            //on ne peut pas ajouter le nom à la base de données
            echo "Le pseudo n'est pas correct";
        }

     header('Location:index.php');
    }
}

//---Connection d'un utilisateur---
function connect_User() {
    
    if(!empty($_POST["Pseudo"]) && !empty($_POST["pPssword"])) {
        $user = new Utilisateur();
        $user->setPseudo($_POST["Pseudo"]);
        $new = $user->verifyUser()?? false;
        
        if($user) {
            if(password_verify($_POST["Password"], $user->password)) {
                $_SESSION["Pseudo"] = $new;
            }
        }
    }

     header('Location:index.php');
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

        <?php require "html/$include" ?>

</body>
</html>v





