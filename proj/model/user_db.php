<?php
function delete_account($username) {
    global $db;
    $query = 'DELETE FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement->closeCursor();
}

function new_user($username, $fname, $lname, $email, $password) {
    global $db;
    $query = 'INSERT INTO users
                 (username, fname, lname, email, password)
              VALUES
                 (:username, :fname, :lname, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function edit_account($email, $username, $password) {
    global $db;
    $query = 'UPDATE users
              SET username = :username, password = :password
			  WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function login_account($username, $password){
    global $db;
    if(preg_match('/^[^@]+@[^@]+\.[^@]+$/', $username)==1){ //checks if username is email
        echo "email";
        $query = 'SELECT email FROM users WHERE password = :password AND email=:username';
    }else{
        echo "not email";
        $query = 'SELECT username FROM users WHERE password = :password AND username=:username';
    }
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    } catch (PDOException $e) {
        $errors = new report_error();
        $errors->http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}

?>