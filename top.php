<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>欢迎页面</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<table width="799" border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
    <tr>
        <td height="106" background="images/banner.jpg">&nbsp;</td>
    </tr>
    <tr>
        <td>
            <table width="100%" height="27" border="0" cellpadding="0" cellspacing="0" background="images/link.jpg">
                <tr>
                    <td width="243" align="center" valign="middle">
                        <b><font color='white'>欢迎您，</font><font color='yellow'><?php echo htmlspecialchars($username); ?></font></b>
                    </td>
                    <td width="90" align="center" valign="middle"><a href="index.php" class="a">浏览图书</a></td>
                    <td width="94" align="center" valign="middle"><a href="addBook.php" class="a">添加图书</a></td>
                    <td width="94" align="center" valign="middle"><a href="#" class="a">浏览出版社</a></td>
                    <td width="91" align="center" valign="middle"><a href="#" class="a">添加出版社</a></td>
                    <td width="94" align="center" valign="middle"><a href="#" class="a">修改密码</a></td>
                    <td width="93" align="center" valign="middle"><a href="logout.php" class="a">退出系统</a></td>
                </tr>
            </table>
        </td>
    </tr>
</table>