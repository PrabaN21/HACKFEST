<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Dashboard</title>
    <style>
        /* CSS Styles */
        body {
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

        .logo {
            position: absolute;
            left: 20px;
            top: 10px;
            height: 80px;
            width: 80px;
        }

        .container {
            text-align: center;
            margin-top: 120px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 30px 0;
        }

        button {
            margin: 15px 0;
            padding: 20px 40px;
            font-size: 18px;
            color: white;
            background-color: #b30000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 400px;
        }

        button:hover {
            background-color: #800000;
        }

        .content {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            display: inline-block;
            min-width: 300px;
        }

        h2 {
            color: #b30000;
        }

        p {
            color: #555;
        }

        .team-container {
            margin-top: 20px;
            text-align: left;
        }

        .team-item {
            margin: 10px 0;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .team-item:hover {
            color: #b30000;
        }

        .student-list {
            display: none;
            margin-left: 20px;
            list-style-type: none;
            padding-left: 0;
        }

        .student-list li {
            margin: 5px 0;
        }

        .dropdown-icon {
            margin-left: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .open .dropdown-icon {
            transform: rotate(180deg);
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <img src="logo.jpg" alt="Logo" class="logo">
        <h1>Project Management Dashboard</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="button-container">
            <button onclick="window.location.href='index.html'">Guide Allocation</button>
            <button onclick="window.location.href='index.php'">Faculty Allocation</button>
            <button onclick="window.location.href='fileup.php'">Update Student/Faculty Datasheet</button>
            
            <button onclick="window.location.href='team.php'">Team Allocation</button>
        </div>

       
    </div>

    <script>
        // JavaScript for dynamic content
        function showContent(page) {
            const content = document.getElementById('content');
            let title = '';
            let message = '';

            switch (page) {
                case 'viewStudentTeams':
                    title = 'View Student Team Details';
                    message = `
                        <div class="team-container">
                            <div class="team-item" onclick="toggleStudents('team1')">
                                Team 1 <span class="dropdown-icon">↓</span>
                            </div>
                            <ul id="team1" class="student-list">
                                <li>Student A</li>
                                <li>Student B</li>
                                <li>Student C</li>
                            </ul>
                            <div class="team-item" onclick="toggleStudents('team2')">
                                Team 2 <span class="dropdown-icon">↓</span>
                            </div>
                            <ul id="team2" class="student-list">
                                <li>Student D</li>
                                <li>Student E</li>
                                <li>Student F</li>
                            </ul>
                            <!-- Add more teams and students as needed -->
                        </div>
                    `;
                    break;
                case 'viewFacultyTeams':
                    title = 'View Faculty Panel Teams';
                    message = 'View the faculty panel team allocations.';
                    break;
                case 'teamAllocation':
                    title = 'Team Allocation';
                    message = 'This section is for allocating students to teams.';
                    break;
                default:
                    title = 'Welcome';
                    message = 'Select an option to get started.';
            }

            content.innerHTML = `<h2>${title}</h2>${message}`;
        }

        function toggleStudents(teamId) {
            const team = document.getElementById(teamId);
            team.style.display = (team.style.display === 'none' || team.style.display === '') ? 'block' : 'none';
            const icon = team.previousElementSibling.querySelector('.dropdown-icon');
            team.style.display === 'block' ? icon.textContent = '↑' : icon.textContent = '↓';
        }
    </script>
</body>

</html>
