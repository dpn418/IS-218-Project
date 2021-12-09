<?php include 'database.php' ?>
<?php include "user_db.php"?>

<?php
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $action = filter_input(INPUT_POST, 'action');
    $checkLogin = login_account($username, $password);
    if(count($checkLogin) >0){
        echo nl2br("\nexists\n");
    }
    else{
        echo nl2br("\nusername does not exist\n");
    }
?>
