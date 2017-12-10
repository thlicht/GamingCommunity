<?php
    $conn = require 'dbConnect.php';
    include 'GeneralFunctions.php';
    $table = $_POST['Form'];

    if($table == "members")
    {
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $PS = $_POST['PSid'];
        $Xbox = $_POST['Xboxid'];
        $PC = $_POST['PCid'];
        $Desc = $_POST['SelfDescription'];
        $num = 0;
        $query = "INSERT INTO members ('FirstName', 'LastName', 'Playstation', 'Xbox', 'PC', 'Description', 'UniqueID') VALUES ('$FirstName', '$LastName', '$PS', '$Xbox', '$PC', '$Desc' '$num')";
        if($result = mysqli_query($conn, $query))
        {
            echo "Congrats";
        }
        else
        {
            echo "NOPE!";
        }
    }
    else if($table == "events")
    {
        $GamesQuery = "SELECT GameID FROM gametypes WHERE NameType = ''";
        $Event = $_POST['EventName'];
        $Loc = $_POST['Country'] . $_POST['State'] . $_POST['City'] . $_POST['address'];
        $id = 0;
        $desc = $_POST['EventDescription'];
        $gID = $_POST['']; //need to grab from communities table
        $query = "INSERT INTO events ('EventName', 'Location', 'EventID','Description', 'GroupID') VALUES ('$Event', '$Loc','$id', '$desc', '$gID')";
        if($result = mysqli_query($conn, $query))
        {
            echo "Congrats";
        }
        else
        {
            echo "NOPE!";
        }
    }
    else if($table == "communities")
    {
        $ManagerQuery = "SELECT UniqueID FROM '$table' WHERE ";
        $name = htmlspecialchars($_POST['CommunityName']);
        $loc = htmlspecialchars($_POST['platform']);
        $mang = 0; //need to grab from communities table
        $desc = htmlspecialchars($_POST['CommunityDescription']);
        $platforms = GetCheckedPlatforms();
        $cID = 0;
        $games = $_POST['Type'];
        $query = "INSERT INTO communities (Name, Location, Manager, Description, CommunityID, Platforms, Games) VALUES ('$name', '$loc', '$mang', '$desc', '$cID', '$platforms', '$games')";
        if($result = mysqli_query($conn, $query))
        {
            echo "Congrats";
        }
        else
        {
            echo "NOPE!";
        }
    }

?>


<!DOCTYPE HTML>

<html lang = "en">



</html>