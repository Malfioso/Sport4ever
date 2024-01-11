<?php
define('USER', "admin");
define('PASSWD', "zouzoulakindal");
define('SERVER', "45.145.164.72");
define('BASE', "babyfoot");


function dbconnect(){
    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
        $connexion=new PDO($dsn,USER,PASSWD);
        $connexion->exec("set names utf8");
    }
    catch(PDOException $e){
        printf("Échec de la connexion: %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}
?>