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
            <li><a href="delete_contact.php" >Delete Contact</a></li>
            <li><a href="update_contact.html" class="current_page">Update Contact</a></li>
            <li><a href="search_contact.php">Search Contact</a></li>
        </ul>
    </nav>
    <div class="form">
    <form action="update_contact.php" method="post">
            <label for="name">Name: </label><br>

            <!-- select the name of the contact to delete -->
            <select name="name" id="name">
                <?php
                    $file = fopen("contacts.txt", "r");
                    while(!feof($file)) {
                        $line = fgets($file);
                        $line = explode(",", $line);
                        if($line[0] != null && $line[0] != "\n" && $line[0] != ",\n")
                        echo "<option value='$line[1]'>$line[1]</option>";
                    }
                    fclose($file);
                ?>
            </select><br>
            <div class="form">
            <label for="name">Name: </label><br>
            <input type="text" name="newname" id="newname"><br>
            <label for="number">New number: </label><br>
            <input type="text" name="newnumber" id="newnumber"><br>
            <!-- a text saying "contact updated successfully" should pop up if the operation was successful -->

            <button type="submit" value="Update Contact" onclick="lolo();" >Update Contact</button>
            <?php
                $name = $_POST['name'];
                $file = fopen("contacts.txt", "r");
                $temp = fopen("temp.txt", "a");
                while(!feof($file)) {
                    $line = fgets($file);
                    $line = explode(",", $line);
                    $line[1] = trim($line[1]);
                    $name= trim($name);
                    
                if ($name != $line[1] && $line[0] != null && $line[0] != "\n" && $line[0] != ",\n") {
                    fwrite($temp, $line[0] . "," . $line[1] . "\n");
                }
                else{
                    fwrite($temp, $newname . "," . $newnumber . "\n");
                    
                }
                }
                fclose($file);
                fclose($temp);
                unlink("contacts.txt");
                rename("temp.txt", "contacts.txt");

            ?>
        </form>
    </div>
    <script >
        function delete_btn() {
            alert("Contact Deleted");
            window.reload();
        }
    </script>
</body>
</html>