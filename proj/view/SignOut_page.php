<?php
session_start();
$_SESSION['status'] = "signOut";
echo "something is here";
header("Location: \IS-218-Project\proj\index.php");
?>