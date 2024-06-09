<?php
session_start();

// 验证码生成函数
function generateCaptcha($length = 4) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = '';
    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captcha;
}

// 处理登录请求
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captcha = strtoupper($_POST['captcha']); // 不区分大小写

    // 检查验证码是否正确
    if ($captcha != $_SESSION['captcha']) {
        $error = "无效的验证码";
    } else {
        // 检查用户名和密码是否正确
        if ($username == 'admin' && $password == 'admin888') {
            // 登录成功
            $success = "登录成功";
        } else {
            $error = "无效的用户名或密码";
        }
    }

    // 生成新的验证码
    $_SESSION['captcha'] = generateCaptcha();
}

// 如果没有生成新的验证码,则生成一个新的
if (!isset($_SESSION['captcha'])) {
    $_SESSION['captcha'] = generateCaptcha();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>用户登录</title>
</head>
<body>
    <h1>用户登录</h1>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p style='color:green'>$success</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <table border="0" cellpadding="5" align="center">
    <tr>
        <td colspan="2" align="center"><h1>用户登录</h1></td>
    </tr>
    <tr>
        <td>用户名:</td>
        <td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>密码:</td>
        <td><input type="password" name="password"></td>
    </tr>
    <tr>
        <td>验证码:</td>
        <td><input type="text" name="captcha"> </td>
        <td><img src="captcha.php"></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="登录"></td>
    </tr>
    </table>
    </form>
</body>
</html>