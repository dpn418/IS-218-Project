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
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop";
    $db = NULL;


    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password); //
        if($db != null){echo nl2br("sucessfully connected\n");} //
    } catch (PDOException $e) {
        $errors = new PDOException();  //
        echo"error";  //
        $error_message = $e->getMessage();
        $errors->http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());  //
        exit();
    }

    class run_SQL
    {
        function runQuery($query)
        {
            global $db;
            $errors = new report_error();
            try {
                $q = $db->prepare($query);
                $q->execute();
                $results = $q->fetchAll();
                $q->closeCursor();
                return $results;
            } catch (PDOException $e) {
                $errors->http_error("500 Internal Server Error\n\n" . "There was a SQL error:\n\n" . $e->getMessage());
            }
        }

        function runQueryArray($query, array $list)
        {
            global $db;
            $errors = new report_error();
            try {
                $q = $db->prepare($query);
                foreach ($list as $key => $value) {
                    $q->bindValue($key, $value);
                }
                $q->execute();

                $results = $q->fetchAll();
                $q->closeCursor();
                return $results;
            } catch (PDOException $e) {
                $errors->http_error("500 Internal Server Error\n\n" . "There was a SQL error:\n\n" . $e->getMessage());

            }
        }
    }

    class report_error{
        function http_error($message)
        {
            header("Content-type: text/plain");
            die($message);
        }
    }
?>