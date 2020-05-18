<?php
//-----Défini un cookie qui sera envoyé avec le reste des en-têtes HTTP-----------------
setcookie('save', 'black', time() + 182 * 24 * 60 * 60, '/');

//---Défini les actions de l'utilisateur-------------------------------------------------
class User extends DbConnect {
    private $idutilisateur;
    private $pseudo;
    private $email;
    private $phone;
    private $password;

    //---Constructeur de la classe qui appelle cette méthode-----------------------------
    //---à chaque création d'une nouvelle instance de l'objet----------------------------


    //---Get - Récupère la valeur d'une proprièté-----------------------------------------
    //---Set - Permet d'iniialiser la valeur d'une propriété------------------------------
    function setIdUtilisateur(int $id) {
        $this->idutilisateur = $id;
    }

    function getIdUtilisateur() : int {
        return $this->idutilisateur;
    }

    function setPseudo(string $pseudo) {
        $this->pseudo = $pseudo;
    }

    function getPseudo() : string {
        return $this->pseudo;
    }

    function setEmail(string $email) {
        $this->email = $email;
    }

    function getEmail() : string {
        return $this->email;
    }

    function setPhone(string $phone) {
        $this->pseudo = $pseudo;
    }

    function getPhone() : string {
        return $this->phone;
    }

    function setPssword(string $password) {
        $this->password = $password;
    }

    function getPassword() : string {
        return $this->password;
    }

//---Extension de la base de donnée dbconnect-----------------------------------

    //---sélection de toutes les données d'une table----------------------------


    //---sélection d'une ligne dans la table (selon son ID)----------------------


    //---Permet d'insérer une nouvelle ligne de données dans une table-----------


    //---Mettre à jour un élément de la table------------------------------------


    //---Supprimer une ligne de la table-----------------------------------------

}