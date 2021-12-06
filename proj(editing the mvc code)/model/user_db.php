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
    $query = 'UPDATE INTO users
              SET username = :username, password = :password, dueDate = :dueDate, urgency = :urgency
			  WHERE email = :email'
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
?>