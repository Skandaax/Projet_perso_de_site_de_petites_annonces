<?php

//-Interface Crud qui permet  l'intéraction avec une base de données-----
interface Crud {

    function insert();
    function update();
    function delete();
    function selectAll();
    function select();

}