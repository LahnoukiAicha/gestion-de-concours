<?php
$user='root';
$password='';
$base='upload';
$dsn='mysql:host=127.0.0.1:3306;dbname=upload';
try{
    $dbh= new PDO($dsn, $user, $password);
    #echo "connexion réussite" . "<br>";
} 
catch(PDOException $e){
    print "Erreur ! :" . $e->getMessage() . "<br/>";
    die("error");
}
?>