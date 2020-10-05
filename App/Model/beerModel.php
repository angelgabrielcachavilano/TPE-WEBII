<?php

class beerModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=cervezas', 'root', '');
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM cerveza');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getBeerByCategories($id_category){
        //CAMBIAR
        $query = $this->db->prepare('SELECT cerveza.*,categoria.nombre AS categoria FROM cerveza JOIN categoria ON cerveza.id_categoria = categoria.id_categoria WHERE cerveza.id_categoria=? ');
        // $query = $this->db->prepare('SELECT * FROM cerveza  ORDER BY cerveza.id_categoria=?');
        $query->execute(array($id_category));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}