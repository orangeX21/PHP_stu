<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybook";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取图书ID
$book_id = intval($_GET['id']);

// 查询图书信息
$sql = "SELECT * FROM books WHERE id = $book_id";
$result = $conn->query($sql);
$book = $result->fetch_assoc();

// 获取所有出版社
$publisherSql = "SELECT publisherId, publisherName FROM publisher";
$publisherResult = $conn->query($publisherSql);

$conn->close();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>修改图书信息</title>
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
        <!-- 包含top.php文件 -->
        <?php include("top.php"); ?>

        <table width="799" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="middle">
                    <form name="form1" method="post" action="updateBook_ok.php">                            
                        <table width="100%" height="200" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="30%" class="c_td">&nbsp;</td>
                                <td width="10%" class="c_td">&nbsp;</td>
                                <td width="30%" class="c_td">&nbsp;</td>
                                <td width="30%" class="c_td">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="c_td">&nbsp;</td>
                                <td align="right" valign="middle" class="c_td">书名：</td>
                                <td valign="middle" class="c_td"><input type="text" name="title" class="text" value="<?php echo htmlspecialchars($book['title']); ?>"></td>
                                <td class="c_td">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="c_td">&nbsp;</td>
                                <td align="right" valign="middle" class="c_td">作者：</td>
                                <td valign="middle" class="c_td"><input type="text" name="author" class="text" value="<?php echo htmlspecialchars($book['author']); ?>"></td>
                                <td class="c_td">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="c_td">&nbsp;</td>
                                <td align="right" valign="middle" class="c_td">价格：</td>
                                <td valign="middle" class="c_td"><input type="text" name="price" class="text" value="<?php echo htmlspecialchars($book['price']); ?>"></td>
                                <td class="c_td">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="c_td">&nbsp;</td>
                                <td align="right" valign="middle" class="c_td">出版社：</td>
                                <td valign="middle" class="c_td">
                                    <select name="publisher" class="text">
                                        <?php
                                        while ($row = $publisherResult->fetch_assoc()) {
                                            $selected = ($row['publisherId'] == $book['publisherId']) ? 'selected' : '';
                                            echo "<option value='{$row['publisherId']}' $selected>{$row['publisherName']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class="c_td">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="c_td">&nbsp;</td>
                                <td align="right" valign="middle" class="c_td">出版时间：</td>
                                <td align="left" valign="middle" class="c_td">
                                    <input type="text" name="publishDate" id="publishDate" class="text" value="<?php echo htmlspecialchars($book['publishDate']); ?>"></td>
                                <td class="c_td">&nbsp;</td>
                            </tr>                               
                            <tr align="center" valign="middle">
                                <td class="c_td">&nbsp;</td>
                                <td colspan="2" class="c_td">
                                    <input type="hidden" name="id" value="<?php echo $book['id']; ?>" />
                                    <input type="submit" name="Submit" value="修改">
                                    <input type="reset" name="reset" value="重置"></td>
                                <td class="c_td">&nbsp;</td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>

        <table width="797" height="22" border="0" cellpadding="0" cellspacing="0" background="images/link_1.JPG">
        </table>
        
        <!-- 包含bottom.html文件 -->
        <?php include("bottom.html"); ?>
    </center>
</body>
</html>