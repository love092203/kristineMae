<?php
include 'database.php';
$is_invalid = false;
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];
//   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    // $is_invalid = true;
//   } else {
    $stmt = $mysqli->prepare("SELECT id, password_hash FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $user = $result->fetch_assoc();

    if($user) {
        // Debugging output
        var_dump($password); // Check the password entered by the user
        var_dump($user['password_hash']);
        if (password_verify($password, $user['password_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            session_regenerate_id();
            header("Location: index.php");
            exit();
        } else {
            $is_invalid = true;
            $message = "Incorrect Password";
        }
    } else {
        $is_invalid = true;
        $message = "Email not found";
    }   
}


// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #16D9e8, #c3ddeb,#eee3ec,#fbbdba);;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      max-width: 400px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      color: #333;
    }
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
    p {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
    .signup-link {
      text-align: center;
      margin-top: 10px;
    }
    .signup-link a {
      color: #007bff;
      text-decoration: none;
    }
    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
  <h1>Login Page</h1>

    <?php if($is_invalid):?>
    <p>Invalid Email or Password</p>
    <?php endif; ?>

    <form method="post">
      <input autocomplete="off" type="email" placeholder="Email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
      <input autocomplete="off" type="password" placeholder="Password" name="password" id="password">
      <button>Login</button>
    </form>

    <div class="signup-link">
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
  </div>
</body>
</html>