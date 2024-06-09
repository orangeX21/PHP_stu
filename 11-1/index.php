<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户主页</title>
</head>
<body>
    <h1><?php echo $_SESSION['username']; ?>，您好！</h1>
    <a href="logout.php">注销退出</a>
</body>
</html>