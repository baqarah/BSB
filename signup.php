<?php
include_once "common/base.php";
$pageTitle = "Register";
include_once "common/header.php";

if (!empty($_POST['username'])) {
    include_once "inc/class.users.inc.php";
    $users = new BSBUsers($db);
    echo $users->createAccount();
    echo $_POST['username'];
} else {
?>
    <h2>Sign up</h2>
    <form method="post" action="signup.php" id="registerform">
        <div>
            <label for="username">User Name:</label>
            <input type="text" name="username" id="username" /><br>

            <label for="password">Password:</label>
            <input type="text" name="password" id="password" /><br>

            <input type="submit" name="register" id="register" value="Sign up" />
        </div>
    </form>
        
<?php

}
//include_once "common/close.php";

?>
