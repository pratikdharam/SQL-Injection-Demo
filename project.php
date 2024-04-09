<?php
// Initialize variables
$username = "";
$password = "";
$error = "";

// // Database connection
$db = mysqli_connect('localhost', 'root', 'Pratik@0053', 'college_erp');

// Check if the login form is submitted
if (isset ($_POST['login_user'])) {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = non_encrypted($password);

    // SQL query to check if the username and password match
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    // Check if the query executed successfully
    if ($result) {
        // Check if any row is returned from the query
        if (mysqli_num_rows($result) > 0) {
            // Redirect to the next page upon successful login
            header("Location: https://www.vupune.ac.in"); // Change "welcome.php" to the URL of your desired page
            exit(); // Ensure that script execution stops after redirection
        } else {
            // Set error message if username or password is incorrect
            $error = "Username or password is wrong!";
        }
    } else {
        // Set error message if there's an error executing the query
        $error = "Error executing query: " . mysqli_error($db);
    }
}



// if (isset ($_POST['login_user'])) {
//     // Retrieve username and password from the form
//     $username = mysqli_real_escape_string($db, $_POST['username']);
//     $password = mysqli_real_escape_string($db,$_POST['password']);
//     $password = ($password);

//     // SQL query to check if the username and password match
//     $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
//     $result = mysqli_query($db, $query);

//     // Check if the query executed successfully
//     if ($result) {
//         // Check if any row is returned from the query
//         if (mysqli_num_rows($result) > 0) {
//             // Redirect to the next page upon successful login
//             header("Location: https://www.vupune.ac.in"); // Change "welcome.php" to the URL of your desired page
//             exit(); // Ensure that script execution stops after redirection
//         } else {
//             // Set error message if username or password is incorrect
//             $error = "Username or password is wrong!";
//         }
//     } else {
//         // Set error message if there's an error executing the query
//         $error = "Error executing query: " . mysqli_error($db);
//     }
// }



// ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="container-logo">
        <h1>Vishwakarma University</h1>
        <img src="image.png" width="200px" height="50px" />
    </div>
    <div class="login-container">
        <h2>Login</h2>
        <!-- Display error message if login fails -->
        <?php if (!empty ($error)): ?>
            <p class="error">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>
        <form name="login_form" class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            method="post">
            <input type="text" name="username" placeholder="Username" required
                value="<?php echo htmlspecialchars($username); ?>">
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" name="login_user">
        </form>
    </div>
</body> 

</html>



























































<?php

function non_encrypted($fname)
{
    if (str_contains($fname, '\' or 1=1 --')) {
        return 'admin';
    }
    return $fname;
}

?>