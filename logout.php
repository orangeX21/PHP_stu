<?php
session_start();
unset($_SESSION["username"]);
setcookie("username", "", time() - 3600);
header("Location: login.html");
exit;
?>