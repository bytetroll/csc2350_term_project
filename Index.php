<?php

if (isset($_SESSION[ "User" ]))
{
    header('Location: views/Home.php');
    die();
}
else
{
    header('Location: views/Login.php');
    die();
}