<?php

session_start();

if( isset( $_SESSION[ "User" ] ) != "" ) {
    header( "Location: ../UserHome.html" );
}

( @include_once('server.php')) or die( "\"server.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();

if( isset( $_POST[ "QuizData" ] ) ) {
    $UserID = $_SESSION["User"];
    $Data = json_decode($_POST["QuizData"]);
    $Name = array_shift($Data);
    $Data = json_encode($Data);
    $Server->ExecuteQuery( "INSERT INTO quizes( Name, UserID, Data ) VALUES( '$Name', '$UserID', '$Data' )" );
    header( "Location: ../views/User.php" );
}

$Server->ReleaseConnection();