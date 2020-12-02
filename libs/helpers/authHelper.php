<?php
    class authHelper{
        function checkLoggedIn(){
            if(!isset($_SESSION["EMAIL"])){
                header("Location: " . LOGIN);
                die();
            }
        }
    }

