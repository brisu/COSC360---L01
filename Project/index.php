<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Arcadia</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>
<header>

    <nav>
        <div class="logo">
            <h1>Arcadia</h1>
        </div>
        <p> <?php
            if(isset($_SESSION['user'])){
                $signedInUsr = $_SESSION['user'];
                echo "<p>Signed in as: $signedInUsr </p>"; }
            ?></p>
        <div class="categories">
            <a class='nav_options' href="#General">General</a>
            <a class='nav_options' href="#Music">Music</a>
            <a class='nav_options' href="#Art">Art</a>
            <a class='nav_options' href="#Story">Story</a>
        </div>
        <div id="search-form">
            <form action="php/search.php" method="GET">
                <input type="text" name="searchStr" id="searchStr" placeholder="Search...">
                <!-- got the search query only with subit column -->
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
        <div id="signup-button">
            <button onclick="toggleSignupFormVisibility()">Signup</button>
        </div>
        <div id="login-button">
            <button onclick="toggleLoginFormVisibility()">Login</button>
        </div>
    </nav>
</header>

<!-- The login form
Disable the login button or replace with logged in if $_SESSION['user'] is set-->
<div id="login-form" style="visibility: hidden;">
    <form action="php/login.php" method="post">
        <h3>Login</h3>
        <label>Username: </label>
        <label>
            <input type="text" name="usrLog" id='usrLog' class="required">
        </label><br>
        <label>Password: </label>
        <label>
            <input type="password" name="passLog" id='passLog' class="required">
        </label><br>
        <input type="submit" name="submit" value="Login">
    </form>
</div>

<!-- The signup form -->
<div id="signup-form" style="visibility: hidden;">
    <form action="php/register.php" method="POST">
        <h3>Registration</h3>
        <label>Username: </label>
        <input type="text" name="usrReg" id="usrReg" class="required"><br>
        <label>Email: </label>
        <input type="text" name="emailReg" id="emailReg" class="required"><br>
        <label>Profile Picture (Optional)</label><br>
        <!-- <img src="">
       <img src="">
       <img src=""> -->
       <input type="file" name="filename"><br>
       <label>Password: </label>
       <input type="password" name="pwdReg" id="pwdReg" class="required"><br>
       <label>Confirm Password:</label>
       <input type="password" name="pwdRegC" id="pwdRegC" class="required"><br>
       <input type="submit" name="submit" value="Register">
   </form>
</div>
<main>
   <!-- The list of discussions -->
    <div id="discussions">

        <h3>Post Title</h3>
        <p>
            <time>Febuary 16th, 2021</time>
        </p>
        <!-- <img src=""> -->
    </div>

</main>

<!-- All the Javascript scripts -->
<script src="js/main.js"></script>
<script src="js/showSignup.js"></script>
<script src="js/showLogin.js"></script>
<!-- <script src="js/validate.js"></script> -->
</body>
</html>
