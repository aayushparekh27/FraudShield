// script.js
document.addEventListener("DOMContentLoaded", () => {
    console.log("Cyber Awareness site loaded.");
  });
  document.addEventListener("DOMContentLoaded", () => {
    console.log("Cyber Awareness site loaded.");

    // Example of adding an event listener to a button
    const reportButton = document.querySelector("button[type='submit']");
    if (reportButton) {
        reportButton.addEventListener("click", (event) => {
            event.preventDefault(); // Prevent form from submitting if validation fails

            // Validate the form (basic example)
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const incident = document.getElementById("incident") ? document.getElementById("incident").value : "";

            if (!name || !email || !incident) {
                alert("Please fill out all fields.");
            } else {
                console.log("Form submitted successfully!");
                // You can add AJAX calls or other methods to submit the form data
                alert("Report submitted successfully!");
            }
        });
    }
});
