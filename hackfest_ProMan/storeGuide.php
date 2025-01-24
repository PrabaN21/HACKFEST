<?php
// storeGuide.php
$servername = "localhost";
$username = "root";  // Your DB username
$password = "";  // Your DB password
$dbname = "hf2";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$teamName = $_POST['teamName'];
$guideName = $_POST['guideName'];

// Insert into the guide table
$sql = "INSERT INTO guide (teamname, guidename) VALUES ('$teamName', '$guideName')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
