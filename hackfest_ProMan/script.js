function drop(event) {
    event.preventDefault(); // Prevent default action
    const draggedId = event.dataTransfer.getData("text"); // Get the ID of the dragged element
    const draggedElement = document.getElementById(draggedId); // Find the dragged element
  
    // Get the target panel where the item is being dropped
    const panel = event.target.closest(".panel");
  
    // Check if the panel already has 2 members
    if (panel.querySelectorAll("li").length >= 2) {
      alert("A panel can have a maximum of 2 members!");
      return;
    }
  
    // Append the dragged element to the target panel
    panel.appendChild(draggedElement);
  
    // Get the faculty names in the panel
    const facultyNames = [];
    panel.querySelectorAll("li").forEach((li) => {
      facultyNames.push(li.textContent);
    });
  
    // Send the faculty names to the server via AJAX
    const panelName = panel.id; // Get the panel name (id)
    updatePanelInDatabase(panelName, facultyNames);
  }
  
  // AJAX request to store the panel data in the database
  function updatePanelInDatabase(panelName, facultyNames) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "updatePanel.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
    // Prepare the data to send
    const data = "panelName=" + encodeURIComponent(panelName) +
                 "&faculty1=" + encodeURIComponent(facultyNames[0] || '') +
                 "&faculty2=" + encodeURIComponent(facultyNames[1] || '');
  
    // Send the request
    xhr.send(data);
  
    xhr.onload = function() {
      if (xhr.status == 200) {
        console.log("Panel updated successfully.");
      } else {
        console.error("Error updating the panel.");
      }
    };
  }
  