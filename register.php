<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = 'localhost';
$username = 'root';
$password = ''; 
$databse = 'lab7'; 

$conn = new mysqli($host, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

if (!in_array($role, ['student', 'lecturer'])) {
        die('Invalid role selected.');
    }

$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (matric, name, role, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $matric, $name, $role, $hashed_password);

    if ($stmt->execute()) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>