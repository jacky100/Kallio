<?php
$host = "localhost";
$user = "root";
$password = "";
$name = "kallion_kierros";

try{

$dbh = new PDO("mysql:host=$host; dbname=$name", $user, $password);

$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$dbh->exec("SET NAMES utf8;");

} 
catch(PDOException $e) {
    die ( $e->getMessage() );

}
