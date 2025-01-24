<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Faculty and Student Excel Files</title>
    <style>
        body {
            background: url('bg.jpg') 
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            background-color: #b30000;
            padding: 30px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .header h1 {
            color: white;
            margin: 0;
        }

        .container {
            text-align: center;
            margin-top: 120px;
            padding: 20px;
        }

        .upload-container {
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
        }

        h2 {
            color: #b30000;
            margin-bottom: 20px;
        }

        input[type="file"] {
            margin: 20px 0;
        }

        button {
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background-color: #b30000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 250px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #800000;
        }

        .instructions {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <h1>Upload Faculty and Student Excel Files</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="upload-container">
            <h2>Upload Files</h2>
            <p class="instructions">Please upload the Excel files for Faculty and Student data. Ensure the file is in
                .xlsx format.</p>

            <!-- Form for Faculty Excel Upload -->
            <form id="facultyForm" action="/uploadFaculty" method="post" enctype="multipart/form-data">
                <label for="facultyFile">Faculty Excel File:</label><br>
                <input type="file" id="facultyFile" name="facultyFile" accept=".xlsx" required><br><br>
                <button type="submit">Upload Faculty File</button>
            </form>

            <!-- Form for Student Excel Upload -->
            <form id="studentForm" action="/uploadStudent" method="post" enctype="multipart/form-data">
                <label for="studentFile">Student Excel File:</label><br>
                <input type="file" id="studentFile" name="studentFile" accept=".xlsx" required><br><br>
                <button type="submit">Upload Student File</button>
            </form>
        </div>
    </div>
</body>

</html>