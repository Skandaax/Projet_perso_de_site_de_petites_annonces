<?php

//--------------------------------------Base de donnée de connection-----------------------------------
abstract class DbConnect implements Crud {

    protected $pdo;
    protected $id;

    function __construct($id = null) {
        $this->pdo = new PDO(DATABASE, LOGIN, PASSWORD);
        $this->id = $id;
    }

    function setId($id) {
        $this->id = $id;
    }

    abstract function insert();
    abstract function update();
    abstract function delete();
    abstract function selectAll();
    abstract function select();
}