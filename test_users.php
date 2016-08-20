<?php
include_once "common/base.php";
$pageTitle = "Home";
include_once "common/header.php";

?>

<h2>Login failed, try again:</h2>
<form method="post" action="login.php" id="loginform">
    <div>
        <label for="username">User Name:</label>
        <input type="text" name="username" id="username" /><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" /><br>
        
        <input type="submit" name="login" id="login" value="Login" />
    </div>
</form>

<?php

include_once "common/footer.php";

?>

