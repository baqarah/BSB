<?php
include_once "inc/class.users.inc.php";
include_once "inc/constants.inc.php";
include_once "common/base.php";


$users = new BSBUsers($db);
echo $users->createAccount();
?>
