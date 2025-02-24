<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Veritabanı bağlantısını oluştur
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Veritabanı bağlantısında hata: " . $conn->connect_error);
    }

    // Ürünü sorgula
    $sql = "SELECT SUM(time_required) AS total_time FROM product_production WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_time = $row['total_time'];

        // Toplam süreyi adetle çarp
        $total_production_time = $total_time * $quantity;

        echo "Toplam Üretim Süresi: $total_production_time dakika";
    } else {
        echo "Ürün bulunamadı!";
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
}
?>
