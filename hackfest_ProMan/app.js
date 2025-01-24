// Allow drop functionality for the panels
function allowDrop(event) {
  event.preventDefault(); // Prevent default to allow dropping
}

// Handle the dragstart event to store the dragged element's ID
function drag(event) {
  event.dataTransfer.setData("text", event.target.id); // Set the ID of the dragged element
}

// Handle the drop event to move the dragged element to the target panel
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
}

// Assign drag event listeners to each faculty list item
document.querySelectorAll("#faculty-list li").forEach((faculty) => {
  faculty.addEventListener("dragstart", drag);
});

// Assign drop and dragover event listeners to each panel
document.querySelectorAll(".panel").forEach((panel) => {
  panel.addEventListener("dragover", allowDrop);
  panel.addEventListener("drop", drop);
});
