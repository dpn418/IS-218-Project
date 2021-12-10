<?php include 'database.php' ?>
<?php include "user_db.php"?>

<?php
    if(session_status()!=2){
        session_start();
    }
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
            $_SESSION["errorsR"] = "email or username is taken";


            header("Location:../index.php");
        }
        else{
            $checkLogin = new_user($username, $fName, $lName, $email, $password);
            $controller = 'post';
            $controller = 'task';
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $checkLogin[0]['email'];
            $_SESSION['fname'] = $checkLogin[0]['fname'];
            $_SESSION['lname'] = $checkLogin[0]['lname'];
            echo "variable have been set";
            echo "connect: ". $_SESSION['username'] . $_SESSION['password'];
            header("Location: ../index.php?controllers=post&action=list_tasks&sessionU=$username&sessionP=$password");
        }

    }
    //else already covered by javascript

?>

