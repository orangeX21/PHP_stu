<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$results_per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start_from = ($page - 1) * $results_per_page;

$search_title = isset($_GET['title']) ? $_GET['title'] : '';
$search_author = isset($_GET['author']) ? $_GET['author'] : '';
$search_publisher = isset($_GET['publisher']) ? intval($_GET['publisher']) : '';

$sql = "SELECT b.id, b.title, b.author, b.price, p.publisherName, b.publishDate 
        FROM books b
        JOIN publisher p ON b.publisherId = p.publisherId
        WHERE 1=1";

if ($search_title) {
    $sql .= " AND b.title LIKE '%" . $conn->real_escape_string($search_title) . "%'";
}

if ($search_author) {
    $sql .= " AND b.author LIKE '%" . $conn->real_escape_string($search_author) . "%'";
}

if ($search_publisher) {
    $sql .= " AND b.publisherId = " . $search_publisher;
}

$sql .= " LIMIT $start_from, $results_per_page";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>图书浏览页面</title>
    <link href="mystyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include("top.php"); ?>

    <form name="search_form" method="GET" action="">
        <table width="790px" align="center">
            <tr>
                <td>书名：<input type="text" name="title" placeholder="输入书名" value="<?php echo htmlspecialchars($search_title); ?>" /></td>
                <td>作者：<input type="text" name="author" placeholder="输入作者" value="<?php echo htmlspecialchars($search_author); ?>" /></td>
                <td>出版社：
                    <select name="publisher" class="text">
                        <option value="">--请选择出版社--</option>
                        <?php
                        $publisherSql = "SELECT publisherId, publisherName FROM publisher";
                        $publisherResult = $conn->query($publisherSql);
                        while ($row = $publisherResult->fetch_assoc()) {
                            $selected = ($row['publisherId'] == $search_publisher) ? 'selected' : '';
                            echo "<option value='{$row['publisherId']}' $selected>{$row['publisherName']}</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="submit" value="查询" name="search" /></td>
            </tr>
        </table>
    </form>

    <table class="list" width="100%" align="center" cellpadding="5" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>图书编号</th>
                <th>书名</th>
                <th>作者</th>
                <th>单价</th>
                <th>出版社</th>
                <th>出版日期</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['author']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['publisherName']}</td>
                        <td>{$row['publishDate']}</td>
                        <td>
                            <a href='updateBook.php?id={$row['id']}'>修改</a> | 
                            <a href='deleteBook.php?id={$row['id']}' onclick='return confirm(\"您确定要删除吗？\");'>删除</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>没有找到记录</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="pagination" style="text-align: center; margin-top: 10px;">
        <?php
        $count_sql = "SELECT COUNT(*) AS total FROM books WHERE 1=1";

        if ($search_title) {
            $count_sql .= " AND title LIKE '%" . $conn->real_escape_string($search_title) . "%'";
        }

        if ($search_author) {
            $count_sql .= " AND author LIKE '%" . $conn->real_escape_string($search_author) . "%'";
        }

        if ($search_publisher) {
            $count_sql .= " AND publisherId = " . $search_publisher;
        }

        $count_result = $conn->query($count_sql);
        $row = $count_result->fetch_assoc();
        $total_pages = ceil($row['total'] / $results_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='index.php?page=" . $i . "&title=" . urlencode($search_title) . "&author=" . urlencode($search_author) . "&publisher=" . $search_publisher . "'" . ($page == $i ? " class='active'" : "") . ">" . $i . "</a> ";
        }
        ?>
    </div>

    <?php include("bottom.html"); ?>
</body>
</html>

<?php
$conn->close();
?>