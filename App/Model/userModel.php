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

        function addUser($email,$clave){
            $sentencia = $this->db->prepare('INSERT INTO usuario(email,password) VALUES(?,?)');
            return $sentencia->execute([$email,$clave]);
        }
    }