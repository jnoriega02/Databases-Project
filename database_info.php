<?php 

//connection established to our databases (tables) in mariaDB
$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$d = "z1917876";
try { // if something goes wrong, an exception is thrown
$sn = "mysql:host=$serv;dbname=$d";
$p = new PDO($sn, $user, $pass);
$p->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOexception $ex) { // handle that exception
echo "Connection to database failed: " . $ex->getMessage();
}
?>