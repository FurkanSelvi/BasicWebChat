<?php
session_start();
ob_start();
$db_adres='localhost';
$db_user='root';
$db_pass='123123124';
$db_table='chat';
try{
    $db = new PDO("mysql:host=$db_adres; dbname=$db_table;charset=utf8","$db_user","$db_pass");
} catch (PDOException $e) {
    print "Veritabanina baglanilamadi ".$e->getMessage();
}
?>