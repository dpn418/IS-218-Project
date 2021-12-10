
<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    $root .= '/IS-218-Project/proj';
    if(!isset($_SESSION['username'], $_SESSION['password'])&&session_status()!=2){
        session_start();
        $_SESSION['username']= 'admin';
        $_SESSION['password']= 'admin';
        //check for status and error
        if(isset($_SESSION['status'])){
            if($_SESSION['status']=="signOut"){
                echo nl2br("\nyou have been sign Out\n");
                $_SESSION['status']="";
            }else{
                $_SESSION['status'] = "";
            }
        }else{
            $_SESSION['status'] = "";
        }

        if(isset($_SESSION['errors'])){
            if(strlen($_SESSION['errors'])>0){
                echo nl2br($_SESSION['errors']."\n");
            }else{
                $_SESSION['errors'] = "";
            }
        }else{
            $_SESSION['errors'] = "";
        }
        //echo nl2br("header: Session has been set to admin\n");
    }else{
        //echo nl2br("header: Session is already set\n");
        //echo "header: ". $_SESSION['username'] . $_SESSION['password'];
    }

    if(isset($_GET['controllers']) && isset($_GET['action'])){
        $controller = $_GET['controllers'];
        $action = $_GET['action'];
        if(isset($_GET['sessionU'],$_GET['sessionP'])){
            $_SESSION['username'] = $_GET['sessionU'];
            $_SESSION['password'] = $_GET['sessionP'];
            $_SESSION['status'] = "logged in";
            echo "You have Logged In" . $_SESSION['username'];
            //echo "header: set Session to ". $_SESSION['username']. $_SESSION['password'];
        }
        //echo"inside controller";
    }
    else{
        if($_SESSION['username']=="admin"){
            $controller = 'pages'; //uses routes to go to pages controller
            $action = 'home'; //inside pages look for function home
        }else{
            $controller = 'post';
            $action = 'lists';
        }
        //echo"inside else";
    }

    function checkIfStatusSet($sessionName, $status){
        if(isset($_SESSION[$sessionName])!=$status){
            echo nl2br($_SESSION[$sessionName]."\n");
        }else{
            $_SESSION[$sessionName] = "";
        }
    }

?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Gaming Tasks</title>
    <link rel="stylesheet" href="main.css">
    <script defer src="view/validation.js"></script>
</head>

<!-- the body section -->
<body>
<header>
    <h1>Gaming Tasks</h1>
</header>

<?php require_once("$root/routes.php");?>

