<?php

session_start();

if (!isset( $_SESSION[ "User" ] ))  {
    if($Secure["ForceOnInvalid"] == true) {
        header( "Location: ../views/Login.php?e=badaccess" );
    }
}
else  {
    if($Secure["ForceOnSession"] == true) {
        header( "Location: ../views/User.php" );
    }
}

$Secure = array("ForceOnInvalid" => true, "" => false);
