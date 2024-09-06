<?php
session_start();

include("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to fetch user data based on email and password
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);

    // Check if the query was successful and if there's exactly one user with the provided credentials
    if ($result && mysqli_num_rows($result) == 1) {
        // User exists, fetch user data and set session variables
        $userData = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $userData['id'];
        $_SESSION['idno'] = $userData['idno'];
        $_SESSION['firstName'] = $userData['firstName'];
        $_SESSION['middleName'] = $userData['middleName'];
        $_SESSION['lastName'] = $userData['lastName'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['session'] = $userData['session'];

        // Redirect to home page
        header("location: home.php");
        exit;
    } else {
        // Invalid credentials, display error message
        echo "<script type='text/javascript'> alert('Invalid email or password!'); window.location='adminlogin.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Facebook</title>
</head>
<body>
    <section class="main-wrapper">
        <div class="branding">
          <h1 class="logo">facebook</h1>
          <h2 class="slogan">Facebook helps you connect and share with the people in your life.</h2>
        </div>  
        <div>
            <div class="panel">
                <img src="image/UC logofinal.png" class="img-uc">
                <form>  
                    <input type="text" name="username" placeholder="Email address or phone number" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input class="log-in-button"
                    type="button" value="Log in">
                </form>
                <a href="#" class="forgot">Forgotten Password</a>
                <hr>
                <a href="register.php" class="register-button">Register Account</a>
            </div>
            <div class="bottom-link">
                <a href="#" class="page">Create a Page</a><p>for a celebrity, brand or business.</p>
            </div>
        </div>
    </section>

    <footer>
        <ul>
            <p>@Copyright 2024</p>
            <li><a class="footer-link">SignUp</a></li>
            <li><a class="footer-link">Login</a></li>
            <li><a class="footer-link">Messenger</a></li>
            <li><a class="footer-link">Facebook Lite</a></li>
            <li><a class="footer-link">Watch</a></li>
            <li><a class="footer-link">Places</a></li>
            <li><a class="footer-link">Games</a></li>
            <li><a class="footer-link">Marketplace</a></li>
            <li><a class="footer-link">Facebook Pay</a></li>
            <li><a class="footer-link">Jobs</a></li>
            <li><a class="footer-link">Oculus</a></li>
            <li><a class="footer-link">Portal</a></li>
            <li><a class="footer-link">Instagram</a></li>
            <li><a class="footer-link">Bulletin</a></li>
        </ul>
    </footer>
</body>
</html>