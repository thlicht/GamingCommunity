<?php
session_start();
    include 'GeneralFunctions.php';
    $platforms = GetCheckedPlatforms();
    $platformPieces = explode(" ", $platforms);
    $conn = include 'dbConnect.php';
    $query = "SELECT * FROM communities WHERE Platforms LIKE '%$platforms%'";
    $result = mysqli_query($conn, $query);
    $games = $_POST['CommTypeFinder'];
    if(sizeof($platformPieces) == 1)
    {
        if($platforms == "All")
        {
            if($games == "All")
            {
                $query = "SELECT * FROM communities WHERE Games != '' OR Games = 'All'";
            }
            else
            {
                $query = "SELECT * FROM communities WHERE Games = '$games' OR Games = '$games'";
            }
            
        }
        else
        {
            $query = "SELECT * FROM communities WHERE (Platforms LIKE '%$platformPieces[0]%') AND (Games = '$games' OR Games = 'All')";
        }
    }
    else if (sizeof($platformPieces) == 2)
    {
        $query = "SELECT * FROM communities WHERE (Platforms LIKE '%$platformPieces[0]%' OR Platforms LIKE '%$platformPieces[1]%') AND (Games = '$games' OR Games = 'All')";
    }
    else if (sizeof($platformPieces) == 3)
    {  
        $query = "SELECT * FROM communities WHERE (Platforms LIKE '%$platformPieces[0]%' OR Platforms LIKE '%$platformPieces[1]%' OR Platforms LIKE '%$platformPieces[2]%') AND (Games = '$games' OR Games = 'All')";
    }
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
                <th>Event Name</th>
                <th>Location</th>
                <th>Description</th>
                <th>Platforms</th>
                <th>Games</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr><td>{$row['Name']} </td><td>{$row['Location']} </td><td width='100'>{$row['Description']} </td><td>{$row['Platforms']}</td><td>{$row['Games']}</td></tr>\n" ;
                }
            ?>
        </table>
    </main>















</html>