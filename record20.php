<?php
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username and password both match
    $sql = "SELECT * FROM Login_form WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // Check username only
    $check_user = "SELECT * FROM Login_form WHERE username='$username'";
    $user_result = mysqli_query($conn, $check_user);

    // Check password only
    $check_pass = "SELECT * FROM Login_form WHERE password='$password'";
    $pass_result = mysqli_query($conn, $check_pass);

    if (mysqli_num_rows($result) > 0) {
        header("Location: welcome.php?user=" . urlencode($username));
        exit();
    } elseif (mysqli_num_rows($user_result) > 0) {
        $message = "Incorrect password.";
    } elseif (mysqli_num_rows($pass_result) > 0) {
        $message = "Incorrect username.";
    } else {
        $message = "Invalid username and password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f0f0f0;
        }
        .login-box {
            width: 300px;
            margin: 100px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px gray;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
        }
        input[type=submit] {
            width: 105%;
            background: #4CAF50;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 5px;
        }
        .msg {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2 align="center">Login</h2>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" value="LOGIN">
    </form>
    <p class="msg"><?php echo $message; ?></p>
</div>
</body>
</html>

