<?php
session_start();
session_destroy();
setcookie('username', '', time() - 3600, "/");
setcookie('password', '', time() - 3600, "/");

echo "Redirecting to login.html...";
header('Location: login.html');
exit();
?>
