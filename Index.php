<?php

session_start();

if (isset($_SESSION[ "User" ]))
{
    header('Location: views/User.php');
    die();
}
else
{
    header('Location: views/Login.php');
    die();
}