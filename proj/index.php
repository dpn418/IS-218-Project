<?php
    //checks for URL

//check if sessions are already set
    if(!isset($_SESSION['errors'])){
        session_start();
        if(isset($_SESSION['errors'])){
            echo"errors are already set";
        }

    }
    require_once('view/header.php');
?>
