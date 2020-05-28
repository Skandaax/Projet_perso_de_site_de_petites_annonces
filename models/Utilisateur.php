<?php

//---Défini les actions de l'utilisateur-------------------------------------------------
class Utilisateur extends DbConnect {
    private $idutilisateur;
    private $role;
    private $pseudo;
    private $email;
    private $phone;
    private $password;

    //---Défini le rôle de l'utilisateur-------------------------------------------------
    private $super_admin;
    private $membre;
    private $visiteur;

    //---Constructeur de la classe qui appelle cette méthode-----------------------------
    //---à chaque création d'une nouvelle instance de l'objet----------------------------
    function __construct($id = null) {
        parent::__construct($id);
    }

    //---Get - Récupère la valeur d'une proprièté-----------------------------------------
    //---Set - Permet d'iniialiser la valeur d'une propriété------------------------------
    //--Rôle de l'utlisateur--------------------------------------------------------------
    function setRole(string $role){
        $this->role = $role;
    }
        
    function getRole() : string {
        return $this->role;
    }
    
    //--->Super administrateur
    function setSuper_Admin(string $super_admin){
        $this->super_admin = $super_admin;
    }
        
    function getSuper_Admin() : string {
        return $this->$super_admin;
    }
    
    //--->Membre
    function setMembre(string $membre){
        $this->membre = $membre;
    }
            
    function getMembre() : string {
        return $this->$membre;
    }

    //--->Visiteur
    function setVisiteur(string $visiteur){
        $this->visiteur = $visiteur;
    }
                
    function getVisiteur() : string {
        return $this->$visiteur;
    }

    //---ID Utilisateur-------------------------------------------------------------------
    function setIdUtilisateur(int $id) {
        $this->idutilisateur = $id;
    }

    function getIdUtilisateur() : int {
        return $this->idutilisateur;
    }

    //---Pseudo de l'utlisateur------------------------------------------------------------
    function setPseudo(string $pseudo){
        $this->pseudo = $pseudo;
    }
    
    function getPseudo() : string {
        return $this->pseudo;
    }

    //--Mail de l'utlisateur---------------------------------------------------------------
    function setEmail(string $email) {
        $this->email = $email;
    }

    function getEmail() : string {
        return $this->email;
    }

    //--Numéro de téléphone de l'utlisateur-------------------------------------------------
    function setPhone(string $phone) {
        $this->phone = $phone;
    }

    function getPhone() : string {
        return $this->phone;
    }

    //--Mot de passe de l'utlisateur--------------------------------------------------------------
    function setPassword(string $password) {
        $this->password = $password;
    }

    function getPassword() : string {
        return $this->password;
    }

//---Extension de la base de donnée dbconnect-----------------------------------

    //---sélection de toutes les données d'une table----------------------------
    function selectAll(){
        $query = "SELECT * FROM utilisateur";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();

        $datatab = [];

        foreach ($datas as $data) {
            $user = new utilisateur();
            $user->setRole($data['role']);
            $user->setIdUtilisateur($data['idutilisateur']);
            $user->setPhone($data['phone']);
            $user->setPseudo($data['Pseudo']);
            $user->setEmail($data['email']);
            $user->setPassword($data['Password']);

            //Appel aux autres setters
            array_push($datatab, $user);
        }
        return $datatab;
    }

    //---sélection d'une ligne dans la table (selon son ID)----------------------
    function select() {
        $querry ="SELECT * FROM utilisateur WHERE idutilisateur = $this->id;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $data = $result->fetch();
    
            return $this;
        }


    //---Permet d'insérer une nouvelle ligne de données dans une table-----------
    function insert() {
        var_dump($this);
        
        $query = "INSERT INTO utilisateur(Pseudo, email, phone, Password, role) VALUES (:Pseudo, :email, :phone , :Password, :role)";

        $result = $this->pdo->prepare($query);
        $result->bindValue('Pseudo', $this->pseudo, PDO::PARAM_STR);
        $result->bindValue('phone', $this->phone, PDO::PARAM_STR);
        $result->bindValue('email', $this->email, PDO::PARAM_STR);
        $result->bindValue('Password', $this->password, PDO::PARAM_STR);
        $result->bindValue('role', $this->role, PDO::PARAM_STR);
        $result->execute();

        $this->idutilisateur = $this->pdo->lastInsertId();
        return $this;
    }


    //---Permet de me connecter sur une ligne d'une donnée dans une table-----------
    function selectByUser(){
        $querry ="SELECT * FROM utilisateur WHERE Pseudo = :Pseudo;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $data = $result->fetch();
    
            return $this;
    }


    //---Mettre à jour un élément de la table------------------------------------
    function update(){

    }

    //---Supprimer une ligne de la table-----------------------------------------
    function delete() {

    }
}