<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$publisher_id = intval($_GET['id']);
$sql = "DELETE FROM publisher WHERE publisherId = $publisher_id";

if ($conn->query($sql) === TRUE) {
    echo "记录删除成功";
} else {
    echo "错误: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: browsePublisher.php");
?>