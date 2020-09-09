<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["access"]);
unset($_SESSION["n"]);
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert(' Logged out Succesfully')
window.location.href='index.php';
</SCRIPT>");
?>
