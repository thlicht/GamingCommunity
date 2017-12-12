<?php
    session_start();
    include 'GeneralFunctions.php';
    $conn = include 'dbConnect.php';
    $query = "SELECT * FROM members";
    $result = mysqli_query($conn, $query);
?>


<!DOCTYPE HTML>
<html lang = "en">
    <header> 
        <link rel = "stylesheet" href = "http://localhost/CIS435Final/CSS/SearchFormatting.css">
    </header>
    <main>
        <table>
            <tr>
                <th>First Name</th>
                <th>Playstation</th>
                <th>Xbox</th>
                <th>PC</th>
                <th>Description</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr><td>{$row['FirstName']}</td><td>{$row['Playstation']} </td><td>{$row['Xbox']} </td><td>{$row['PC']} </td><td>{$row['Description']} </td></tr>\n" ;
                }
            ?>
        </table>
    </main>















</html>