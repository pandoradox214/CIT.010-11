<?php include('server.php')?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="bg"></div> 
    <div class="login-container">
        <div class="login-panel">
           <div class = "LogoRegis"></div>
    <div class="yellowSignUp"></div>
        <center><h2>LOGIN YOUR ACCOUNT</h2></center>
    <!--Login Form-->
        <form action="SignUp.php" method="post">
            <?php include('error.php')?>
            <label for="Username">Username:</label>
            <input type="text" id="Username" name="username" value="<?php echo $username; ?>" required><br><br>
    
            <label for="Email">Email:</label>
            <input type="text" id="middle_initial" name="email" value="<?php echo $email; ?>"><br><br>
    
            <label for="Password">Password:</label>
            <input type="password" id="pass1" name="password_1" required><br><br>
    
            <label for="Confirm_Password">Confirm Password:</label>
            <input type="password" id="pass2" name="password_2" required><br><br>
            <input type="submit" name="reg_user" value="Sign Up">
        </form>
        <a href="Login.html"><p id="returnToLogin"> Back to login </p></a>
    </div>
    </div>
</body>
</html>