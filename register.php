<?php
// Database connection
$servername = "your_server_name";
$username = "your_username";
$password = "your_database_pass";
$dbname = "your_database_name";

$stmt = mysqli_connect($servername, $username, $password, $dbname);

if (!$stmt) {
    die("Connection failed: " . mysqli_connect_error()); 
}

 // Retrieve form data
$matric = mysqli_real_escape_string($stmt, $_POST['matric']);
$name = mysqli_real_escape_string($stmt, $_POST['name']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = mysqli_real_escape_string($stmt, $_POST['role']);

// Insert into users table
$stmt_insert = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')";

if ( mysqli_query($stmt, $stmt_insert) ) {
    echo "Registration successful.";
} else {
    echo "Error: " . mysqli_error($stmt);
}

 mysqli_close($stmt);
?>
