<?php

session_start();
session_destroy();
unset( $_SESSION[ "User" ] );
header("Location: ../views/Home.php");