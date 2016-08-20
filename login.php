<?php
include_once "common/base.php";
$pageTitle = "Home";
include_once "common/header.php";


if(!empty($_SESSION['LoggedIn']) $$ !empty($_SESSION['UserName'])) {

    echo "<p>You are currently logged in.</p>";
} elseif (!empty($_POST['username']) && !empty($_POST['password'])) {
    include_once 'inc/class.users.inc.php';
    $users = new BSBUsers($db);
    if ($users->accountLogin()===TRUE) {
        echo '<meta http-equiv="refresh" content="0;/">';
        exit;
    } else {
        echo "<p>Login failed | Try again</p>";
?>
        
        <h2>Sign up</h2>
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
        
    }
} elseif (empty($_POST['username']) || empty($_POST['password'])) {

    echo "<p>Your credentials here:</p>";
?>
    
    <h2>Sign up</h2>
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


    
}

include_once "common/footer.php";

?>
