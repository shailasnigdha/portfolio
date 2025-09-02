<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Connect to database
$conn = new mysqli("localhost", "root", "", "portfolio_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch projects
$projects = $conn->query("SELECT * FROM projects ORDER BY id ASC");


// Fetch messages
$messages = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #0d1117; /* Dark background */
    margin: 0;
    padding: 0;
    color: #e6edf3; /* Light text */
  }

  /* Navigation Bar */
  nav {
    background: #0d1117;
    padding: 16px 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 12px rgba(0, 150, 255, 0.25);
    border-bottom: 2px solid rgba(0, 150, 255, 0.4);
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  nav a {
    margin: 0 18px;
    font-size: 17px;
    text-decoration: none;
    color: #58a6ff;
    font-weight: 500;
    cursor: pointer;
    position: relative;
    transition: color 0.3s ease, text-shadow 0.3s ease;
  }

  nav a::after {
    content: "";
    display: block;
    width: 0;
    height: 2px;
    background: #58a6ff;
    margin: 4px auto 0;
    border-radius: 2px;
    transition: width 0.3s ease;
  }

  nav a:hover {
    color: #1f6feb;
    text-shadow: 0 0 8px rgba(88,166,255,0.8);
  }

  nav a:hover::after {
    width: 100%;
  }

  /* Page Container */
  .container {
    padding: 30px 50px;
    max-width: 1200px;
    margin: auto;
  }

  .section {
    display: none;
  }

  .section.active {
    display: block;
    animation: fadeIn 0.5s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* Tables */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: #161b22;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,150,255,0.2);
  }

  table th, table td {
    padding: 14px 16px;
    border-bottom: 1px solid #30363d;
    text-align: left;
    color: #c9d1d9;
  }

  table th {
    background: #1f2937;
    color: #58a6ff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 15px;
  }

  table tr:hover {
    background: rgba(88, 166, 255, 0.1);
    transition: background 0.3s ease;
  }

  /* Buttons */
  .btn {
    display: inline-block;
    margin: 12px 0;
    padding: 10px 18px;
    background: #1f6feb;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 0 12px rgba(88,166,255,0.5);
  }

  .btn:hover {
    background: #58a6ff;
    color: #0d1117;
    box-shadow: 0 0 20px rgba(88,166,255,0.8);
    transform: translateY(-2px);
  }
  </style>

</head>
<body>
  <h2 style="padding:20px;">Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?> 👋</h2>
  
  <nav>
    <a onclick="showSection('projects')">Projects</a> |
    <a onclick="showSection('messages')">Messages</a> |
    <a href="logout.php">Logout</a>
  </nav>

  <div class="container">
    <!-- Projects Section -->
    <div id="projects" class="section active">
      <h3>Projects</h3>
      <a href="add_project.php" class="btn">+ Add Project</a>
      <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
        </tr>
        <?php while ($row = $projects->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>

    <!-- Messages Section -->
    <div id="messages" class="section">
      <h3>Messages</h3>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Receiving Time</th>
        </tr>
        <?php while ($msg = $messages->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $msg['id']; ?></td>
            <td><?php echo htmlspecialchars($msg['name']); ?></td>
            <td><?php echo htmlspecialchars($msg['email']); ?></td>
            <td><?php echo htmlspecialchars($msg['message']); ?></td>
            <td><?php echo htmlspecialchars($msg['created_at']); ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>

  <script>
    function showSection(sectionId) {
      document.querySelectorAll(".section").forEach(sec => sec.classList.remove("active"));
      document.getElementById(sectionId).classList.add("active");
    }
  </script>
</body>
</html>
<?php $conn->close(); ?>
