<?php
// Thông tin kết nối cơ sở dữ liệu PowerDNS
$servername = "localhost";
$username = "admin";
$password = "VinahostP@ssw0rd!@#456";
$dbname = "powerdns";

// Lấy thông tin từ form đăng nhập
$user = $_GET['token'];
$domain = $_GET['domain'];
$ip = $_GET['ip'];

// Tạo kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Truy vấn cơ sở dữ liệu để kiểm tra xác thực
$sql = "SELECT * FROM users WHERE username = '$user'";
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    // Xác thực thành công
        echo "Xác thực thành công!";
        echo $user;
        echo $domain;
        echo $ip;
} else {
    // Xác thực không thành công
        echo "Xác thực không thành công!";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>

