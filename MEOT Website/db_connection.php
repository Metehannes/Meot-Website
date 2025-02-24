<?php
$servername = "localhost";
$username = "root";  // Veritabanı kullanıcı adınız
$password = "";  // Veritabanı şifreniz (varsayılan olarak boş bırakılır)
$dbname = "my1database";  // Veritabanı adınız
$conn = new mysqli($servername, $username, $password, $dbname);
// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısında hata: " . $conn->connect_error);
}

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısında hata: " . $conn->connect_error);
}
// Ürünleri sorgula
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Veritabanından gelen her bir ürünü listeleyin
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . "</li>";
    }
} else {
    echo "Ürün bulunamadı!";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
