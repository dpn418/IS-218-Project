<?php
	/* NJIT HOSTING
	$hostname = "sql1.njit.edu";
	$username = "dn236"; //put ucid here
	$password = "Nonsense1!2@";
	$dbname = "dn236"; //Put ucid here
	$dsn = "mysql:host=$hostname;dbname=$dbname";
	*/
	
	/*New Local Hosting
    $dsn = 'mysql:host=localhost;dbname=dn236';
    $username = 'root';
    $password = '';
	*/
	//OG Local Hosting
    $dsn = 'mysql:host=localhost;dbname=shop';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>