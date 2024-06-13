<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($email) || empty($password)) {
        echo "用户名、邮箱和密码不能为空";
    } elseif ($password != $confirm_password) {
        echo "两次输入的密码不一致";
    } else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "用户名已存在";
        } else {
            $password_hashed = md5($password);
            $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $password_hashed, $email);
            if ($stmt->execute()) {
                header("Location: login.html");
                exit();
            } else {
                echo "注册失败，请重试";
            }
        }
        $stmt->close();
    }
}

$conn->close();
?>