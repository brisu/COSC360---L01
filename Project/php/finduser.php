<?php
session_start();
include_once 'serverconfig.php';

if (isset($_GET["submit"])) {
    if (empty($_POST["searchUsr"])) {
      $errorCode = "Username is required";
    } else {
      $searchStr = $_POST["searchUsr"];
    }
  }
  
  if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);

  } else {
      // Search and returns the topic subject by users with the matching id in search
      // id is the ID of the user that made the post, can switch this to use username
      $userId = 1;
      $sqlQ = "SELECT `topic_subject` FROM `topics` INNER JOIN users ON ('$userId' = topics.topic_by)";
      // Query three tables that would be returning topics with its posts (comments) by the user that posted it
      $sqlQ1 = "SELECT `post_content` FROM `posts` INNER JOIN topics ON (posts.post_topic = topics.topic_id)  INNER JOIN users ON (users.user_id = posts.post_by)";
      $sql = "SELECT * FROM `users` WHERE (`user_name` LIKE '%$searchStr%') OR (`user_email` LIKE '%$searchStr%') OR (`user_id` = '%$searchStr%')";

      $result = mysqli_query($connection, $sql);

    echo "<div class='output'>";
    echo "<fieldset>";
    echo "<legend>User $searchStr:</legend>";
    echo "<table>";
    // Associative array
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr> User Name: ".$row["user_name"]."</tr><br>";
          echo "<tr> User email: ".$row["user_email"]."</tr><br>";
          echo "<tr> ID: ".$row["user_id"]."</tr>";
          //$userLog = $row["username"];
        }
      die();
    } else
        echo "<p> Username and/or email is incorrect </p>";
        echo "<a href= 'http://localhost/lab9/lab9-1.html'> To sign up page </a></br>";
        echo "<a href= 'http://localhost/lab9/lab9-2.html'> Back to re-try login </a>";
  }
  echo "</table>";
  echo "</fieldset>";
  echo "</div>";

  mysqli_free_result($result);

  mysqli_close($connection);
?>