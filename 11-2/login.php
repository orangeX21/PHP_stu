<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $pwd = $_POST["userping"];

    // Simple credential check (in real applications, use a database)
    if ($username == 'admin' && $pwd == '123') {
        $_SESSION["username"] = $username;

        if (isset($_POST["autoLogin"])) {
            setcookie("username", $username, time() + 3600 * 24 * 7);
        }

        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('用户名或密码错误，请重试！'); history.back();</script>";
        exit;
    }
}
?>