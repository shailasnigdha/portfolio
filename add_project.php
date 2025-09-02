<?php
session_start();
include __DIR__ . '/includes/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $github_link = $_POST['link'];

    // Image Upload
    $imageName = "";
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = __DIR__ . '/../assets/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imageName = $imageName;
        } else {
            $message = "⚠️ Image upload failed.";
        }
    }

    // Insert into DB
    if ($title && $description) {
        $stmt = $conn->prepare("INSERT INTO projects (title, description, image, link) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $description, $imageName, $link);

        if ($stmt->execute()) {
            $message = "✅ Project added successfully!";
        } else {
            $message = "❌ Database error: " . $conn->error;
        }
    } else {
        $message = "⚠️ Title and description are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Project</title>
  <style>
  body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #0d1117; /* dark background */
    color: #e6edf3; /* light text */
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    justify-content: center;
  }

  h2 {
    font-size: 2.2rem;
    margin-bottom: 1.5rem;
    color: #58a6ff;
    text-shadow: 0 0 12px rgba(88,166,255,0.6);
    animation: fadeInDown 0.6s ease;
  }

  form {
    background: #161b22;
    padding: 2rem 2.5rem;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(88,166,255,0.25);
    max-width: 500px;
    width: 100%;
    animation: fadeInUp 0.7s ease;
  }

  form input, form textarea {
    width: 100%;
    padding: 12px 14px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #30363d;
    background: #0d1117;
    color: #e6edf3;
    font-size: 1rem;
    transition: all 0.3s ease;
  }

  form input:focus, form textarea:focus {
    border-color: #58a6ff;
    box-shadow: 0 0 10px rgba(88,166,255,0.6);
    outline: none;
  }

  textarea {
    min-height: 100px;
    resize: vertical;
  }

  button {
    width: 100%;
    padding: 12px;
    font-size: 1.1rem;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    background: linear-gradient(90deg, #1f6feb, #58a6ff);
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 15px rgba(88,166,255,0.4);
  }

  button:hover {
    background: linear-gradient(90deg, #58a6ff, #1f6feb);
    box-shadow: 0 0 25px rgba(88,166,255,0.7);
    transform: translateY(-2px);
  }

  a {
  margin-top: 10px;  
  display: inline-block;
  color: #58a6ff;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s ease, text-shadow 0.3s ease;
  position: relative;
}

a:hover {
  color: #1f6feb;
  text-shadow: 0 0 8px rgba(88,166,255,0.6);
}


  p {
    margin: 1rem 0;
    padding: 10px;
    background: #161b22;
    border: 1px solid #30363d;
    border-radius: 6px;
    text-align: center;
    color: #e6edf3;
    animation: fadeIn 0.5s ease;
  }

  /* Animations */
  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }

  @keyframes fadeInUp {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
  }

  @keyframes fadeInDown {
    from {opacity: 0; transform: translateY(-20px);}
    to {opacity: 1; transform: translateY(0);}
  }
</style>

</head>
<body>
  <h2>Add New Project</h2>
  <?php if ($message) echo "<p>$message</p>"; ?>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Project Title" required><br><br>
    <textarea name="description" placeholder="Project Description" required></textarea><br><br>
    <input type="text" name="link" placeholder="Github Link"><br><br>
    <input type="file" name="image" accept="image/*"><br><br>
    <button type="submit">Save Project</button>
  </form>

  <a href="dashboard.php">⬅ Back to Admin</a>
</body>
</html>