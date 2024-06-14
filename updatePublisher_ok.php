<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 检查是否传递了 publisherId 参数
if (isset($_GET['publisherId'])) {
    $publisherId = intval($_GET['publisherId']);
    echo "获取到的 ID 值为：" . $publisherId . "<br>";
} else {
    die("缺少必要的参数 publisherId");
}

$publisherName = $_GET['publisherName'] ?? '';

// 输出 SQL 语句内容
$sql = "UPDATE publisher SET publisherName='$publisherName' WHERE publisherId=$publisherId";
// echo "SQL 语句内容：" . $sql . "<br>";

if ($conn->query($sql) === TRUE) {
    Echo "记录更新成功";
} else {
    echo "错误: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: browsePublisher.php");
?>