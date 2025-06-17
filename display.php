<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lab7';

$conn = new mysqli($host, $username, $password, $database);

$sql = "SELECT matric, name, role FROM users ORDER BY matric ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User List</title>
        <style>
            table, th, td {
                border: 2px solid black;
                border-collapse: collapse;  
                padding: 6px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <h1>User List</h1>
        <table>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Role</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php htmlspecialchars($row['matric']); ?></td>
                        <td><?php htmlspecialchars($row['name']); ?></td>
                        <td><?php htmlspecialchars($row['role']); ?></td>
                    </tr>
                <?php endwhile; ?>
        </table>
        </body>
    </html>

<?php
$conn->close();
?>