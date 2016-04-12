<?php

class Singleton {
    public static function Reference() {
        if( null === static::$Instance ) {
            return static::$Instance = new static();
        }

        return static::$Instance;
    }

    protected function __construct() {
    }

    private function __clone() {
    }

    private function __wakeup() {
    }

    // This is protected instead of private to allow inline referencing in derived classes.
    protected static $Instance;
}