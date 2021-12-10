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
        $controller = 'post';
        $controller = 'task';
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo "variable have been set";
        echo "connect: ". $_SESSION['username'] . $_SESSION['password'];
        header("Location: ../index.php?controllers=post&action=list_tasks&sessionU=$username&sessionP=$password");
    }
    else{ //something is wrong
        echo "does not exist";
        $_SESSION["errors"] = "username or password is incorrect";
        echo "variable have been set";
        header("Location:../index.php");
    }
?>
<script defer src="../view/validation.js">customErrors('username','username does not exist')</script>

