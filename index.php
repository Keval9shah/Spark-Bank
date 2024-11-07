<?php
require('connection.inc.php');
session_start();

if (isset($_SESSION['account_number'])) {
    echo '<script type="text/javascript">
            window.location.href = "./details";
          </script>';
}

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];
    $initial_balance = 7000;

    // Database Table: user
    // name | email | password | acc_no | balance

    // Generate Account Number
    $lastAccountQuery = mysqli_query($con, "SELECT acc_no FROM user ORDER BY acc_no DESC LIMIT 1");
    $accountNumber = (mysqli_num_rows($lastAccountQuery) > 0) ? (mysqli_fetch_object($lastAccountQuery)->acc_no + 69) : 80085;

    // Check if email already exists
    $is_duplicate_email = mysqli_num_rows(mysqli_query($con, "SELECT email FROM user WHERE email = '$email'")) == 0;

    if ($username) { // Sign Up
        if ($is_duplicate_email) {
            // Register new user
            mysqli_query($con, "INSERT INTO user (name, email, password, acc_no, balance) VALUES ('$username', '$email', '$password', '$accountNumber', '$initial_balance')");

            // Set session for new user
            $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT acc_no FROM user WHERE email = '$email' AND password = '$password'"));
            $_SESSION['account_number'] = $user['acc_no'];
            header("location:details/");
        } else {
            echo '<script type="text/javascript">alert("Email already exists");</script>';
        }
    } else { // Login
        $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT acc_no FROM user WHERE email = '$email' AND password = '$password'"));
        if ($user) {
            $_SESSION['account_number'] = $user['acc_no'];
            header("location:details/");
        } else {
            echo "<script>alert('Woops! Email and/or Password are incorrect.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="icon" type="image/png" href="./assets/images/favicon.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/auth-page.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bank</title>
</head>

<body>
    <div class="d-flex">
        <div class="poster-container"><img class="poster-image" src="./assets/images/money.jpg"></div>
        <div class="content-container">
            <img class="logo" src="./assets/images/logo.png" alt="Logo">
            <img class="process-indicator" src="./assets/images/process-indicator-left-filled.svg" alt="">
            <div class="banner-text">Welcome to a <span class="emphasis">safe</span> Banking Paradise</div>
            <div class="auth-section">
                <div class="auth-tab-group">
                    <div class="signup-tab current-tab" onclick="showSignupTab()">
                        Sign Up
                    </div>
                    <div class="login-tab" onclick="showLoginTab()">
                        Log In
                    </div>
                </div>
                <div class="pill"></div>
                <form action="" method="POST">
                    <div class="d-flex">
                        <div class="name field">
                            <div class="label">Name</div>
                            <div><input id="name-input" autocomplete="on" minlength="3" maxlength="18" name="name" required placeholder="Enter Name"></div>
                        </div>
                        <div class="field">
                            <div class="label">Email</div>
                            <div><input id="email-input" autocomplete="on" maxlength="32" type="email" name="email" required placeholder="Enter Email"></div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="field">
                            <div class="label">Password</div>
                            <div><input id="password-input" minlength="8" maxlength="16" type="password" name="password" required placeholder="Enter Password"></div>
                        </div>
                        <div class="field">
                            <button name="submit" type="submit" class="next-button">Next <img src="./assets/images/chevron-right.svg" alt="Chevron Right Icon"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Social Media Links -->
        <a href="https://twitter.com/keval2001" target="_blank" class="twitter social-buttons__button social-button social-button--twitter" aria-label="Twitter"><i class="fa fa-twitter tw"></i></a>
        <a href="https://www.instagram.com/kvl.sh/" target="_blank" class="instagram social-buttons__button social-button social-button--instagram" aria-label="Instagram"><i class="fa fa-instagram in"></i></a>
        <a href="https://github.com/Keval9shah" target="_blank" class="github social-buttons__button social-button social-button--github" aria-label="GitHub"><i class="fa fa-github gb"></i></a>
        <a href="https://www.linkedin.com/in/keval-shah-a4b2811a3/" target="_blank" class="linkedin social-buttons__button social-button social-button--linkedin" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
    </div>
    <script src="script.js"></script>
</body>

</html>