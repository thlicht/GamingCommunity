<?php
    include 'GeneralFunctions.php';
    $platforms = GetCheckedPlatforms();
    $platformPieces = explode (" ", $platforms);
    $location = $_POST['loc'];
    $games = $_POST['EventType'];
    $conn = include 'dbConnect.php';
    
    if(sizeof($platformPieces) == 1)
    {
        if($platforms == "All")
        {
            if(!strcmp($location, "Both"))
            {
                if(!strcmp($games, "All"))
                {
                    $query = "SELECT * FROM events WHERE Location != ' ' AND GameTypes != '' AND Platforms != ''";
                }
                else
                {
                    $query = "SELECT * FROM events WHERE Location != ' ' AND GameTypes = '$games' AND Platforms LIKE '%$platformPieces[0]%'";
                } 
            }
            else if (!strcmp($location, "Online"))
            {
                
                if(!strcmp($games, "All"))
                {
                    $query = "SELECT * FROM events WHERE Location = 'Online' AND GameTypes != '' AND Platforms LIKE '%$platformPieces[0]%'";
                }
                else
                {
                    $query = "SELECT * FROM events WHERE Location != ' ' AND GameTypes = '$games' AND Platforms LIKE '%$platformPieces[0]%'";
                } 
            }
            else
            {
                if(!strcmp($games, "All"))
                {
                    $query = "SELECT * FROM events WHERE Location != ' ' AND GameTypes != '' AND Platforms LIKE '%$platformPieces[0]%'";
                }
                else
                {
                    $query = "SELECT * FROM events WHERE Location != ' ' AND GameTypes = '$games' AND Platforms LIKE '%$platformPieces[0]%'";
                } 
            }
            
        }
        else
        {
                $query = "SELECT * FROM events WHERE (Location = 'Online') AND (Platforms LIKE '%$platformPieces[0]%') AND (GameTypes = '$games')";
            
        }
        
    }
    else if (sizeof($platformPieces) == 2)
    {
        
        if($location == "Online")
        {
            $query = "SELECT * FROM events WHERE (Location = 'Online') AND (Platforms LIKE '%$platformPieces[0]%') AND (Platforms LIKE '%$platformPieces[1]%') AND GameTypes = '$games'";
        }
        else if ($location == "In Person" )
        {
            $query = "SELECT * FROM events WHERE (Location != 'Online') AND (Platforms LIKE '%$platformPieces[0]%') AND (Platforms LIKE '%$platformPieces[1]%') AND GameTypes = '$games'";
        }
    }
    else if (sizeof($platformPieces) == 3)
    {  
        if($location == "Online")
        {
            $query = "SELECT * FROM events WHERE (Location = 'Online') AND (Platforms LIKE '%$platformPieces[0]%') OR (Platforms LIKE '%$platformPieces[1]%') OR (Platforms LIKE '%$platformPieces[2]%') AND (GameTypes = '$games')";
        }
        else if ($location == "In Person" )
        {
            $query = "SELECT * FROM events WHERE (Location != 'Online') AND (Platforms LIKE '%$platformPieces[0]%') OR (Platforms LIKE '%$platformPieces[1]%') OR (Platforms LIKE '%$platformPieces[2]%') AND (GameTypes = '$games')";
        }
    }
    $result = mysqli_query($conn, $query);
?>


<!DOCTYPE HTML>
<html lang = "en">
    <header>
        <link rel = "stylesheet" href = "http://localhost/CIS435Final/CSS/SearchFormatting.css">
    </header>
    <main>
    <?php
                if(!$result)
                {
                    echo "No results found";
                    return;
                }
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<table>
                    <tr>
                        <th>Event Name</th>
                        <th>Location</th>
                        <th>Time of Event</th>
                        <th>Gaming Platforms for Event </th>
                    </tr>
                    
                
                    <tr><td>{$row['EventName']} </td><td>{$row['Location']} </td><td>{$row['EventTime']} </td><td>{$row['Platforms']} </td></tr>\n
                        <tr colspan='4'><td colspan='4'><strong>Description</strong></td></tr>\n
                        <tr><td colspan='4'>{$row['Description']} </td></tr>\n </table> <br>";
                        
                }
            ?>
        
    </main>















</html>