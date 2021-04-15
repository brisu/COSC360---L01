<?php
  $host = "localhost";
  $database = "project_360";
  $userDB = "webuser";
  $passwordDB = "P@ssw0rd";
  $connection = mysqli_connect($host, $userDB, $passwordDB, $database);

  $error = mysqli_connect_error();

