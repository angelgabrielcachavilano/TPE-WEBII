<?php
    class beerModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=cervezas', 'root', '');
        }

        function getAll(){
            $query = $this->db->prepare('SELECT cerveza.*,categoria.*, categoria.nombre AS categoria_nombre , cerveza.nombre AS nombre FROM cerveza INNER JOIN categoria ON cerveza.id_categoria = categoria.id_categoria');
            $query->execute();
            // $query->rowCount();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function getBeerByCategories($id_category){
            // $query = $this->db->prepare('SELECT * FROM cerveza GROUP BY cerveza.id_cerveza ORDER BY id_categoria=? DESC');
            $query = $this->db->prepare('SELECT cerveza.*,categoria.*, categoria.nombre AS categoria_nombre , cerveza.nombre AS nombre FROM cerveza INNER JOIN categoria ON cerveza.id_categoria = categoria.id_categoria ORDER BY cerveza.id_categoria = ? DESC');
            $query->execute(array($id_category));
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getBeerByID($id) {
            $query = $this->db->prepare('SELECT cerveza.*,categoria.*, categoria.nombre AS categoria_nombre , cerveza.nombre AS nombre FROM cerveza INNER JOIN categoria ON cerveza.id_categoria = categoria.id_categoria WHERE id_cerveza=?');
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

        function deleteBeer($id) {
            $query = $this->db->prepare('DELETE FROM cerveza WHERE id_cerveza = ?');
            $query->execute(array($id));
        }

        function filter($value){
            $query = $this->db->prepare('SELECT cerveza.*,categoria.*, categoria.nombre AS categoria_nombre , cerveza.nombre AS nombre FROM cerveza INNER JOIN categoria ON cerveza.id_categoria = categoria.id_categoria WHERE cerveza.nombre LIKE ?');
            $query->execute(array("%".$value."%"));
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        // paginado 
        function getAllPagination(){
            $query = $this->db->prepare('SELECT cerveza.*,categoria.*, categoria.nombre AS categoria_nombre , cerveza.nombre AS nombre FROM cerveza INNER JOIN categoria ON cerveza.id_categoria = categoria.id_categoria');
            $query->execute();
            return $query->rowCount();
        }
    }
