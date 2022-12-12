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
        <h1><a href="index.php">Contact List</a></h1>
        <ul>
            <li><a href="add_contact.html">Add Contact</a></li>
            <li><a href="delete_contact.php">Delete Contact</a></li>
            <li><a href="update_contact.html">Update Contact</a></li>
            <li><a href="search_contact.php" class="current_page">Search Contact</a></li>
        </ul>
    </nav>
    <div class="form">
        <form action="" method="post">
            <label for="name" >Name: </label><br>
            <input type="text" id="name" name="name"><br>
            <button type="submit">Search Contact</button>
            <table>
                <tr>
                    
                    <th>Name</th>
                    <th>Phone Number</th>
                </tr>
            

            <!-- select the name of the contact to delete -->
            <?php
                $name = $_POST['name'];
            
                $file = fopen("contacts.txt", "r");
                while(!feof($file)) {
                    $line = fgets($file);
                    $line = explode(",", $line);
            
                $test1 = trim($line[1]);
                    if($test1 == $name && $name != null && $name != "" && $name != "\n") {
                        echo "<tr>";
                        echo "<td>$line[1]</td>";
                        echo "<td>$line[0]</td>";
                        echo "</tr>";
                    }
                }
                fclose($file);
                echo "</table>";
            ?>
            

            
        </form>
    </div>
</body>
</html>