<?php
include 'db_connection.php';

$sql = "SELECT id, name, production_time FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Ürün Adı</th><th>Yapım Süresi (dakika)</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["production_time"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 sonuç";
}
$conn->close();
?>
