<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['userping'];

    // 将 'admin' 和 'password' 替换为你的用户名和密码
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        echo "用户名或密码错误。";
    }
}
?>