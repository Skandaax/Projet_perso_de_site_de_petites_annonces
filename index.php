<?php
//---crée une session ou restaure celle trouvée sur le serveur,------------------- 
//---via l'identifiant de session passé dans une requête GET, 
//---POST ou par un cookie--------------------------------------------------------
session_start();
var_dump($_SESSION);
//--------------------------------------------------------------------------------
// Inclusions class//
// Dans le premier temps, nous allons inclure les fichiers de nos cloasse ici pour pouvoir les utiliser


//--------------------------------------------------------------------------------
// Rooter
//---Structure permetant d'appeler une action en fonction de la requête utilisteur
$route = isset($request["route"])? $request["route"] : "home";

switch($route) {
    case "home" : $include = showHome();
        break;
    case "logout" : $include =  showLogout();
        break;
    case "publish" : $include = showPublish();
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

function showLogout() {
    return "inscription.php";
}

function showPublish() {
    return "publish.php";
}



//Fonctionnalité redirigées :


//---Traitement d'un nouvelle utilisateur---



//---Connection d'un utilisateur---



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





