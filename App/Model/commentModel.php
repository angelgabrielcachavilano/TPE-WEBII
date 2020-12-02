<?php
    class commentModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=cervezas', 'root', '');
        }

        public function insertComment($contenido,$puntacion,$fecha, $idCerveza, $idUsuario) {
            $query = $this->db->prepare('INSERT INTO comentario(contenido, puntuacion, fecha, id_cerveza, id_usuario) VALUES(?,?,?,?,?)');
            $query->execute(array($contenido, $puntacion, $fecha, $idCerveza, $idUsuario));
            return $this->db->lastInsertId();
        }

        public function deleteComment($id_comentario ) {
            $query = $this->db->prepare('DELETE FROM comentario WHERE id_comentario  = ?');
            $query->execute(array($id_comentario ));
            return $query->rowCount();
        }

        public function getByID($id_comentario) {
            $query = $this->db->prepare('SELECT comentario.*,usuario.email FROM comentario INNER JOIN usuario ON usuario.id_user= comentario.id_usuario WHERE comentario.id_comentario = ?');
            $query->execute(array($id_comentario));
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function getComments($id_comentario){
            $query = $this->db->prepare('SELECT comentario.*,usuario.email FROM comentario INNER JOIN usuario  ON comentario.id_usuario = usuario.id_user WHERE id_cerveza = ? ');
            $query->execute(array($id_comentario));
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    }