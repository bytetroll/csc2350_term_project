<?php

$Secure = array("ForceOnInvalid" => true, "ForceOnSession" => false);
( @include_once('../php/Secure.php')) or die( "\"../php/Secure.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('../php/Template.php')) or die( "\"../php/Template.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('../php/Server.php')) or die( "\"../php/Server.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();

LoadLayout("../templates/Quizes.php", array(
    "QuizCount" => mysqli_fetch_array(mysqli_query(
        $Server->Connection, "SELECT count(*) as '_' FROM quizes"
    ))["_"],
));