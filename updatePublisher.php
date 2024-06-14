<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$publisherId = $_GET['id'];

$sql = "SELECT * FROM publisher WHERE publisherId = $publisherId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$publisherName = $row['publisherName'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>修改出版社</title>
    <link href="mystyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <center>
        <!-- 此处需要包含top.php文件 -->
        <?php include("top.php"); ?> 

        <table width="799" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="middle">
                    <form name="form1" method="get" action="updatePublisher_ok.php">
                        <input type="hidden" name="publisherId" value="<?php echo $publisherId; ?>">
                        <table width="100%" height="200" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="30%" class="c_td">&nbsp;</td>
                                <td width="10%" class="c_td">&nbsp;</td>
                                <td width="30%" class="c_td">&nbsp;</td>
                                <td width="30%" class="c_td">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="c_td">&nbsp;</td>
                                <td align="right" valign="middle" class="c_td">出版社名称：</td>
                                <td valign="middle" class="c_td"><input type="text" name="publisherName" value="<?php echo $publisherName; ?>" class="text"></td>
                                <td class="c_td">&nbsp;</td>
                            </tr>
                            <tr align="center" valign="middle">
                                <td class="c_td">&nbsp;</td>
                                <td colspan="2" class="c_td">
                                    <input type="submit" name="Submit" value="修改">
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