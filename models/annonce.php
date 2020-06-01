<?php

require "utilisateur.php";

//---Défini les actions de l'annonceur---------------------------------------------------
class Annonce extends DbConnect {
    private $idannonce;
    private $titreannonce;
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
    function setIdAnnonce(int $id) {
        $this->idannonce = $id;
    }

    function getIdAnnonce() : int {
        return $this->idannonce;
    }

    //---Titre de l'annonce----------------------------------------------------------------
    function setTitreAnnonce(string $titreannonce){
        $this->titreannonce = $titreannonce;
    }
    
    function getTitreAnnonce() : string {
        return $this->titreannonce;
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
    function setIdUtilisateur($ids) {
        $this->idutilisateur = $ids;
    }

    function getIdUtilisateur() {
        return $this->idutilisateur;
    }

//---Extension de la base de donnée dbconnect-----------------------------------
    //---sélection de toutes les données d'une table----------------------------
    function selectAll(){
    $query = "SELECT * FROM annonce";
    $result = $this->pdo->prepare($query);
    $result->execute();
    $datas = $result->fetchAll();

    $tab = [];

    foreach ($datas as $data) {
        $ad = new Annonce();
        $ad->setIdAnnonce($data['id_annonce']);
        $ad->setTitreAnnonce($data['Titre_annonce']);
        $ad->setDescription($data['description']);
        $ad->setPrix($data['prix']);
        $ad->setFichier($data['fichier']);
        $ad->setIdUtilisateur($data['idutilisateur']);

    //Appel aux autres setters
    array_push($tab, $ad);
    }
        // var_dump($tab);

        return $tab;
}

    //---Permet d'enregistrer  une donnée dans une table-----------
    function selectByUser(){
        $query ="SELECT * FROM annonce WHERE utilisateur = :ids";
        $result = $this->pdo->prepare($query);
        $result->bindValue("ids", $this->idutilisateur, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetchAll();
        var_dump($datas);

        $tab = [];
        foreach($datas as $data) {
            $ad = new Annonce();
            $ad->setIDAnnonce($data['id_annonce']);
            $ad->setTitreAnnonce($data['Titre_annonce']);
            $ad->setDescription($data['description']);
            $ad->setPrix($data['prix']);
            $ad->setFichier($data['fichier']);
            $ad->setIdUtilisateur($data['idutilisateur']);
            
            array_push($tab, $ad);
        }

        var_dump($tab);
        return $tab;

    }

    //---sélection d'une ligne dans la table (selon son ID)----------------------
    function select() {

        $query ="SELECT id_annonce (Titre_annonce, description, prix, fichier, idutilisateur) 
                FROM annonce WHERE (id_annonce = :id_annonce)";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':id_annonce',$this->id_annonce,PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetch();
        $ad->setIDAnnonce($data['id_annonce']);
        $ad->setTitreAnnonce($data['Titre_annonce']);
        $ad->setDescription($data['description']);
        $ad->setPrix($data['prix']);
        $ad->setFichier($data['fichier']);
        $ad->setIdUtilisateur($data['idutilisateur']);

            return $this;

    }

    //---Permet d'insérer une nouvelle ligne de données dans une table-----------
    function insert() {
        var_dump($this);
            
        $query = "INSERT INTO annonce (Titre_annonce, description, prix, fichier) 
                    VALUES (:Titre_annonce, :description, :prix , :fichier)";
    
        $result = $this->pdo->prepare($query);
        $result->bindValue('Titre_annonce', $this->titreannonce, PDO::PARAM_STR);
        $result->bindValue('description', $this->description, PDO::PARAM_STR);
        $result->bindValue('prix', $this->prix, PDO::PARAM_STR);
        $result->bindValue('fichier', $this->fichier, PDO::PARAM_STR);
        $result->execute();
    
        $this->idannonce = $this->pdo->lastInsertId();
        return $this;
    }

    //---Mettre à jour un élément de la table------------------------------------
    function update(){

    }

    //---Supprimer une ligne de la table-----------------------------------------
    function delete() {

    }
}