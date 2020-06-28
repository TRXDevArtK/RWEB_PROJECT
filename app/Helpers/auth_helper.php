<?php
    function check_login(){
        //HELPER CEK LOGIN
        //HAPUS INI KALAU MAU DEBUG DI POSTMAN
        if(!isset($_SESSION['status']) && !isset($_SESSION['login_id'])){
            //Kalau status gk ada, balik ke index
            return 0;
        }
        else{
            $now = time();
            if ($now > $_SESSION['expire']) {
                session_destroy();
                return 0;
            }
            else{
                return 1;
            }
        }
    }
?>

