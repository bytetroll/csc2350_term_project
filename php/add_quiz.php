<?php

session_start();

$Secure = array("ForceOnInvalid" => true, "ForceOnSession" => false);
( @include_once('../php/Secure.php')) or die( "\"../php/Secure.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('server.php')) or die( "\"server.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();

if( isset( $_POST[ "QuizData" ] ) ) {
    $UserID = $_SESSION["User"];
    $Data = json_decode($_POST["QuizData"]);
    $Name = array_shift($Data);
    $Answers = [];
    for ($i = 0; $i < count($Data);  $i++)
    {
        $Answers[] = array_shift($Data[$i][1]);
    }
    $Answers = json_encode($Answers);
    $Data = json_encode($Data);
    $Server->ExecuteQuery( "INSERT INTO quizes( Name, UserID, Data, Answers ) VALUES( '$Name', '$UserID', '$Data', '$Answers' )" );
    header( "Location: ../views/User.php" );
}

$Server->ReleaseConnection();