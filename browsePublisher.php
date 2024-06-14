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

$search_publisherName = isset($_GET['publisherName']) ? $_GET['publisherName'] : '';

$sql = "SELECT * FROM publisher WHERE 1=1";

if ($search_publisherName) {
    $sql .= " AND publisherName LIKE '%" . $conn->real_escape_string($search_publisherName) . "%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>出版社浏览页面</title>
    <link href="mystyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include("top.php"); ?>

    <form name="search_form" method="GET" action="">
        <table width="790px" align="center">
            <tr>
                <td>出版社名称：<input type="text" name="publisherName" placeholder="输入出版社名称" value="<?php echo htmlspecialchars($search_publisherName); ?>" /></td>
                <td><input type="submit" value="查询" name="search" /></td>
            </tr>
        </table>
    </form>

    <table class="list" width="100%" align="center" cellpadding="5" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>出版社编号</th>
                <th>出版社名称</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['publisherId']}</td>
                        <td>{$row['publisherName']}</td>
                        <td>
                            <a href='updatePublisher.php?id={$row['publisherId']}'>修改</a> | 
                            <a href='deletePublisher.php?id={$row['publisherId']}' onclick='return confirm(\"您确定要删除吗？\");'>删除</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>没有找到记录</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php include("bottom.html"); ?>
</body>
</html>

<?php
$conn->close();
?>