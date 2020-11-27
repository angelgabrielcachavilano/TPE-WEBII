<?php


class userModel{

    private $db;

   
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=cervezas', 'root', '');
    }

    function getUser($user){
        $query = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $query->execute(array($user));
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
    public function setStatus($id, $status) {
        $sentencia = $this->db->prepare('UPDATE usuario SET esAdmin = ? WHERE id_usuario = ?');
        return $sentencia->execute([$status, $id]);
    }
}