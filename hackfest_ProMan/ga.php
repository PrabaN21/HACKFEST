<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Allocation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header Styling */
        header {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #b30000;
            color: white;
            padding: 10px;
            position: relative;
        }

        header .logo img {
            height: 60px;
            width: 60px;
            position: absolute;
            left: 20px;
            top: 10px;
            bottom: 10px;
        }

        h1 {
            text-align: center;
            color: white;
            background-color: #b30000;
            padding: 20px;
            margin: 0;
            font-size: 30px;
        }

        .flex-container {
            display: flex;
            gap: 20px;
        }

        .section {
            flex: 1;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9f9f9;
        }

        h3 {
            text-align: center;
            color: #b30000;
            margin-bottom: 10px;
        }

        .team {
            margin-bottom: 15px;
        }

        .team button {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #b30000;
            border: 1px solid #0056b3;
            border-radius: 6px;
            text-align: left;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
        }

        .team button:hover {
            background-color: #0056b3;
        }

        .team-members {
            display: none;
            margin-top: 10px;
            padding-left: 20px;
        }

        .team-members li {
            margin: 5px 0;
        }

        .guide {
            padding: 10px;
            margin: 5px 0;
            background: white; /* Changed to #b30000 */
            border: 1px solid #b30000; /* Changed to #b30000 */
            border-radius: 4px;
            text-align: center;
            cursor: move;
        }

        .dropzone {
            border: 2px dashed #ccc;
            padding: 10px;
            border-radius: 8px;
            min-height: 50px;
            background: #f9f9f9;
            text-align: center;
        }

        .dropzone.dragging {
            border-color: #b30000; /* Changed to #b30000 */
            background: #f1f1f1;
        }

        .assigned-guide {
            padding: 5px;
            margin-top: 10px;
            background: #b30000; /* Changed to #b30000 */
            color: white;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        .assigned-guide:hover {
            background-color: #660000; /* Darker shade of #b30000 */
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="logo.jpg" alt="TCE Logo">
        </div>
    </header>

    <h1>GUIDE ALLOCATION</h1>

    <div class="container">
        <div class="flex-container">
            <!-- Teams Section -->
            <div class="section">
                <h3>Teams</h3>
                <div class="team" id="team1">
                    <button onclick="toggleMembers('members1')">Team 1</button>
                    <ul class="team-members" id="members1">
                        <li>Student1</li>
                        <li>Student2</li>
                        <li>Student3</li>
                    </ul>
                    <div class="dropzone" ondragover="allowDrop(event)" ondrop="drop(event)" id="dropzone1"></div>
                </div>
                <div class="team" id="team2">
                    <button onclick="toggleMembers('members2')">Team 2</button>
                    <ul class="team-members" id="members2">
                        <li>Student1</li>
                        <li>Student2</li>
                        <li>Student3</li>
                    </ul>
                    <div class="dropzone" ondragover="allowDrop(event)" ondrop="drop(event)" id="dropzone2"></div>
                </div>
            </div>

            <!-- Guides Section -->
            <div class="section">
                <h3>Guides</h3>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide1">Dr. Suguna</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide2">Dr. Kartik</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide3">Dr. Abira</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide4">Dr. Meera</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide5">Dr. Anitha</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide6">Dr. Vikram</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide7">Dr. Rahul</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide8">Dr. Surya</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide9">Dr. Pooja</div>
                <div class="guide" draggable="true" ondragstart="drag(event)" id="guide10">Dr. Akash</div>
            </div>
        </div>
    </div>

    <script>
        function toggleMembers(id) {
            const members = document.getElementById(id);
            if (members.style.display === "block") {
                members.style.display = "none";
            } else {
                members.style.display = "block";
            }
        }

        function allowDrop(event) {
            event.preventDefault();
            event.target.classList.add('dragging');
        }

        function drag(event) {
            event.dataTransfer.setData('text', event.target.id);
        }

        function drop(event) {
            event.preventDefault();
            const guideId = event.dataTransfer.getData('text');
            const guide = document.getElementById(guideId);

            if (event.target.classList.contains('dropzone')) {
                const assignedGuides = event.target.querySelectorAll('.assigned-guide');
                const guideAlreadyAssigned = Array.from(assignedGuides).some(assignedGuide => assignedGuide.textContent === guide.textContent);

                if (!guideAlreadyAssigned) {
                    const newAssignedGuide = document.createElement('div');
                    newAssignedGuide.classList.add('assigned-guide');
                    newAssignedGuide.textContent = guide.textContent;
                    newAssignedGuide.onclick = function () {
                        removeGuide(newAssignedGuide, event.target);
                    };
                    event.target.appendChild(newAssignedGuide);
                }
            }
            event.target.classList.remove('dragging');
        }

        function removeGuide(guideElement, dropzone) {
            dropzone.removeChild(guideElement);
        }
    </script>
</body>
</html>
