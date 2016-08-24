<?php
include_once "common/base.php";
$pageTitle = "Register";
include_once "common/header.php";



if (empty($_POST["username"]) || empty($_POST["password"])) {
?>
    <h2>Sign up</h2>
    <form method="post" action="signup.php" id="registerform">
        <div>
            <label for="username"></label>
            <input type="text" name="username" id="username" placeholer="User Name" /><br>//value=" <?php echo trim($_POST["username"]); ?>"/><br>

            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password" /><br>

            <label for="repassword"></label>
            <input type="password" name="repassword" id="repassword" placeholder="Retype your password"/><br>
            
            <input type="submit" name="register" id="register" value="Sign up" />
        </div>
    </form>
    
<?php   
} else {
    if ($_POST["password"]!=$_POST["repassword"]) {
        
?>
    <h2 style="color:red";> WRONG PASSWORD</h2>
    <h2>Sign up</h2>
    <form method="post" action="signup.php" id="registerform">
        <div>
            <label for="username"></label>
            <input type="text" name="username" id="username" placeholder="User Name" /><br> //<?php echo trim($_POST["username"]); ?>"/><br>
            
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password"/><br>
            
            <label for="repassword"></label>
            <input type="password" name="repassword" id="repassword" placeholder="Retype your password" /><br>
            
            <input type="submit" name="register" id="register" value="Sign up" />
        </div>
    </form>

<?php

    } else {
        include_once "inc/class.users.inc.php";
        $users = new BSBUsers($db);
        echo $users->createAccount();
    }
}
//include_once "common/close.php";

?>
