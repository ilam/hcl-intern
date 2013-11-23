<?php
session_start();
unset($_SESSION["hcl_user"]);
$url="index.php"; 
header("Location: $url");
?>