<?php
namespace App\Database;

use MongoDB;

class Manager {
    protected static $instance;
    protected static $dbClient;
    protected static $DB_URI;
    protected static $DB_DATABASE;

    public function __construct() {
        $env = parse_ini_file(__DIR__ . '/../../.env');
        self::$DB_URI = $env['DB_URI'];
        self::$DB_DATABASE = $env['DB_DATABASE'];
        self::$dbClient = new MongoDB\Client(self::$DB_URI);
    }

    private function __clone() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Self();
        }
        return self::$instance;
    }

    public static function getDatabase() {
        static $database = null;
        if ($database === null) {
            $database = self::$dbClient->selectDatabase(self::$DB_DATABASE);
        }
        return $database;
    }
}

?>