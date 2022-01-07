<?php
class DB
{
    private static $instance = NULl;
    public static function getInstance() {
      if (!isset(self::$instance)) {
        try {
          self::$instance = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
          self::$instance->exec("SET NAMES '{DB_CHARSET}'");
        } catch (PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
    }
}