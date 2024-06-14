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

if ($book_id) {
    // 删除图书
    $sql = "DELETE FROM books WHERE id = $book_id";

    if ($conn->query($sql) === TRUE) {
        // 删除成功后的提示消息
        echo "<script>alert('书籍记录删除成功'); window.location.href='index.php';</script>";
    } else {
        echo "错误: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "无效的图书ID";
}

// 关闭连接
$conn->close();
?>