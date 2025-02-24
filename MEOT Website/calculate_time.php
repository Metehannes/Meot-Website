<?php
header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root";  // Your database username
$password = "";  // Your database password
$dbname = "my1database";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);
$product_id = $data['product_id'];
$quantity = $data['quantity'];

// Query to get the total production time for the product
$sql = "SELECT SUM(time_required) AS total_time FROM product_production WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_time = $row['total_time'];
    $total_production_time = $total_time * $quantity;

    // Return JSON response
    echo json_encode([
        'product_id' => $product_id,
        'quantity' => $quantity,
        'production_time' => $total_production_time
    ]);
} else {
    echo json_encode([
        'error' => 'Ürün bulunamadı!'
    ]);
}

// Close connection
$conn->close();
?>
