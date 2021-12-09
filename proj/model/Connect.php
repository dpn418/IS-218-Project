<?php include 'model/database.php' ?>
<?php include "model/user_db.php"?>

<?php
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $action = filter_input(INPUT_POST, 'action');
    login_account($username, $password);
?>
