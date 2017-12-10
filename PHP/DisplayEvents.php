<?php
    include 'GeneralFunctions.php';
    $type = $_POST['EventType'];
    $platforms = GetCheckedPlatforms();
    $location = $_POST['loc'];
    $conn = include 'dbConnect.php';
    $query = "SELECT * FROM events";
    $result = mysqli_query($conn, $query);




?>


<!DOCTYPE HTML>
<html lang = "en">
    <main>
        <table>
            <tr>
                <th>Event Name</th>
                <th>Location</th>
                <th>Description</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr><td>{$row['EventName']} </td><td>{$row['Location']} </td><td>{$row['Description']} </td></tr>\n" ;
                }
            ?>
        </table>
    </main>















</html>