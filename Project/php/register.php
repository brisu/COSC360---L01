<?php
session_start();
include_once "serverconfig.php";

// Issue with the submit not being selected again
if (isset($_POST["submit"])) {
	if (empty($_POST["usrReg"])) {
		$errorCode = "Username is required";
	} else {
		$username = ($_POST["usrReg"]);
	}

	if (empty($_POST["emailReg"])) {
		$errorCode = "Email is required";
	} else {
		$email = ($_POST["emailReg"]);
	}

    if (empty($_POST["pwdReg"])) {
        $errorCode = "Password is required";
    } else {
        $password = ($_POST["pwdReg"]);
    }
}

if ($error != null) {
	$output = "<p>Unable to connect to database!</p>";
	exit($output);
} else {

	$sql1 = "SELECT * FROM users WHERE username=\"$username\" OR email=\"$email\"";
	// Query bool status of the username and email in use
	$results1 = mysqli_query($connection, $sql1);

	if ($results1) {
		echo "<p> User already exists with this username and/or email.</p>";
		echo "<a href=\"http://localhost/360-Web-Dev/register.php/\">Return to user</a>";
		mysqli_close($connection);
		die();

	} else {
		echo "<p> Registering $username as new user </p>";
        // Create connection
        $mdPass = md5($password);
        $conn1 = mysqli_connect($host, $user, $passwordDB, $database);

        // Check connection
        if (!$conn1) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO users (user_name, user_pass, user_email, user_date)
             VALUES (\"$username\", \"$mdPass\", \"$email\", now());";

        if (mysqli_query($conn1, $sql)) {
            echo "New record created successfully";
            // Set user of session to username once it's successfully signed up
            $_SESSION["user"] = $username;
            //header("http://localhost/360-Web-Dev/index.html");
            echo "<alert> Successfully registered<br>Redirecting back to home page </alert>";
            header('Location: http://localhost/360-Web-Dev/index.html');
            mysqli_close($conn1);
            die();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn1);
            header("Location: http://localhost/360-Web-Dev/php/register.php");
            die();
        }

        // Skeleton code referenced from W3school
	}
}
?>

<html>

<body>
</body>

</html>