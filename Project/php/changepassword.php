<?php 
include_once 'serverconfig.php';

if (isset($_POST["submit"])) {

    if (empty($_POST["username"])) {
      $errorCode = "Username is required";
      echo "<script>alert(\"Username can't be empty\")</script>";
    } else {
      $username = $_POST["username"];
    }

    if (empty($_POST["oldpassword"])) {
      $errorCode = "Old password is required";
      echo "<script>alert(\"Password can't be empty\")</script>";
    } else {
      $passwordOld = ($_POST["oldpassword"]);
    }

    if (empty($_POST["newpassword"])) {
        $errorCode = "New password is required";
        echo "<script>alert(\"Password can't be empty\")</script>";
      } else {
        $newpassword = ($_POST["newpassword"]);
      }
    
    if (empty($_POST["newpassword-check"])) {
        $errorCode = "Confirmation password is required";
        echo "<script>alert(\"Confirmation password can't be empty\")</script>";
      } else {
        $newpassword_check = ($_POST["newpassword-check"]);
      }
  }

if(strcmp($newpassword, $newpassword_check) != 0 ) {
    echo "<script>alert(\"New password and confirmation must match\")</script>";
    echo "<a href= 'http://localhost/lab9/lab9-3.html'> Back to re-try login </a>";
}

  if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
  } else {
    $mdPass = md5($passwordOld);
    $mdPassNew = md5($newpassword);

    $sql2 = "UPDATE `users` SET `password`=\"$mdPassNew\" WHERE `username`=\"$username\" AND `password`=\"$mdPass\"";
  }
    if (mysqli_query($connection, $sql2)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
        echo "<p> Username and/or email is incorrect </p>";
        echo "<a href= 'http://localhost/lab9/lab9-1.html'> To sign up page </a></br>";
        echo "<a href= 'http://localhost/lab9/lab9-3.html'> Back to re-try login </a>";
    }
  
    mysqli_close($connection);
?>