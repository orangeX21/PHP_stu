<?php
session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $greeting = "欢迎您{$username}！";
} elseif (isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    $greeting = "欢迎{$username}再次回归！";
} else {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
</head>
<body>
    <?php echo $greeting; ?>&nbsp;&nbsp;
    <a href="logout.php">注销退出</a>
</body>
</html>