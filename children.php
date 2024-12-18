<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Christmas Theme Background and Cards</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Snowflakes -->
  <div class="snow-container">
    <div class="snowflake" style="--i: 1;">❄</div>
    <div class="snowflake" style="--i: 2;">❄</div>
    <div class="snowflake" style="--i: 3;">❄</div>
    <div class="snowflake" style="--i: 4;">❄</div>
    <div class="snowflake" style="--i: 5;">❄</div>
    <div class="snowflake" style="--i: 6;">❄</div>
  </div>
  <?php
//file links

require "Database.php";


$config = require("config.php");

//end of file link



// object
$db = new Database($config["database"]);
$children = $db->query("SELECT * FROM  children ")->fetchALL();

foreach($children as $child) {
    $i = $child["id"];
    $letter_text = $db->query("SELECT letter_text FROM letters WHERE id = $i")->fetchColumn();
    echo "<div class='card-container'>";
    echo "<div class='card'>";
    echo "<h2>" . htmlspecialchars($child["firstname"]) . " " .htmlspecialchars($child["surname"]). " " .htmlspecialchars($child["age"]) . "</h2>";
    echo "<p>" . htmlspecialchars($letter_text) . "</p>";
    echo "</div><br>";
    echo "</div>";
}

?>

</body>
</html>

