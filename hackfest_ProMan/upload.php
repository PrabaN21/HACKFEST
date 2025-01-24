<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet if using Composer

use PhpOffice\PhpSpreadsheet\IOFactory;

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hf2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['upload'])) {
    // Check if file is uploaded
    if (isset($_FILES['facultyFile']) && $_FILES['facultyFile']['error'] == 0) {
        $fileTmpName = $_FILES['facultyFile']['tmp_name'];
        $fileName = $_FILES['facultyFile']['name'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

        // Validate file extension (only allow .xlsx or .xls)
        if ($fileExt == 'xlsx' || $fileExt == 'xls') {
            // Load the Excel file
            try {
                $spreadsheet = IOFactory::load($fileTmpName);
                $sheet = $spreadsheet->getActiveSheet();
                $rows = $sheet->toArray();

                // Loop through rows and insert data into the database
                foreach ($rows as $row) {
                    // Skip the header row (if present)
                    if ($row[0] == 'Name') continue;

                    // Prepare SQL query to insert data (Only name is being inserted)
                    $name = $conn->real_escape_string($row[0]);

                    $sql = "INSERT INTO faculty (name) VALUES ('$name')";
                    if (!$conn->query($sql)) {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                echo "Faculty file uploaded and data saved successfully!";
            } catch (Exception $e) {
                echo 'Error loading file: ', $e->getMessage();
            }
        } else {
            echo "Invalid file format. Please upload an Excel file (.xlsx or .xls).";
        }
    } else {
        echo "No file uploaded or there was an error with the file upload.";
    }
}

$conn->close();
?>
