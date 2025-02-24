<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";  // Your database username
$password = "";  // Your database password
$dbname = "dbmb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Formdan gelen kullanıcı adı ve şifre
$username = $_POST['username'];
$password = $_POST['password'];

// Kullanıcı girişi kontrolü
$sql = "SELECT * FROM Kullanicilar WHERE kullanici_adi = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Kullanıcı bulundu, şifreyi kontrol et
    $row = $result->fetch_assoc();
    $hashedPassword = $row["sifre"];

    if (password_verify($password, $hashedPassword)) {
        echo "Giriş başarılı!";
    } else {
        echo "Kullanıcı adı veya şifre hatalı!";
    }
} else {
    // Kullanıcı bulunamadı
    echo "Kullanıcı adı veya şifre hatalı!";
}

// Bağlantıyı kapatma
$conn->close();
?>
