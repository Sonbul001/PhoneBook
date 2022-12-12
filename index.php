<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Phonebook</title>
</head>
<body>
    <nav>
        <h1><a href="index.php" class="current_page">Contact List</a></h1>
        <ul>
            <li><a href="add_contact.html">Add Contact</a></li>
            <li><a href="delete_contact.php">Delete Contact</a></li>
            <li><a href="update_contact.html">Update Contact</a></li>
            <li><a href="search_contact.php">Search Contact</a></li>
        </ul>
    </nav>
    <table>
        <tr>
            <th>Name</th>
            <th>Number</th>
        </tr>
        <tr>
            <!-- get php fuction from viewContact.php -->
            <?php
            $file = fopen("contacts.txt", "r");

            while(!feof($file)) {
                $line = fgets($file);
                if($line == null || $line == "\n" || $line == ",\n") {
                    continue;
                } else {
                    $line = explode(",", $line); 
                    echo "<tr>";
                    echo "<td>$line[1]</td>";
                    echo "<td>$line[0]</td>";
                    echo "</tr>";
                }
            }
            fclose($file);
            ?>
        </tr>
    </table>
</body>
</html>