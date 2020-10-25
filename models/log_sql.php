<?php
//Logs d'authentification bdd
$dbhost = 'VOTRE HOST';
$dbname= 'blog';
$dbuser = 'USERNAME';
$dbpass = 'PASSWORD';
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);