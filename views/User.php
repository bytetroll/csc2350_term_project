<?php

$Secure = array("ForceOnInvalid" => true, "ForceOnSession" => false);
( @include_once('../php/Secure.php')) or die( "\"../php/Secure.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('../php/Server.php')) or die( "\"../php/Server.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('../php/Template.php')) or die( "\"../php/Template.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();

LoadLayout("../templates/User.php", array(
    "QuizCount" => mysqli_fetch_array(mysqli_query(
        $Server->Connection,
        "SELECT count(*) as '_' FROM quizes WHERE UserID=" . $_SESSION["User"]
    ))["_"],
    "QuizCompletedCount" => mysqli_fetch_array(mysqli_query(
        $Server->Connection,
        "SELECT count(*) as '_' FROM quizes_completed WHERE UserID=" . $_SESSION["User"]
    ))["_"],
    "QuizVisitedCount" => mysqli_fetch_array(mysqli_query(
        $Server->Connection,
        "SELECT count(*) as '_' FROM quizes_completed WHERE OwnerID=" . $_SESSION["User"]
    ))["_"],
));