<?php
// Connect to database
try {
    $bd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
} catch(PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>