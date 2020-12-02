<?php
    class userModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=cervezas', 'root', '');
        }

        function getUser($user){
            $query = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
            $query->execute(array($user));
            return $query->fetch(PDO::FETCH_OBJ);  
        }

        function getUserById($id_user){
            $query = $this->db->prepare("SELECT * FROM usuario WHERE id_user=?");
            $query->execute(array($id_user));
            return $query->fetch(PDO::FETCH_OBJ);
        }

        function addUser($email,$clave){
            $query = $this->db->prepare('INSERT INTO usuario(email,password) VALUES(?,?)');
            return $query->execute(array($email,$clave));
        }

        public function getUsers(){
            $query = $this->db->prepare('SELECT * FROM usuario');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function setStatus( $status,$id_user) {
            $sentencia = $this->db->prepare('UPDATE usuario SET admin = ? WHERE id_user = ?');
            return $sentencia->execute(array($status, $id_user));
        }

        public function deleteUser($id_user) {
            $sentencia = $this->db->prepare('DELETE FROM usuario WHERE id_user = ?');
            $sentencia->execute(array($id_user));
        }
    }
