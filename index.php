<?php
include 'database.php';
session_start();

if(isset($_SESSION["user_id"]))
{
  $user_id = $_SESSION["user_id"];
  $stmt = $mysqli->prepare("SELECT * FROM user WHERE id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();    
  } else {
    header("Location: login.php");
    exit();
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #16D9e8, #c3ddeb,#eee3ec,#fbbdba);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh; /* Ensure the page takes up at least the full height of the viewport */
    }
    .container {
      text-align: center;
      background-color: #fff;
      padding: 50px; /* Reduced padding */
      border-radius: 8px; /* Slightly reduced border radius */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Increased shadow */
      max-width: 400px; /* Limit the width of the content for better readability */
      width: 90%; /* Take up 90% of the available width */
    }
    h1 {
      color: #333;
      margin-top: 0; /* Add margin-top to separate from the container */
    }
    p {
      margin-bottom: 20px; /* Reduced margin-bottom */
    }
    a {
      color: #007bff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .logout-btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .logout-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Home Page</h1>
    <?php if(isset($user)): ?>
      <p>Hello, <?= htmlspecialchars($user["username"]); ?>. You are now logged in.</p>
      <button class="logout-btn"><a href="logout.php" style="color: inherit; text-decoration: none;">Log Out</a></button>
    <?php else: ?>
      <p>Welcome! Please <a href="login.php">Log In</a> or <a href="signup.php">Sign Up</a>.</p>
    <?php endif; ?>
  </div>
</body>

</html>