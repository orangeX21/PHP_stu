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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $publisher = $_POST['publisher'];
    $publishDate = $_POST['publishDate'];

    // 更新数据
    $sql = "UPDATE books SET title='$title', author='$author', price='$price', publisherId='$publisher', publishDate='$publishDate' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // 更新成功后的提示消息
        echo "<script>alert('书籍记录更新成功'); window.location.href='index.php';</script>";
    } else {
        echo "错误: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭连接
$conn->close();
?>