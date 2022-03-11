<?php

// singleton approach allows only one instance of object,
// that way there are no multiple database connections open

// using:
// $dbh = DatabaseConnection::getInstance();
// $dbc = $dbh->getConnection();
// then I can pass the connection, when initiating an object instance for classes that need it (passing through constructor)

final class DatabaseConnection
{

    private static $instance = null;
    private static $connection;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public static function connect($hostname, $username, $password, $database)
    {
        self::$connection = mysqli_connect($hostname, $username, $password, $database);
        if (!self::$connection) {
            echo 'connection error: ' . mysqli_connect_error();
        }
    }

    public static function getConnection()
    {
        return self::$connection;
    }
}
