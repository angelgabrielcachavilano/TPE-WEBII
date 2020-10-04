<?php

class categoryModel{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=cervezas', 'root', '');
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getById($id_category){
        
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria = ?');
    
        $query->execute(array($id_category));
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}