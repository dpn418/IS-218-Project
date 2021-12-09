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
    if(preg_match('/^[^@]+@[^@]+\.[^@]+$/', $username)==1){ //checks if username is email
        echo "email";
        $query = 'SELECT email FROM users WHERE password = :password AND email=:username';
    }else{
        echo "not email";
        $query = 'SELECT username FROM users WHERE password = :password AND username=:username';
    }

    $SQL = new run_SQL();
    $bindArray = array(
        ':username'=> $username,
        ':password'=> $password
    );
    return $SQL->runQueryArray($query, $bindArray);

}

//check is email and username is unique (for Registration)
function uniqueEU($email, $username){ //E - email U - username
    $SQL = new run_SQL();
    $query = "SELECT email, username FROM users WHERE email=:email OR username=:username";
    $bindArray = array(
        ':email'=>$email,
        ':username'=>$username
    );
    return $SQL->runQueryArray($query, $bindArray);


}

?>