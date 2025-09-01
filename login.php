<?php
// login.php
session_start();
include 'includes/db.php'; // make sure this creates $conn = new mysqli(...)

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Please enter username and password.';
    } else {
        // Look up user by username
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? LIMIT 1");
        if (!$stmt) {
            $error = "Database error: " . $conn->error;
        } else {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result ? $result->fetch_assoc() : null; // $user is always defined here

            if ($user) {
                $stored = $user['password'];
                $ok = false;

                // If stored value looks like a bcrypt hash ($2y$...), use password_verify
                if (strncmp($stored, '$2y$', 4) === 0) {
                    $ok = password_verify($password, $stored);
                } else {
                    // Fallbacks for legacy data: plain text or md5
                    $ok = ($password === $stored) || (md5($password) === $stored);
                }

                if ($ok) {
                    // Success: set session + cookie and go to dashboard
                    $_SESSION['user'] = $user['username'];
                    setcookie(
                        'user',
                        $user['username'],
                        time() + 60 * 60 * 24 * 30, // 30 days
                        '/',
                        '',
                        !empty($_SERVER['HTTPS']),
                        true
                    );
                    header('Location: dashboard.php');
                    exit;
                } else {
                    $error = '❌ Wrong password!';
                }
            } else {
                $error = '⚠️ User not found. Please sign up.';
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Theme-matched inline styles (ash background + green accents) -->
  <style>
  :root {
    --blue: #007bff;
    --blue-dark: #0056b3;
    --ash: #f4f6f9;
    --text: #1e2a38;
  }

  * {
    box-sizing: border-box;
  }

  body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 24px;
  }

  .container {
    max-width: 1100px;
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 420px;
    gap: 40px;
    align-items: center;
  }

  @media (max-width: 900px) {
    .container {
      grid-template-columns: 1fr;
      text-align: center;
    }
  }

  .brand {
    text-align: left;
  }

  .title {
    font-size: 52px;
    font-weight: 800;
    color: #fff;
    margin: 0 0 10px;
    letter-spacing: 1px;
    text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  }

  .subtitle {
    font-size: 20px;
    color: #dcdcdc;
    margin: 0 0 35px;
    max-width: 400px;
    line-height: 1.5;
  }

  .login-box {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: fadeInUp 0.8s ease;
  }

  .login-box form {
    margin: 0;
  }

  .login-box input {
    width: 100%;
    padding: 14px 12px;
    margin: 12px 0;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
  }

  .login-box input:focus {
    border-color: var(--blue);
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
  }

  .login-btn {
    background: var(--blue);
    color: #fff;
    border: 0;
    width: 100%;
    padding: 14px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 700;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
  }

  .login-btn:hover {
    background: var(--blue-dark);
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0, 123, 255, 0.4);
  }

  
  .error {
    color: #ff4d4f;
    background: rgba(255, 77, 79, 0.1);
    border: 1px solid rgba(255, 77, 79, 0.3);
    padding: 10px 12px;
    border-radius: 8px;
    margin: 12px 0 0;
    font-size: 14px;
  }

  .center {
    text-align: center;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

</head>
<body>
  <div class="container">
    <div class="brand">
      <div class="title">User Login</div>
      <div class="subtitle">Helps a user to add projects in portfolio and show messages sent by others</div>
    </div>

    <div class="login-box">
      <form method="POST" action="login.php" novalidate>
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" class="login-btn">Log In</button>
      </form>

      <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      
    </div>
  </div>
</body>
</html>

