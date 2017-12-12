<?php
    $conn = require 'dbConnect.php';
    include 'GeneralFunctions.php';
    $table = $_POST['Form'];

    $message = "";


    if($table == "members")
    {
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $PS = $_POST['PSid'];
        $Xbox = $_POST['Xboxid'];
        $PC = $_POST['PCid'];
        $Desc = $_POST['SelfDescription'];
        $num = 0;
        $query = "INSERT INTO members (FirstName, LastName, Playstation, Xbox, PC, Description, UniqueID) VALUES ('$FirstName', '$LastName', '$PS', '$Xbox', '$PC', '$Desc','$num')";
        if($result = mysqli_query($conn, $query))
        {
            $message = "Congrats $FirstName, you have joined the site.";
        }
        else
        {
            $message = "NOPE!";
        }
    }
    else if($table == "events")
    {
        if(isset($_POST['Online']))
        {
            $Loc = "Online";
        }
        else
        {
            $Loc = $_POST['Country'] . " " . $_POST['State'] . " " . $_POST['City'] . " " . $_POST['address'];
        }

        $GamesQuery = "SELECT GameID FROM gametypes WHERE NameType = ''";
        $Event = $_POST['EventName'];
        $id = 0;
        $desc = $_POST['EventDescription'];
        $gID = 10; //need to grab from communities table
        $time = $_POST['Date'] . " " . $_POST['Time'];
        $games = $_POST['Ntype'];
        $platforms = GetCheckedPlatforms();
        $query = "INSERT INTO events (EventName, Location, EventID, Description, GroupID, EventTime, Platforms,  GameTypes) VALUES ('$Event', '$Loc', '$id', '$desc', '$gID', '$time', '$platforms', '$games')";
        if($result = mysqli_query($conn, $query))
        {
            $message = "Your event $Event, has been posted to our site.";
        }
        else
        {   
            $message = "NOPE!";
        }
    }
    else if($table == "communities")
    {
        $ManagerQuery = "SELECT UniqueID FROM '$table' WHERE ";
        $name = htmlspecialchars($_POST['CommunityName']);
        $loc = htmlspecialchars($_POST['platform']);
        $mang = htmlspecialchars($_POST['email']);
        $desc = htmlspecialchars($_POST['CommunityDescription']);
        $platforms = GetCheckedPlatforms();
        $pass = htmlspecialchars($_POST['password']);
        $games = $_POST['Type'];
        $query = "INSERT INTO communities (Name, Location, Manager, Password, Description, Platforms, Games) VALUES ('$name', '$loc', '$mang', '$pass' , '$desc', '$platforms', '$games')";
        if($result = mysqli_query($conn, $query))
        {
            $message = "Your community $name, has been added to the site.  Use your community email and password to log in and make changes as needed.";
        }
        else
        {
            $message = "NOPE!";
        }
    }

?>


<!DOCTYPE HTML>

<html lang = "en">
    <header> 
        <link rel = "stylesheet" href = "">
    </header>

    <main> 
        <h2> <?php echo $message ?></h2>
    </main>


</html>