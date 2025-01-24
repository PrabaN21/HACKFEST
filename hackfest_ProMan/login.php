<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .login-container {
            text-align: center;
            width: 400px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.8); /* Adding transparency to the background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: 2px solid #b30000;
        }

        .login-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .login-container h1 {
            margin-bottom: 25px;
            font-size: 1.8em;
            color: #b30000;
        }

        .login-container button {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #b30000;
            color: #fff;
            font-size: 1.2em;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #800000;
        }

        .login-form {
            display: none;
            margin-top: 20px;
        }

        .login-form h2 {
            color: #b30000;
        }

        .login-form input {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #b30000;
            border-radius: 5px;
            font-size: 1em;
        }

        .login-form button {
            background-color: #b30000;
            color: white;
            font-size: 1.1em;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #800000;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="logo.jpg" alt="Login Logo">
        
        <h1>Thiagarajar College of Engineering</h1>
        <button onclick="showAdminLogin()">Admin Login</button>
        <button onclick="showFacultyLogin()">Faculty Login</button>

        <!-- Admin Login Form -->
        <div id="admin-form" class="login-form">
            <h2>Admin Login</h2>
            <input type="text" placeholder="Username" required>
            <input type="password" placeholder="Password" required>
            <button onclick="adminSubmit()">Login</button>
        </div>

        <!-- Faculty Login Form -->
        <div id="faculty-form" class="login-form">
            <h2>Faculty Login</h2>
            <input type="text" placeholder="Username" required>
            <input type="password" placeholder="Password" required>
            <button onclick="facultySubmit()">Login</button>
        </div>
    </div>

    <script>
        function showAdminLogin() {
            document.getElementById('admin-form').style.display = 'block';
            document.getElementById('faculty-form').style.display = 'none';
        }

        function showFacultyLogin() {
            document.getElementById('faculty-form').style.display = 'block';
            document.getElementById('admin-form').style.display = 'none';
        }

        function adminSubmit() {
            // Add validation logic here if needed
            alert("Admin Login success!");
            window.location.href = "admin1.php"; // Redirects to admin1.html
        }

        function facultySubmit() {
            // Add validation logic here if needed
            alert("Faculty Login success!");
            window.location.href = "mark.php"; // Redirects to faculty1.html (or desired page)
        }
    </script>
</body>

</html>
