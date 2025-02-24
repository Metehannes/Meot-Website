<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbmb"; // Doğru veritabanı adı

// Form verilerini al
$user = $_POST['username'];
$pass = $_POST['password'];

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Kullanıcı adı ile sorgulama yap
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?"); // Doğru sütun adı: username
$stmt->bind_param("s", $user);

// Sorguyu çalıştır
$stmt->execute();
$result = $stmt->get_result();

// Sonuçları kontrol et
if ($result->num_rows > 0) {
    // Kullanıcı bulundu
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        echo "Giriş başarılı. Hoş geldiniz, " . $row["username"];
        // 5 saniye bekleyip ana sayfaya yönlendirme
        echo '<meta http-equiv="refresh" content="5;url=index.html">';
    } else {
        echo "Hatalı şifre.";
    }
} else {
    // Kullanıcı bulunamadı
    echo "Tabloda kullanıcı bulunamadı.";
}

$stmt->close();
$conn->close();
?>
