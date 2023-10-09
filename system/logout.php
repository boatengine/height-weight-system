<?php 
session_start();
unset($_SESSION['noid']);
session_destroy();
header("location: ../index.php");
?>