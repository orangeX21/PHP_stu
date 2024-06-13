<?php
session_start(); // 开始会话

// 销毁会话中的所有变量
$_SESSION = array();

// 如果存在会话 cookie ，将其删除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 最终销毁会话
session_destroy();

// 跳转到登录页面
header("Location: login.html");
exit();
?>