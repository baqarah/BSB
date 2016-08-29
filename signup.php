<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
$pageTitle = "Register";
include_once $pth . "/common/header.php";



if (empty($_POST["username"]) || empty($_POST["password"])) {
?>
    
    <form method="post" action="signup.php" id="registerform">
        <div class="formularz">
            <h2 class="tytul">Sign up</h2>
            <label for="username"></label>
            <input type="text" name="username" id="username" placeholder="User Name" autofocus/><br>

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

    <form method="post" action="signup.php" id="registerform">
        <div class="formularz">
            <h2 style="color:red";> WRONG PASSWORD</h2>
            <h2 class="tytul">Sign up</h2>

            <label for="username"></label>
            <input type="text" name="username" id="username" placeholder="User Name" autofocus/><br>
            
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password"/><br>
            
            <label for="repassword"></label>
            <input type="password" name="repassword" id="repassword" placeholder="Retype your password" /><br>
            
            <input type="submit" name="register" id="register" value="Sign up" />
        </div>
    </form>

<?php

    } else {
        include_once $pth . "/inc/class.users.inc.php";
        $users = new BSBUsers($db);
        echo $users->createAccount();
    }
}
//include_once "common/close.php";

?>
