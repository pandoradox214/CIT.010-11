<?php  
session_start();

$username = "";
$email = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'budgetwais');

if (isset($_POST['reg_user'])){
    // Receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // Form validation: ensure that the form is correctly filled
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {array_push($errors, "Username is required");}
    if (empty($email)) {array_push($errors, "Email is required");}
    if (empty($password_1)) {array_push($errors, "Password is required");}
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // More validation (e.g., email format)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
    }

    // Check if the username or email already exists
    $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user){
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }
    

    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: Login.html');
    }

    // if(isset($_POST['login_user'])) {
    //     $username = mysqli_real_escape_string($db, $_POST['username']);
    //     $password = mysqli_real_escape_string($db, $_POST['password']);
    // }





}

// Close the database connection
mysqli_close($db);
?>
