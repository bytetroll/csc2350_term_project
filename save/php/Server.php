<?php

( @include_once( 'Config.php' ) ) or die( "\"Config.php\" is required to run this demo, but could not be found on the local server" );
( @include_once( 'Alert.php' ) ) or die( "\"Alert.php\" is required to run this demo, but could not be found on the local server" );
( @include_once( 'Singleton.php' ) ) or die( "\"Singleton.php\" is required to run this demo, but could not be found on the local server" );


class Server extends Singleton {
    public function AttemptConnection() {
        $this->Connection = new mysqli( Config::$ServerName, Config::$Username, Config::$Password, Config::$DatabaseName );

        if( $this->Connection->connect_error ) {
            die( "Connection attempt to remote server failed, reason: " . $this->Connection->connect_error );
        }

        $this->Connected = true;
    }

    public function ReleaseConnection() {
        if( $this->Connected ) {
            $this->Connection->close();
        }

        $this->Connected = false;
    }

    public function ExecuteQuery( $Query ) {
        if( $this->Connected ) {
            if( $this->Connection->query( $Query ) === true ) {
                return true;
            } else {
                echo( "Query " . $Query . " unsuccessfully executed; </br> &nbsp;&nbsp;&nbsp;&nbsp; reason: <b> " . $this->Connection->error . "</b>" );
                return false;
            }
        } else {
            die( "Tried to execute my sql query on corrupt server connection." );
        }

        return false;
    }

    public $Connected = false;
    public $Connection;
}