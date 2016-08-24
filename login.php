<?php
include_once "common/base.php";
$pageTitle = "Login";
include_once "common/header.php";



if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
    echo "<p>You are currently logged in.</p>";
    exit;
}


if (!empty($_POST['username']) && !empty($_POST['password'])) {
    include_once "inc/class.users.inc.php";
    $users = new BSBUsers($db);
    if ($users->accountLogin() == TRUE) {
        echo "<meta http-equiv='refresh' content='0;/'>";
        exit;
    } else {       
?>
        
    <h2>Login failed, try again:</h2>
    <form method="post" action="login.php" name="loginform" id="loginform">
        <div>
            <label for="username">User Name:</label>
            <input type="text" name="username" id="username" /><br>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" /><br>
            
            <input type="submit" name="login" id="login" value="Login" />
        </div>
    </form>


<?php
        
    };        
} elseif (empty($_POST['username']) || empty($_POST['password'])) {

?>
        
    <h2>Login info here:</h2>
    <form method="post" action="login.php" name="loginform" id="loginform">
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

