<?php
session_start();
include_once 'serverconfig.php';

    if (empty($_GET["submit"])) {
        $errorCode = "Empty search string";
    } else {
        $searchStr = $_GET["searchStr"];
        // mitigate html special char attacks
        $query = htmlspecialchars($searchStr);
        // mitigate sql injection attacks
        $query = mysqli_real_escape_string($connection, $query);
    }

    echo $query;
if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);

} else {

    $sql = "SELECT DISTINCT * FROM `topics`, `categories`, `posts` WHERE (`topic_subject` LIKE '%$searchStr%') OR (`categories_name` LIKE '%$searchStr%') OR (`post_content` LIKE '%$searchStr%')";

    $result = mysqli_query($connection, $sql);

    echo "<div class='output'>";
    echo "<fieldset>";
    echo "<legend>Search string $searchStr</legend>";
    echo "<table>";
    // Associative array
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr> Result: ".$row["topic_subject"]."</tr><br>";
        }
        die();
    } else
        echo "<p> No search results returned </p>";
        //echo "<a href= 'http://localhost/lab9/lab9-1.html'> To sign up page </a></br>";
        //echo "<a href= 'http://localhost/lab9/lab9-2.html'> Back to re-try login </a>";
  }
echo "</table>";
echo "</fieldset>";
echo "</div>";

mysqli_free_result($result);

mysqli_close($connection);
?>