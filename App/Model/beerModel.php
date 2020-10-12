<?php

class beerModel{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=cervezas', 'root', '');
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM cerveza');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getBeerByCategories($id_category){
        $query = $this->db->prepare('SELECT * FROM cerveza GROUP BY cerveza.id_cerveza ORDER BY id_categoria=? DESC');
        $query->execute(array($id_category));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getBeerByID($id) {
        $query = $this->db->prepare('SELECT * FROM cerveza WHERE id_cerveza = ?');
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
        
    }
    public function updateBeer($id_beer, $name, $description, $image, $price, $ibu, $alcohol, $category_id) {
        $query = $this->db->prepare('UPDATE cerveza SET nombre=?, descripcion=?, imagen=?, precio=?, ibu=?, alcohol=?, id_categoria=? WHERE id_cerveza = ?');
        $query->execute(array($name, $description, $image, $price, $ibu, $alcohol, $category_id, $id_beer));
        
    }
   function addBeer($name, $description, $image, $price, $ibu, $alcohol, $category_id) {
 
        $query = $this->db->prepare('INSERT INTO cerveza(nombre, descripcion, imagen, precio, ibu, alcohol, id_categoria) VALUES(?,?,?,?,?,?,?)');
        return $query->execute(array($name, $description, $image, $price, $ibu, $alcohol, $category_id));
    }

    public function deleteBeer($id) {
        $query = $this->db->prepare('DELETE FROM cerveza WHERE id_cerveza = ?');
        $query->execute(array($id));
    }
}