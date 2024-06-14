<?php
session_start();

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
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "用户名和密码不能为空";
    } else {
        $password_hashed = md5($password);
        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password_hashed);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "用户名或密码错误";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<link href="mystyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<form action="login.php" method="post">
<table class="login">
  <tr>
      <td colspan="2"  bgcolor="#4279C6"><div align="center" class="title">用户登录</div></td>
  </tr>
  <tr>
    <td width="72" align="right">用户名：</td>
    <td width="188"><input name="username" type="text" class="text" /></td>
  </tr>
  <tr>
    <td align="right">密&nbsp;&nbsp;码：</td>
    <td><input name="password" type="password" class="text" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btnLogin" class="button" value="登录" /> 
      <input name="" type="reset" value="重置" class="button" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">还没注册？请先&nbsp;<a href="register.html">注册</a></td>
  </tr>
</table>
</form>
</body>
</html>