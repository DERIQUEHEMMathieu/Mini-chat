<?php
require "connection.php";

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