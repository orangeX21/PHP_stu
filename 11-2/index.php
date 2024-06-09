<?php
session_start();

$welcomeMessage = '';

if (!isset($_SESSION['username'])) {
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        if ($_COOKIE['username'] === 'admin' && $_COOKIE['password'] === 'admin888') {
            $_SESSION['username'] = $_COOKIE['username'];
            $welcomeMessage = "欢迎您" . htmlspecialchars($_COOKIE['username']) . "再次回归" . "！<a href='logout.php'>注销退出</a>";
        } else {
            header('Location: login.html');
            exit();
        }
    } else {
        header('Location: login.html');
        exit();
    }
} else {
    $welcomeMessage = "欢迎您" . htmlspecialchars($_SESSION['username']) . "！<a href='logout.php'>注销退出</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
</head>
<body>
    <h1><?php echo $welcomeMessage; ?></h1>
</body>
</html>
