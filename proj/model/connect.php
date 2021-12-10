<?php include 'database.php' ?>
<?php include "user_db.php"?>

<?php

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $action = filter_input(INPUT_POST, 'action');
    $checkLogin = login_account($username, $password);

    if(count($checkLogin) >0){ //should move to

        echo nl2br("\nexists\n");
        $_SESSION["errors"] = "";
        header("Location: ../index.php?controllers=post&action=list_tasks");
    }
    else{ //something is wrong
        echo "does not exist";
        $_SESSION["errors"] = "username or password is incorrect";
        header("Location:../index.php");
    }
?>
<script defer src="../view/validation.js">customErrors('username','username does not exist')</script>

