<?php include 'database.php' ?>
<?php include "user_db.php"?>

<?php
    $username = filter_input(INPUT_POST, 'usernameR');
    $email = filter_input(INPUT_POST, 'emailR');
    $password = filter_input(INPUT_POST, 'passwordR');
    $passwordRepeat = filter_input(INPUT_POST, 'passwordRepeatR');
    $fName = filter_input(INPUT_POST, 'fName');
    $lName = filter_input(INPUT_POST, 'lName');
    $remember = filter_input(INPUT_POST, 'remember'); //check box
    $action = filter_input(INPUT_POST, 'action');

    if($password= $passwordRepeat){
        //check if email or username is not unique
        if(count(uniqueEU($email,$username))>0){
            //session_start();
            $_SESSION["errors"] = "email or username is not unique";
            header("Location:../index.php");
            echo "username or email is taken";
        }
        else{
            $checkLogin = new_user($username, $fName, $lName, $email, $password);
            header("Location: ../index.php?controllers=post&action=list_tasks");
        }

    }else{
        //session_start();
        $_SESSION["errors"] = "password is not the same";
        echo "password is not the same";
    }

?>

