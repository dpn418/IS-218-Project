
<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    $root .= '/proj';
    session_start();
    if(isset($_GET['controllers']) && isset($_GET['action'])){
        $controller = $_GET['controllers'];
        $action = $_GET['action'];
        //echo"inside controller";
    }else{
        $controller = 'pages'; //uses routes to go to pages controller
        $action = 'home'; //inside pages look for function home
        //echo"inside else";
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

