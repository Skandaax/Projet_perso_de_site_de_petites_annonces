<?php
//-----Défini un cookie qui sera envoyé avec le reste des en-têtes HTTP-----------------
setcookie('save', 'black', time() + 182 * 24 * 60 * 60, '/');

//---Défini les actions de l'utilisateur-------------------------------------------------
class Utilisateur extends DbConnect {
    private $idutilisateur;
    private $pseudo;
    private $email;
    private $phone;
    private $password;

    //---Constructeur de la classe qui appelle cette méthode-----------------------------
    //---à chaque création d'une nouvelle instance de l'objet----------------------------
    function __construct($id = null) {
        parent::__construct($id);
    }

    //---Get - Récupère la valeur d'une proprièté-----------------------------------------
    //---Set - Permet d'iniialiser la valeur d'une propriété------------------------------
    function setIdUtilisateur(int $id) {
        $this->idutilisateur = $id;
    }

    function getIdUtilisateur() : int {
        return $this->idutilisateur;
    }

    function setPseudo(string $pseudo){
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
        $this->phone = $phone;
    }

    function getPhone() : string {
        return $this->phone;
    }

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
        
        $query = "INSERT INTO utilisateur(id_utilisateur,pseudo,phone, email,Password) 
                    VALUES (:pseudo, :phone, :email, :Password)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':idutilisateur', $this->idutilisateur, PDO::PARAM_STR);
        $result->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $result->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':Password', $this->password, PDO::PARAM_STR);
        $result->execute();

        $this->id = $this->pdo->lastInsertId();
        return $this;
    }


    //---Mettre à jour un élément de la table------------------------------------
    function update(){

    }

    //---Supprimer une ligne de la table-----------------------------------------
    function delete() {

    }

}