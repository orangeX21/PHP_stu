<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>添加图书</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#publishDate").datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>
    </head>
    <body>
        <center>
            <!-- 此处需要包含top.php文件 -->
            <?php include("top.php"); ?> 

            <table width="799" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" valign="middle">
                        <form name="form1" method="post" action="addBook.php">
                            <table width="100%" height="200" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="30%" class="c_td">&nbsp;</td>
                                    <td width="10%" class="c_td">&nbsp;</td>
                                    <td width="30%" class="c_td">&nbsp;</td>
                                    <td width="30%" class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">书  名：</td>
                                    <td valign="middle" class="c_td"><input type="text" name="title" class="text"></td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">作  者：</td>
                                    <td valign="middle" class="c_td"><input type="text" name="author" class="text"></td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">价  格：</td>
                                    <td valign="middle" class="c_td"><input type="text" name="price" class="text"></td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">出版社：</td>
                                    <td valign="middle" class="c_td">
                                        <select name="publisher" class="text">
                                            <option value='1'>人民邮电出版社</option>
                                            <option value='2'>铁道工业出版社</option>
                                            <option value='3'>清华大学出版社</option>
                                            <option value='4'>电子工业出版社</option>
                                            <option value='5'>安徽教育出版社</option>
                                            <option value='6'>天津大学出版社</option>
                                            <option value='7'>机械工业出版社</option>                     
                                        </select>
                                    </td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="c_td">&nbsp;</td>
                                    <td align="right" valign="middle" class="c_td">出版时间：</td>
                                    <td align="left" valign="middle" class="c_td">
                                        <input type="text" name="publishDate" id="publishDate" class="text">
                                    </td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>                               
                                <tr align="center" valign="middle">
                                    <td class="c_td">&nbsp;</td>
                                    <td colspan="2" class="c_td">
                                        <input type="hidden" name="action" value="insert">
                                        <input type="submit" name="Submit" value="添加">
                                        <input type="reset" name="reset" value="重置">
                                    </td>
                                    <td class="c_td">&nbsp;</td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
            
            <!-- 此处需要包含bottom.html文件 -->
            <?php include("bottom.html"); ?> 

        </center>
    </body>
</html>
<?php
$servername = "localhost";
$username = "root"; // 替换为您的数据库用户名
$password = "root"; // 替换为您的数据库密码
$dbname = "mybook";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $publisher = $_POST['publisher'];
    $publishDate = $_POST['publishDate'];

    // 数据验证（可选）
    // TODO: 添加数据验证代码

    // 插入数据
    $sql = "INSERT INTO books (title, author, price, publisherId, publishDate)
            VALUES ('$title', '$author', '$price', '$publisher', '$publishDate')";

    if ($conn->query($sql) === TRUE) {
        // 添加成功后的提示消息
        echo "<script>alert('新书籍记录添加成功');</script>";
        // 延迟跳转到其他页面或者刷新当前页面
        echo "<script>window.setTimeout(function(){ window.location.href = 'index.php'; }, 1000);</script>";
        // 退出脚本执行
        exit(); // 重定向后需要退出脚本执行
    } else {
        echo "错误: " . $sql . "<br>" . $conn->error;
    }
    
    // 关闭连接
    $conn->close();
}
?>