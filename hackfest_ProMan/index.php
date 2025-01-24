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

// Fetch faculty names from the database
$sql = "SELECT name FROM faculty1";
$result = $conn->query($sql);

$faculty_names = [];
if ($result->num_rows > 0) {
    // Store faculty names in an array
    while ($row = $result->fetch_assoc()) {
        $faculty_names[] = $row['name'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sample Allocation</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="logo.jpg" alt="Logo" id="logo">
    </div>
    <h1>Panel Allocation</h1>
  </header>
  <main>
    <section>
      <h2>Faculty List</h2>
      
      <ul id="faculty-list">
        <?php
        // Loop through the faculty names and output them in a list
        foreach ($faculty_names as $index => $faculty) {
            $facultyId = 'faculty_' . $index; // Make sure the id is unique
            echo "<li id='$facultyId' class='faculty-item' draggable='true'>$faculty</li>";
        }
        ?>
      </ul>
    </section>

    <section>
      <h2>Panels</h2>
      <div id="panels">
        <div class="panel" id="panel1" ondrop="drop(event)" ondragover="allowDrop(event)">
          <h3 style="color: black; font-weight: bold;">Panel 1</h3>
        </div>
        <div class="panel" id="panel2" ondrop="drop(event)" ondragover="allowDrop(event)">
          <h3 style="color: black; font-weight: bold;">Panel 2</h3>
        </div>
      </div>
    </section>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <script src="script.js"></script>
  <script>
    // Dynamically add event listeners for dragstart on faculty list items
    document.querySelectorAll('.faculty-item').forEach(item => {
      item.addEventListener('dragstart', function(event) {
        event.dataTransfer.setData("text", event.target.id);
      });
    });

    // Allow drop on panels
    function allowDrop(event) {
      event.preventDefault();
    }

    // Handle the drop event to move the dragged item to the panel
    function drop(event) {
      event.preventDefault();
      const draggedId = event.dataTransfer.getData("text");
      const draggedElement = document.getElementById(draggedId);
      const panel = event.target.closest(".panel");

      // Ensure the item is dropped inside a panel
      if (!panel) return;

      // Check if the panel already has 2 members
      if (panel.querySelectorAll("li").length >= 2) {
        alert("A panel can have a maximum of 2 members!");
        return;
      }

      // Append the dragged item to the target panel
      panel.appendChild(draggedElement);
      
      // Optionally, update the database here to reflect the panel assignment
      const panelName = panel.id;
      const facultyNames = [];
      panel.querySelectorAll("li").forEach(li => facultyNames.push(li.textContent));

      // Send the updated panel data to the server using AJAX (implement this part)
      updatePanelInDatabase(panelName, facultyNames);
    }

    // Update the database with panel and faculty information
    function updatePanelInDatabase(panelName, facultyNames) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "updatePanel.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      // Prepare data to send to the server
      const data = "panelName=" + encodeURIComponent(panelName) +
                   "&faculty1=" + encodeURIComponent(facultyNames[0] || '') +
                   "&faculty2=" + encodeURIComponent(facultyNames[1] || '');

      xhr.send(data);

      xhr.onload = function() {
        if (xhr.status === 200) {
          console.log("Panel updated successfully.");
        } else {
          console.error("Error updating the panel.");
        }
      };
    }
  </script>
</body>
</html>
