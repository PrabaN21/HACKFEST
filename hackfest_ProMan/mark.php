<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Marks for Teams</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            background-color: #b30000;
            padding: 37px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            justify-content: center;
        }

        .logo {
            position: absolute;
            left: 20px;
            top: 10px;
            height: 80px;
            width: 80px;
            object-fit: cover;
        }

        .header h1 {
            color: white;
            margin: 0;
            text-align: center;
            font-size: 32px;
        }

        .container {
            display: flex;
            justify-content: center;
            margin-top: 120px;
        }

        .marks-entry {
            width: 90%;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        h2 {
            color: #b30000;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 20px;
            text-align: center;
        }

        th {
            background-color: #b30000;
            color: white;
        }

        input[type="text"] {
            padding: 10px;
            width: 100px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #b30000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #800000;
        }

        .submitted {
            background-color: #4CAF50;
        }

        .team-item {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }

        .student-list {
            list-style-type: none;
            padding-left: 0;
            margin: 5px 0;
            font-weight: normal;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <img src="logo.jpg" alt="Logo" class="logo">
        <h1>Panel</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="marks-entry">
            <h2>Enter Review Marks </h2>

            <!-- Table to Enter Marks -->
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Review 1</th>
                        <th>Review 2</th>
                        <th>Review 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="team-item">
                                Team 1
                            </div>
                            <ul class="student-list">
                                <li>Alice</li>
                                <li> Ajay</li>
                                <li> kishore</li>
                            </ul>
                        </td>
                        <td>
                            <input type="text" id="team1-review1" name="team1-review1" placeholder="Mark" required>
                            <button type="button" onclick="submitMark('team1-review1')">Submit</button>
                        </td>
                        <td>
                            <input type="text" id="team1-review2" name="team1-review2" placeholder="Mark" required>
                            <button type="button" onclick="submitMark('team1-review2')">Submit</button>
                        </td>
                        <td>
                            <input type="text" id="team1-review3" name="team1-review3" placeholder="Mark" required>
                            <button type="button" onclick="submitMark('team1-review3')">Submit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="team-item">
                                Team 2
                            </div>
                            <ul class="student-list">
                                <li>Student D</li>
                                <li>Student E</li>
                                <li>Student F</li>
                            </ul>
                        </td>
                        <td>
                            <input type="text" id="team2-review1" name="team2-review1" placeholder="Mark" required>
                            <button type="button" onclick="submitMark('team2-review1')">Submit</button>
                        </td>
                        <td>
                            <input type="text" id="team2-review2" name="team2-review2" placeholder="Mark" required>
                            <button type="button" onclick="submitMark('team2-review2')">Submit</button>
                        </td>
                        <td>
                            <input type="text" id="team2-review3" name="team2-review3" placeholder="Mark" required>
                            <button type="button" onclick="submitMark('team2-review3')">Submit</button>
                        </td>
                    </tr>
                    <!-- Add similar rows for other teams -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function submitMark(inputId) {
            var inputField = document.getElementById(inputId);
            var button = inputField.nextElementSibling;

            // Get the entered mark value
            var enteredMark = inputField.value;

            if (enteredMark.trim() === "") {
                alert("Please enter a mark before submitting.");
                return;
            }

            // Update the button and input field with entered mark
            inputField.value = enteredMark; // Keep the entered mark visible
            inputField.disabled = true; // Disable input field after submission

            // Change button to "Update"
            button.innerText = "Update";
            button.classList.add("submitted");
            button.setAttribute("onclick", "updateMark('" + inputId + "')"); // Change button functionality
        }

        function updateMark(inputId) {
            var inputField = document.getElementById(inputId);
            var button = inputField.nextElementSibling;

            // Enable the input field for updating the mark
            inputField.disabled = false;
            button.innerText = "Submit";
            button.classList.remove("submitted");
            button.setAttribute("onclick", "submitMark('" + inputId + "')"); // Change button functionality
        }
    </script>
</body>

</html>