<?php

class Connection {

    /*
     * Use on localhost
     * 
    private static $conn;
    private static $hostname = "localhost";
    private static $dataBaseName = "samaritan";
    private static $userName = "root";
    private static $pwd = "";
    private static $dataBaseType = "mysql";
     * 
     */
    
    private static $conn;
    private static $hostname = "localhost";
    private static $dataBaseName = "ambitions";
    private static $userName = "root";
    private static $pwd = "";
    private static $dataBaseType = "mysql";

    public static function connect() {
        //Connects to the server
        try {
            self::$conn = new
                    PDO(self::$dataBaseType . ":host=" .
                    self::$hostname . ";dbname=" .
                    self::$dataBaseName, self::$userName, self::$pwd);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public static function getConn() {
        return self::$conn;
    }

    public static function disconnect() {
        self::$conn = null;
    }
}