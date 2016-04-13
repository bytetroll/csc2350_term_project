<?php

$Secure = array("ForceOnInvalid" => false, "ForceOnSession" => true);
( @include_once('../php/Secure.php')) or die( "\"../php/Template.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('../php/Template.php')) or die( "\"../php/Template.php\" is required to run this demo, but could not be found on the local server" );

LoadLayout("../templates/Register.php", array());