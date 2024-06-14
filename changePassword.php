<?php
session_start();

// if (!isset($_SESSION['userId'])) {
//     header("Location: login.php");
//     exit();
// }

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$userId = $_SESSION['userId'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword !== $confirmPassword) {
        echo "新密码和确认密码不匹配";
    } else {
        $sql = "SELECT password FROM users WHERE userId = $userId";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();

        if (password_verify($currentPassword, $user['password'])) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateSql = "UPDATE users SET password = '$hashedPassword' WHERE userId = $userId";

            if ($conn->query($updateSql) === TRUE) {
                echo "密码更新成功，请重新登录。";
                session_destroy();
                header("Location: login.php");
                exit();
            } else {
                echo "更新密码时出错: " . $conn->error;
            }
        } else {
            echo "当前密码错误。";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <link href="mystyle.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            width: 100%;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="password"] {
            width: calc(100% - 12px);
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 8px 20px;
            border: none;
            background-color: #4279c6;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #3366cc;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>修改密码</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="currentPassword">当前密码：</label>
                <input type="password" id="currentPassword" name="currentPassword">
            </div>
            <div class="form-group">
                <label for="newPassword">新密码：</label>
                <input type="password" id="newPassword" name="newPassword">
            </div>
            <div class="form-group">
                <label for="confirmPassword">确认新密码：</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="修改">
                <input type="reset" name="reset" value="重置">
            </div>
        </form>
    </div>
</body>
</html>