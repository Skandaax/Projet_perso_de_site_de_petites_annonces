<?php
//-----Défini un cookie qui sera envoyé avec le reste des en-têtes HTTP-----------------
setcookie('save', 'black', time() + 182 * 24 * 60 * 60, '/');

//---Défini les actions de l'utilisateur-------------------------------------------------
class Categorie extends DbConnect {

    public $id_categorie;
    public $unitecentral;
    public $cartemere;
    public $processeur;
    public $ram;
    public $lecteur;
    public $disquedur;
    public $ssd;
    public $pcportable;
    public $pcdebureau;


    //---Constructeur de la classe qui appelle cette méthode-----------------------------
    //---à chaque création d'une nouvelle instance de l'objet----------------------------
    function __construct($id = null) {
        parent::__construct($id);
    }

    //---Get - Récupère la valeur d'une proprièté-----------------------------------------
    //---Set - Permet d'iniialiser la valeur d'une propriété------------------------------
    function setId_Categorie(int $id) {
        $this->setId_Categorie = $id;
    }

    function getId_Categorie() : int {
        return $this->Id_Categorie;
    }
    //--Catégorie de l'unité central---------------------------------------------------------------
    function setUnitecentral(string $unitecentral){
        $this->unitecentral = $unitecentral;
    }
    
    function getunitecentral() : string {
        return $this->unitecentral;
    }

    //--Catégorie de la carte mère---------------------------------------------------------------
    function setcartemere(string $cartemere) {
        $this->cartemere = $cartemere;
    }

    function getcartemere() : string {
        return $this->cartemere;
    }



//---Extension de la base de donnée dbconnect-----------------------------------

    //---sélection de toutes les données d'une table----------------------------


    //---sélection d'une ligne dans la table (selon son ID)----------------------


    //---Permet d'insérer une nouvelle ligne de données dans une table-----------


    //---Mettre à jour un élément de la table------------------------------------


    //---Supprimer une ligne de la table-----------------------------------------

}