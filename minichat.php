<?php $site_title = "Mon mini-chat";
include "template/header.php";
?>

<?php
// Connect to database
try {
  $bd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
} catch(PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}

// Retrieve the last 10 messages
$query = $bd->query (
  "SELECT pseudo, message FROM minichat
  ORDER BY ID DESC LIMIT 0, 10"
);

$messages = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
<main>
<form class="mb-4 mx-auto mt-4" style="font-weight: bolder; width: 400px;" action="minichat_post.php" method="POST">
  <div class="form-group">
    <label for="pseudo">Ton pseudo :</label>
    <input type="text" class="form-control" name="pseudo" placeholder="Ton pseudo">
  </div>
  <div class="form-group">
    <label for="message">Tape ton message :</label>
    <textarea type="text" class="form-control" name="message" id="message" placeholder="Ton message" aria-describedby="messageHelp"></textarea>
    <small class="form-text text-muted">Caractères restants : <span id="count"></span></small>
    <h5 id="messageHelp" class="form-text"></h5>
  </div>
  <button type="submit" name="new_message" id="new_message" class="btn btn-primary">Envoyer</button>
</form>

<!-- Message display -->
<section>
  <div class="container text-center">
  <?php
  foreach ($messages as $key => $message) {
    echo "<p><strong>" . htmlspecialchars($message["pseudo"]) . "</strong> :". " " . htmlspecialchars($message["message"]) . "</p>";
  }
  ?>
  </div>
</section>

<?php
$JS = "<script src='public/js/main.js'></script>";
include "template/footer.php";
?>

