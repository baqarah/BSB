<?php

$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
$pageTitle = "Login";
include_once $pth . "/common/header.php";



if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
    echo "<p>You are currently logged in.</p>";
    exit;
}


if (!empty($_POST['username']) && !empty($_POST['password'])) {

    include_once $pth . "/inc/class.users.inc.php";

    $users = new BSBUsers($db);
    if ($users->accountLogin() == TRUE) {
        echo "<meta http-equiv='refresh' content='0;/'>";
        exit;
    } else {       
?>
        
    
    <form method="post" action="login.php" name="loginform" id="loginform">
        <div class="formularz">
            <h2 class="tytul">Login info here:</h2>

            <label for="username"></label>
            <input type="text" name="username" id="username" placeholder="User Name" autofocus/><br>
            
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password"/><br>
            
            <input type="submit" name="login" id="login" value="Login" />
        </div>
    </form>


<?php
        
    };        
} elseif (empty($_POST['username']) || empty($_POST['password'])) {

?>
        
    
    <form method="post" action="login.php" name="loginform" id="loginform">
        <div class="formularz">
            <h2 class="tytul">Login info here:</h2>
            
            <label for="username"></label>
            <input type="text" name="username" id="username" placeholder="User Name" autofocus /><br>
            
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password" /><br>
            
            <input type="submit" name="login" id="login" value="Login" />
        </div>
    </form>

<?php
}

                           
include_once $pth . "/common/footer.php";

?>
