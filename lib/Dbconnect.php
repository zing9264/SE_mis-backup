<?php
include_once ("config.php");
class Dbconnect{
    function connect(){
        try{
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
            return new PDO($dsn,DB_USER,DB_PASSWD);
        }catch (PDOException $e){
            echo "資料庫連線失敗，請洽網站管理人。". $e->getMessage();
            exit;
        }
    }

    function connect_log(){
        try{
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME_LOG.";charset=utf8";
            return new PDO($dsn,DB_USER_LOG,DB_PASSWD_LOG);
        }catch (PDOException $e){
            echo "LOG資料庫連線失敗，請洽網站管理人。". $e->getMessage();
            exit;
        }
    }
}