<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Allocation</title>
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
      <h2>Faculty List </h2>
      <ul id="faculty-list" >
        <!-- Faculty members will be dynamically populated -->
        <li draggable="true" id="faculty1">Alice</li>
        <li draggable="true" id="faculty2">Bob</li>
        <li draggable="true" id="faculty3">Charlie</li>
        <li draggable="true" id="faculty4">Diana</li>
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
  <script src="app.js"></script>
</body>
</html>