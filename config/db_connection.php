<?php
// Located in /wildfire_tracking_app/config/db_connection.php
class Database {
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            // Update the path to the SQLite database file
            $filename = __DIR__ . '/wildfiresdb.sqlite';  
            self::$conn = new PDO("sqlite:$filename");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
}
