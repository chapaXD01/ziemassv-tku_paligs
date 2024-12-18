
<?php

//file links

require "Database.php";


$config = require("config.php");

//end of file link



// object
$db = new Database($config["database"]);
$gifts = $db->query("SELECT * FROM  gifts ")->fetchALL();


echo "<ul>";
foreach($gifts as $gift){
    echo "<li>" . $gift["name"] ." ". $gift["count_available"] . "</li>";
 }
echo "</ul>";