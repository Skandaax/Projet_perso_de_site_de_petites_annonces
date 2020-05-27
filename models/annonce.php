<?php

//---Défini les actions de l'annonceur---------------------------------------------------
class Annonce extends DbConnect {
    private $id_annonce;
    private $titre_annonce;
    private $description;
    private $prix;
    private $fichier;
    private $idutilisateur;

    //---Constructeur de la classe qui appelle cette méthode-----------------------------
    //---à chaque création d'une nouvelle instance de l'objet----------------------------
    function __construct($id = null) {
        parent::__construct($id);
    }

    //---Get - Récupère la valeur d'une proprièté-----------------------------------------
    //---Set - Permet d'iniialiser la valeur d'une propriété------------------------------
    //---ID de l'annonce------------------------------------------------------------------
    function setId_Annonce(int $id) {
        $this->id_annonce = $id;
    }

    function getId_Annonce() : int {
        return $this->id_annonce;
    }

    //---Titre de l'annonce----------------------------------------------------------------
    function setTitre_Annonce(string $titre_annonce){
        $this->titre_annonce = $titre_annonce;
    }
    
    function getTitre_Annonce() : string {
        return $this->titre_annonce;
    }

    //---Description de l'annonce-----------------------------------------------------------
    function setDescription(string $description){
        $this->description = $description;
    }
        
    function getDescription() : string {
        return $this->description;
    }

    //---Prix du produit de l'annonce-------------------------------------------------------
    function setPrix(string $prix){
        $this->prix = $prix;
    }
            
    function getPrix() : string {
        return $this->prix;
    }

    //---Fichier de l'annonceur à uploader---------------------------------------------------
    function setFichier(string $fichier){
        $this->fichier = $fichier;
    }
                
    function getFichier() : string {
        return $this->fichier;
    }

    //---Id de l'utilisateur---------------------------------------------------
    function setIdUtilisateur(int $id) {
        $this->idutilisateur = $idutilisateur;
    }
                    
    function getIdUtilisateur() : int {
        return $this->idutilisateur;
    }

//---Extension de la base de donnée dbconnect-----------------------------------
    //---sélection de toutes les données d'une table----------------------------
    function selectAll(){
        $query = "SELECT * FROM annonce";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();

        $datatab = [];

        foreach ($datas as $data) {
            $ad = new Annonce();
            $ad->setId_Annonce($data['id_annonce']);
            $ad->setTitre_Annonce($data['Titre_annonce']);
            $ad->setDescription($data['description']);
            $ad->setPrix($data['prix']);
            $ad->setFichier($data['fichier']);
            $ad->setIdUtilisateur($data['idutilisateur']);

            //Appel aux autres setters
            array_push($datatab, $user);

        }
        return $datatab;
    }

    //---Permet de d'enregistrer  une donnée dans une table-----------
    function selectByUser(){
        $query ="SELECT * FROM annonce WHERE idutilisateur = :id;";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id', $this->idutilisateur, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetchAll();
        var_dump($datas);

        $ad = [];
        foreach($datas as $elem) {
            $ad =new Annonce();
            $ad->setID_Annonce($elem['id_annonce']);
            $ad->setTitre_Annonce($elem['Titre_annonce']);
            $ad->setDescription($elem['description']);
            $ad->setIdUtilisateur($elem['idutilisateur']);
            $ad->setPrix($elem['prix']);
            $ad->setFichier($elem['fichier']);

            array_push($annonce);
        }

        return $ad;
    }

    

    //---sélection d'une ligne dans la table (selon son ID)----------------------
    function select() {
        $querry ="SELECT * FROM annonce WHERE id_annonce = $this->id;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $data = $result->fetch();
    
            return $this;
    }

    //---Permet d'insérer une nouvelle ligne de données dans une table-----------
    function insert() {
        var_dump($this);
            
        $query = "INSERT INTO annonce(Titre_annonce, description, prix, fichier) VALUES (:Titre_annonce, :description, :prix , :fichier)";
    
        $result = $this->pdo->prepare($query);
        $result->bindValue('Titre_annonce', $this->titre_annonce, PDO::PARAM_STR);
        $result->bindValue('description', $this->description, PDO::PARAM_STR);
        $result->bindValue('prix', $this->prix, PDO::PARAM_STR);
        $result->bindValue('fichier', $this->fichier, PDO::PARAM_STR);
        $result->execute();
    
        $this->id_annonce = $this->pdo->lastInsertId();
        return $this;
    }

    //---Mettre à jour un élément de la table------------------------------------
    function update(){

    }

    //---Supprimer une ligne de la table-----------------------------------------
    function delete() {

    }
}