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
        //CAMBIAR
        $query = $this->db->prepare('SELECT cerveza.*,categoria.nombre AS categoria FROM cerveza JOIN categoria ON cerveza.id_categoria = categoria.id_categoria WHERE cerveza.id_categoria=? ');
        // $query = $this->db->prepare('SELECT * FROM cerveza  ORDER BY cerveza.id_categoria=?');

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