<?php
$number = $_POST['number'];
$name = $_POST['name'];
$name = trim($name);

echo"<h1>Adding Contact $name</h1>";

//add data to txt file
$fp = fopen('contacts.txt', 'a');
fwrite($fp, $number . "," . $name . "\n");



fclose($fp);

//redirect to index.php
header('Location: index.php');


?>
