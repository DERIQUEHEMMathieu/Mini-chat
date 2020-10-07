<?php
// Connect to database
try {
    $bd = new PDO('mysql:host=localhost;dbname=mini_tchat', 'root', '');
} catch(PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>