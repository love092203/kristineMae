<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #16D9e8, #c3ddeb, #eee3ec, #fbbdba);
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      max-width: 400px;
      margin: 50px auto;
      background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      color: #333;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #0056b3;
    }
    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      text-decoration: none;
      color: #007bff;
    }
    a:hover {
      text-decoration: underline;
    }
    .icon {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 10px;
      color: #ccc;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Sign Up Page</h1>
    <form action="process_signup.php" method="POST" novalidate>
      <div style="position: relative;">
        <i class="icon fas fa-user"></i>
        <input autocomplete="off" type="text" placeholder="Username" name="username">
      </div>
      <div style="position: relative;">
        <i class="icon fas fa-envelope"></i>
        <input autocomplete="off" type="email" placeholder="Email" name="email">
      </div>
      <div style="position: relative;">
        <i class="icon fas fa-lock"></i>
        <input autocomplete="off" type="password" placeholder="Password" id="password" name="password">
      </div>
      <div style="position: relative;">
        <i class="icon fas fa-lock"></i>
        <input autocomplete="off" type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password">
      </div>
      <button>Sign Up</button>
      <a href="login.php">Login</a>
    </form>
  </div>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome for icons -->
</body>
</html>

