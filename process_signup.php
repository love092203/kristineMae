<?php
include 'database.php';
mysqli_report(MYSQLI_REPORT_OFF);

if(empty($_POST["username"]))
{
  die("Username is required. Please go back to continue.");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
  die("Valid email address is required. Please go back to continue.");
}

if(strlen($_POST["password"]) < 8)
{
  die("Password must be at least 8 characters long. Please go back to continue.");
}

// skipped lowercase and uppercase validation
// if(!preg_match("/[a-z]/i", $_POST["password"]))
// {
//   die("Password must contain at least one lowercase and at least one uppercase letter");
// }

if(!preg_match("/[0-9]/i", $_POST["password"]))
{
  die("Password must contain a number. Please go back to continue.");
}

if($_POST["password"] !== $_POST["confirm_password"])
{
  die("Password and confirm password must match. Please go back to continue.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

  $stmt = $mysqli->prepare("INSERT INTO user (username, email, password_hash) VALUES (?,?,?)");
  $stmt->bind_param("sss", $username, $email, $password);
  $stmt->execute();
  header("Location: signup_success.php");
  exit();    
}
// print_r($_POST);
// var_dump($password_hash);
?>