<?php
//-----Défini un cookie qui sera envoyé avec le reste des en-têtes HTTP-----------------
setcookie('save', 'black', time() + 182 * 24 * 60 * 60, '/');

echo "c'est pas OK";

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

    //---Fichier de l'annonceur à uploader---------------------------------------------------
    function setIdUtilisateur(string $idutilisateur){
        $this->idutilisateur = $idutilisateur;
    }
                    
    function getIdUtilisateur() : string {
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
            $user = new utilisateur();
            $user->setId_Annonce($data['id_annonce']);
            $user->setTitre_Annonce($data['Titre_annonce']);
            $user->setDescription($data['description']);
            $user->setPrix($data['prix']);
            $user->setPassword($data['fichier']);
            $user->setIdUtilisateur($data['idutilisateur']);

            //Appel aux autres setters
            array_push($datatab, $user);

        }
        return $datatab;
    }

    //---sélection d'une ligne dans la table (selon son ID)----------------------
    function select() {
        $querry ="SELECT * FROM annonce WHERE id_annonce = $this->id;";
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