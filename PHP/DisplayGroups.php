<?php
    include 'GeneralFunctions.php';
    $type = $_POST['EventType'];
    $platforms = GetCheckedPlatforms();
    $location = $_POST['loc'];
    $conn = include 'dbConnect.php';
    $query = "SELECT * FROM communities WHERE Platforms LIKE '%$platforms%'";
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
                    echo "<tr><td>{$row['Name']} </td><td>{$row['Location']} </td><td>{$row['Manager']} </td><td>{$row['Description']} </td><td>{$row['Platforms']}</td></tr>\n" ;
                }
            ?>
        </table>
    </main>















</html>