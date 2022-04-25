<?php 
Class Database
{
    public function __construct()
    {
        
    }
    public static function connect()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "zwbook";
        return $conn = new mysqli($host,$user,$pass,$db);
    }
}
?>