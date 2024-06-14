<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$publisherName = $_POST['publisherName'];

$sql = "INSERT INTO publisher (publisherName) VALUES ('$publisherName')";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "错误: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: browsePublisher.php");
?>