<?php
//---crée une session ou restaure celle trouvée sur le serveur,------------------- 
//---via l'identifiant de session passé dans une requête GET, 
//---POST ou par un cookie--------------------------------------------------------
session_start();
var_dump($_SESSION);

//---Chargement automatique des class---------------------------------------------
spl_autoload_register(function ($class) {
    if(file_exists("view/$class.php")) {
        require_once "view/$class.php";
    }
});

//--------------------------------------------------------------------------------
//Inclusions class//
// Dans le premier temps, nous allons inclure les fichiers de nos cloasse ici pour pouvoir les utiliser
require "config/global.php";


//--------------------------------------------------------------------------------
// Rooter
//---Structure permetant d'appeler une action en fonction de la requête utilisteur
$route = isset($request["route"])? $request["route"] : "home";

switch($route) {
    case "home" : $include = showHome();
        break;
    case "insert_user" : insert_user();
        break;
    case "connect_user" : connect_user();
        break;
    case "insert_annonce" : insert_annonce();
        break;
    case "deconnect" : deconnect_tUser();
        break;
    case "membre" : $include =  showMembre();
        break;
    case "publish" : $include = showPublish();
        break;
    case "login" : $include = showLogin();
        break;
    default : $include = showHome();
}

//--------------------------------------------------------------------------------
// Fonctionnalités d'affichage :
// Actions déclenchées en fonction du choix de l'utilisateur
// choix = 1 fonction avc deux "types" de fonctions, celles qui mèneront à un affichage, et celles qui seront redirigés (vers un choix conduisant à un affichage)
function showHome() : string {
    return "home.php";
}

function showMembre() {
    return "membre.php";
}

function showPublish() {
    return "publish.php";
}

function showLogin() {
    return "login.php";
}

//Fonctionnalité redirigées :
function insert_user() {

//---Traitement d'un nouvelle utilisateur---
if(!empty($_POST["pseudo"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["password"] === $_POST["password2"])) 
     {
         $user = new Utilisateur();
         $user->setPassword($_POST["pseudo"]);
         $user->setPassword($_POST["phone"]);
         $user->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
         $user->setPassword2(password_hash($_POST["password"], PASSWORD_DEFAULT));
         $user->setEmail($_POST["email"]);

     }

     header('Location:index.php');
}

//---Connection d'un utilisateur---
function connect_tUser() {
    
    if(!empty($_POST["pseudo"]) && !empty($_POST["password"])) {
        $user = new Utilisateur();
        $user->setUtilisateur($_POST["id_utilisateur"]);
        $new = $user->verifyUser()?? false;
        
        if($new) {
            if(password_verify($_POST["password"], $new->password)) {
                $_SESSION["pseudo"] = $new;
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Site de petites annonces</title>
</head>
<body>

        <!---Inclusion sous templates--->

       <?php require "html/$include" ?>

</body>
</html>v





