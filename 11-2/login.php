<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['userping'];

    if ($username === 'admin' && $password === 'admin888') {
        $_SESSION['username'] = $username;

        if (isset($_POST['remember']) && $_POST['remember'] == '1') {
            setcookie('username', $username, time() + (86400 * 7), "/"); // 7天
            setcookie('password', $password, time() + (86400 * 7), "/");
        }

        header('Location: index.php');
        exit();
    } else {
        echo "用户名或密码错误。";
    }
}
?>