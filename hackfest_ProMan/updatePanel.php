<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hf2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data from the AJAX request
$panelName = isset($_POST['panelName']) ? $_POST['panelName'] : '';
$faculty1 = isset($_POST['faculty1']) ? $_POST['faculty1'] : '';
$faculty2 = isset($_POST['faculty2']) ? $_POST['faculty2'] : '';

// Insert or update panel data in the database
$sql = "INSERT INTO panel (panel_name, faculty1, faculty2) VALUES (?, ?, ?) 
        ON DUPLICATE KEY UPDATE faculty1 = VALUES(faculty1), faculty2 = VALUES(faculty2)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $panelName, $faculty1, $faculty2);

if ($stmt->execute()) {
    echo "Panel updated successfully!";
} else {
    echo "Error updating panel: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
