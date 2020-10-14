<?php

    class categoryModel{

        private $db;

        function __construct(){
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
            return $query->fetch(PDO::FETCH_OBJ);
        }

        function addCategory($name, $description){
            $query = $this->db->prepare('INSERT INTO categoria(nombre, descripcion) VALUES(?,?)');
            $query->execute(array($name, $description));
        }

        function editCategory( $name, $description, $id){
            $query = $this->db->prepare('UPDATE categoria SET nombre=?, descripcion=? WHERE id_categoria = ?');
            $query->execute(array($name, $description, $id));
        
        }
        
        function deleteCategory($id){
            $query = $this->db->prepare('DELETE FROM categoria WHERE id_categoria=?');
            $query->execute(array($id));
        }
    }