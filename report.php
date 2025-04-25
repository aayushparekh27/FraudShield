<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $incident = htmlspecialchars(trim($_POST['incident']));

    // Simple validation
    if (empty($name) || empty($email) || empty($incident)) {
      echo "<script>alert('Please fill out all fields.');</script>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Please enter a valid email address.');</script>";
    } else {
      // Process the report (store in database or send email)
      // Example: Send email (if configured) or store in a database.
      // mail($email, "Cyber Fraud Report Submitted", "Name: $name\nIncident: $incident");

      echo "<script>alert('Report submitted successfully!');</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Report Cyber Fraud</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header class="site-header">
    <h1>Cyber Fraud Awareness Portal</h1>
    <nav class="site-nav">
      <a href="index.html">Home</a>
      <a href="types.html">Types</a>
      <a href="cases.html">Case Studies</a>
      <a href="tips.html">Prevention</a>
      <a href="report.php">Report</a>
      <a href="contact.html">Contact</a>
    </nav>
  </header>

  <section class="report-section">
    <h2>Report a Cyber Fraud Incident</h2>
    <form method="POST" action="report.php">
      <label for="name">Your Name:</label>
      <input type="text" id="name" name="name" required placeholder="Enter your full name" />

      <label for="email">Your Email:</label>
      <input type="email" id="email" name="email" required placeholder="Enter your email address" />

      <label for="incident">Incident Details:</label>
      <textarea id="incident" name="incident" rows="5" required placeholder="Provide a detailed description of the fraud incident"></textarea>

      <button type="submit">Submit Report</button>
    </form>
  </section>

  <footer class="site-footer">
    <p>&copy; 2025 Cyber Awareness Portal. All rights reserved.</p>
  </footer>
</body>
</html>
