<?php
include_once "common/base.php";
$pageTitle = "Home";
include_once "common/header.php";


echo !empty($_SESSION['LoggedIn']);
echo !empty($_SESSION['Username']);

if 

//if (!empty($_SESSION['LoggedIn']) $$ !empty($_SESSION['Username'])) {
//    echo "<p>You are currently logged in.</p>";
//    exit;
//}


    /*
} elseif (!empty($_POST['username']) && !empty($_POST['password'])) {
    include_once "inc/class.users.inc.php";
    $users = new BSBUsers($db);
    if ($users->accountLogin() == TRUE) {
        echo "test";
        //echo "<meta http-equiv='refresh' content='0;/'>";
        exit;
    } else {       

        echo "tutaj bedzie formularz z bledem";

    };        
} elseif (empty($_POST['username']) || empty($_POST['password'])) {

        echo "tutaj bedzie formularz normalny";
    
}

-->*/
                               
include_once "common/footer.php";

?>

