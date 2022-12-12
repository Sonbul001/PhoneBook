<?php 
$name = $_POST['name'];
$number = $_POST['number'];

$file = fopen("contacts.txt", "r");
$lines = array();
echo "$name";
while(!feof($file)) {
    $line = fgets($file);
    $line = explode(",", $line);
    $line[1] = trim($line[1]);
    if($line[1] == $name) {
        $line[0] = $number;
    };
    $lines[] = $line;
}
fclose($file);


$file = fopen("contacts.txt", "w");
foreach($lines as $line) {
    fwrite($file, $line[0] . "," . $line[1] ."\n");
}
fclose($file);

header("Location: index.php")

?>