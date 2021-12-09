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
        $checkLogin = new_user($username, $fName, $lName, $email, $password);
    }else{
        echo "password is incorrect";
    }

?>

