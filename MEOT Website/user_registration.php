<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbmb";

// Form verilerini al
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

// Şifreyi hashle
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// SQL sorgusunu hazırla
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user, $email, $hashed_pass);

// Sorguyu çalıştır
if ($stmt->execute() === TRUE) {
    echo "Yeni kayıt başarıyla oluşturuldu";
} else {
    echo "Hata: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
