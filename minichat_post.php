<?php
// Connect to database
try {
    $bd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
} catch(PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// If new message has been submited
if(!empty($_POST) && isset($_POST["new_message"])) {
    $query = $bd->prepare(
        "INSERT INTO minichat(pseudo, message)
        VALUES(:pseudo, :message)"
    );
    $result = $query->execute([
        "pseudo" => $_POST["pseudo"],
        "message" => $_POST["message"]
    ]);
}

// Redirection to minichat.php
header('Location: minichat.php');
?>