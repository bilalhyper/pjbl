<?php
// process_payment.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clashoes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$payment_method = $_POST['payment_method'];
$amount = $_POST['amount'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO payments (name, email, phone, address, payment_method, amount) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $address, $payment_method, $amount);

// Execute statement
if ($stmt->execute()) {
    echo "<p>Payment successful! Thank you for your purchase.</p>";
} else {
    echo "<p>Error: " . $stmt->error . "</p>";
}

// Close connection
$stmt->close();
$conn->close();
?>
