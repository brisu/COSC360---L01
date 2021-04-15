<?php
session_start();

include_once 'serverconfig.php';

$username = $_POST["usrLog"];
$password = $_POST["passLog"];

// Need other way to validate logged in status
if(!empty($_SESSION['user'])) {
    echo "<alert> Already signed in </alert>";
    //header('location: http://localhost/360-Web-Dev/index.html');
}


if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);

} else {
    $mdPass = md5($password);
    echo $mdPass;
    $sql1 = "SELECT user_name, user_pass, is_admin FROM `users` WHERE (`user_name`='$username') AND (`user_pass`='$mdPass')";
    $result = mysqli_query($connection, $sql1);

    print_r($result);

    if (mysqli_num_rows($result) == 1) {
        echo "<p> Welcome back $username </p>";
        $_SESSION["user"] = $username;
        //header('Location: http://localhost/360-Web-Dev/index.html');
        die();
    } else {
        echo "<p> Username and/or email is incorrect </p>";
        echo "<a href= 'http://localhost/360-Web-Dev/php/register.php'> To sign up page </a></br>";
        echo "<a href= 'http://localhost/360-Web-Dev/php/login.php'> Back to re-try login </a>";
        die();
    }
}

?>

<html lang="en">

</html>