<?php
if(session_status()!=2){
    session_start();
}
//end session 
$_SESSION = array();

$_SESSION['status'] = "signOut";
echo "something is here";
header("Location: \proj\index.php");
?>