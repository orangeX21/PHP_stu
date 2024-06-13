<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

echo "欢迎，" . $_SESSION['username'] . "！这是您的主页。";
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>主页</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<h1>欢迎来到主页</h1>
<p>这里是您登录后看到的内容。</p>
<a href="logout.php">注销</a>
</body>
</html>