<?php

// Start a session or resume the current session
session_start();

// Include the database connection file

require_once "includes/connect.php";

// Create an array to store results

$results = [];

// Initialize a flag to track whether the user is logged in

$loggedIn = false;

// Use strip_tags to remove HTML tags from username or email

$usernameOrEmail = strip_tags($_REQUEST["username"]);

$password = strip_tags($_REQUEST["password"]);


// SQL query to fetch user information based on username or email

$query = "SELECT * FROM users WHERE username=? OR email=?";


// Prepare the SQL query

if ($stmt = mysqli_prepare($link, $query)) {

    // Bind parameters to the prepared statement

    mysqli_stmt_bind_param($stmt, "ss", $usernameOrEmail, $usernameOrEmail);

    // Execute the prepared statement

    mysqli_stmt_execute($stmt);

    // Get the result of the executed statement

    $result = mysqli_stmt_get_result($stmt);

    // Fetch the user data as an associative array

    $user = mysqli_fetch_assoc($result);

    // Check if a user with the given username/email exists and the password is correct

    if ($user && password_verify($password, $user["password"])) {

        // Set the flag to indicate that the user is logged in

        // Set user data in the session (e.g., for displaying email)

        $_SESSION["user_id"] = $user["id"];

        $_SESSION["email"] = $user["email"];

         $_SESSION["loggedIn"] = true;

        // Set a success flag in the results array

        $results["success"] = true;

    } else {

        // If login fails, set an error message

        $results["success"] = false;

        $results["message"] = "Information does not match. <a href='register.html'>Register</a> if you don't have an account.";

    }

    // Close the prepared statement

    mysqli_stmt_close($stmt);

}

// Encode the results as JSON and send them as a response

echo json_encode($results);

?>
