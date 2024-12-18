<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Christmas helper</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  

  <?php
  require "Database.php";
  $config = require("config.php");

  $db = new Database($config["database"]);
  $children = $db->query("SELECT * FROM children")->fetchAll();

  foreach ($children as $child) {
      $i = $child["id"];
      $letter_text = $db->query("SELECT letter_text FROM letters WHERE id = $i")->fetchColumn();
      echo "<div class='card-container'>";
      echo "<div class='card'>";
      echo "<h2>" . htmlspecialchars($child["firstname"]) . " " . htmlspecialchars($child["surname"]) . " (" . htmlspecialchars($child["age"]) . ")</h2>";
      echo "<p>" . htmlspecialchars($letter_text) . "</p>";
      echo "</div><br>";
      echo "</div>";
  } 
  ?>
</body>
</html>
