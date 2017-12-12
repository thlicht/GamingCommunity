<?php
session_start();
ini_set('session.cache_limiter','public');
session_cache_limiter(false);

$conn = require 'dbConnect.php';

$username = "";
$password = "";
$Error = "";
$form = "<p>Login to make edits to your community or events!</p>
<form id = 'login' action = '' method = 'POST'>
    <label for = 'username'>Username</label><br>
    <input type = 'text' name = 'username' value = '$username' id = 'user'><br>
    <label for = 'password'>password</label><br>
    <input type = 'password' name = 'password' value = '' id = 'pass'>
    <br>
    <input type = 'submit' value = 'Login' name = 'login'>
</form>
<p>$Error</p>";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM communities WHERE Manager = '$username' AND Password = '$password'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $username;
        $_SESSIOn['query'] = $query;
        $form = "<p>Welcome $username</p>";
        header('Location: DisplayYourGroup.php');
    }
    else
    {
        $Error =  "Bad login";
        $form = "<p>Login to make edits to your community or events!</p>
        <form id = 'login' action = '' method = 'POST'>
            <label for 'username'>Username</label><br>
            <input type = 'text' name = 'username' value = '$username' id = 'user'><br>
            <label for = 'password'>password</label><br>
            <input type = 'password' name = 'password' value = '' id = 'pass'>
            <br>
            <input type = 'submit' value = 'Login' name = 'login'>
        </form>
        <p>$Error</p>";
    }

}




?>


<!DOCTYPE HTML>

<html lang = "en">
    <header>
        <meta charset="UTF-8">
        <title>Gaming Community</title>
        <link rel = "stylesheet" href = "http://localhost/CIS435Final/CSS/IndexCSS.css">
        <script src ="http://localhost/CIS435Final/JavaScript/indexJS.js"></script>
    </header>

    <head>
        <h1>Welcome to a gaming community tool</h1>
    </head>

    <main>
    <h3 id = "descrt">This website provides people with a way to find people who play the same kinds of games they do. <br>
                There are also tools to create an event or look through created events that people are hosting.
            </h3>
        <section id = "login_section">
                    <?php echo $form?>
        </section>
        <br>
        <br>
        <br>
        <section id = "Community_Board">
        <p>Click the button below to use our tool to find community created events!</p>
        <button class = "accordion">Event Finder</button>
        <div class = "panel">
                <p>Use the selectors below to filter your search of community created events!</p>
                <form id = "Event_Find" action = "http://localhost/CIS435Final/PHP/DisplayEvents.php" method = "POST">
                    <h3>Type</h3>
                    <select name = "EventType">
                        <option value = "All" selected = "true">Any
                        <option value = "Shooter">Shooter
                        <option value = "RPG">RPG
                        <option value = "Action/Adventure">Action/Adventure
                        <option value = "MMO">MMO/MMORPG
                    </select>
                    <br>
                    <h3>Platform(s)</h3>
                    <input type = "checkbox" name = "Platform[]" value = "All" class = "Plats1">Any<br>
                    <input type = "checkbox" name = "Platform[]" value = "PC" class = "Plats1">PC<br>
                    <input type = "checkbox" name = "Platform[]" value = "Xbox" class = "Plats1">Xbox<br>
                    <input type = "checkbox" name = "Platform[]" value = "Playstation" class = "Plats1">Playstation<br>
                    <br>
                    <h3>Event Location</h3>
                    <select name = "loc">
                        <option value = "Both" name = "loc[]">Both</option>
                        <option value = "In Person" name = "loc[]">In Person</option>
                        <option value = "Online" name = "loc[]">Online</option>
                    </select>
                    <br>
                    <input type = "submit" id = "typeSubmit" name = "typeSubmiter" value = "Submit">
                </form>
            </div>
        
        <p>If you want to create your own community event, enter the details below!</p>
        <button class = "accordion">Event Creation</button>
        <div class ="panel">
                <form id = "Event_Create" action = "http://localhost/CIS435Final/PHP/CreationDashboard.php" method = "POST">
                    <h2>Event Details:</h2>
                    <label for = "EventName"><strong>Name of Event</strong></label><br>
                    <input type = "text" name = "EventName" id = "Event"><br>
                    <br>
                    <label for = "Online">Online Only?</label><br>
                    <input type ="checkbox" name = "Online" id ="online" onclick = "DisableLocation()"><br>
                    <br>
                    <label><strong>Event Location</strong></label><br>
                    <label for = "Country">Country</label><br>
                    <input type = "text" name = "Country" id = "country"><br>
                    <label for = "State">State/Province</label><br>
                    <input type = "text" name = "State" id = "state"><br>
                    <label for = "City">City</label><br>
                    <input type = "text" name = "City" id = "city"><br>
                    <label for = "address">Address</label><br>
                    <input type = "text" name = "address" id = "addr"><br>
                    <p>Platforms the group will play on.</p>
                    <input type = "checkbox" name = "Platform2[]" value = "All" class = "Plats2">All<br>
                    <input type = "checkbox" name = "Platform2[]" value = "PC" class = "Plats2">PC <br>
                    <input type = "checkbox" name = "Platform2[]" value = "Xbox" class = "Plats2">Xbox<br>
                    <input type = "checkbox" name = "Platform2[]" value = "Playstation" class = "Plats2">Playstation<br>
                    <label for = "Ntype">Type of Games Played</label><br>
                    <select name = "Ntype">
                        <option name = "Type[]" value = "All">General/All
                        <option name = "Type[]" value = "Shooter">Shooter
                        <option name = "Type[]" value = "RPG">RPG
                        <option name = "Type[]" value = "Action/Adventure">Action/Adventure
                        <option name = "Type[]" value = "MMO">MMO/MMORPG
                    </select>
                    <br>
                    <label for = "Date">Date and time of Event</label><br>
                    <input type = "date" name = "Date" id = "Date"><input type = "time" name = "Time" id = "timestamp"><br>
                    <label for ="EventDescription">Description of your event(1000 character limit):</label><br>
                    <textarea rows = "10" cols = "100" name = "EventDescription" placeholder="Ex. What to bring, length of event,etc...." id = "desc"></textarea>
                    <input type ="hidden" name = "Form" value = "events">
                    <br><input type = "submit" id = "Create_submit" name = "Create_sub" value = "Submit" onclick = "return CheckEvent()">
    
                </form>
                
            </div>


        </section>
        <section id = "People_Finder">
        <p>Click below to enter your information, and be added to the list of people who use this site.  Once you complete the form, you will be shown people who <br>
        play the same kinds of games on the same kinds of platforms as you.</p>
        <button class = "accordion">Personal Information</button>
        <div class = "panel">
            <br>
            <form id = "Input" action = "http://localhost/CIS435Final/PHP/DisplayMembers.php" method = "POST">
                <label for = "FirstName">First Name</label><br>
                <input type = "text" name = "FirstName" id = "FnameBox"><br>
                <label for = "LastName">Last Name</label><br>
                <input type = "text" name = "LastName" id = "LnameBox"><br>
                <label for = "PC">PC</label>
                <input type = "checkbox" name = "PC" id = "PCcheck"><input type = "text" name = "PCid" id = "pcid" value = ""><br>
                <label for = "Xbox">Xbox</label>
                <input type = "checkbox" name = "Xbox" id = "XboxCheck"><input type = "text" name = "Xboxid" id = "xboxid" value = ""><br>
                <label for ="Playstation">Playstation</label>
                <input type = "checkbox" name = "Playstation" id = "PScheck"><input type = "text" name = "PSid" id = "psid" value = ""><br>
                <label for = "">Your Bio:(250 character limit)</label><br>
                <textarea rows = "5" cols = "50" name = "SelfDescription" placeholder="Ex. PSN name/Steam ID/Xbox Live name"></textarea>
                <input type ="hidden" name = "Form" value = "members">
                <br>
                <input type = "submit" id = "PersonlSub" value = "Submit" name = "MyInfo" onclick = "CheckPersonal()">
            </form>
        </div>

        </section>
        <section>
            <p>Click below to use our tool to find gaming groups made by users of the site.</p>
            <button class = "accordion">Community Finder</button>
            <div class = "panel">
                    <p>Use the selectors below to filter your search of communitys!</p>
                    <form id = "Community_Find" action = "http://localhost/CIS435Final/PHP/DisplayGroups.php" method = "POST">
                        <h3>Type</h3>
                        <select name = "CommTypeFinder">
                        <option value = "All">Any/All
                        <option value = "Shooter">Shooter
                        <option value = "RPG">RPG
                        <option value = "Action/Adventure">Action/Adventure
                        <option value = "MMO">MMO/MMORPG
                        </select>
                        <br>
                        <h3>Platform(s)</h3>
                        <input type = "checkbox" name = "Platform3[]" value = "All" class = "Plats3">All<br>
                        <input type = "checkbox" name = "Platform3[]" value = "PC" class = "Plats3">PC<br>
                        <input type = "checkbox" name = "Platform3[]" value = "Xbox" class = "Plats3">Xbox<br>
                        <input type = "checkbox" name = "Platform3[]" value = "Playstation" class = "Plats3">Playstation<br>
                        <br>
                        <input type = "submit" id = "typeSubmit" name = "typeSubmiter" value = "Submit">
                    </form>
                </div>
                
        </section>

        <section>
            <p>Click below to create your own community for the games you play.</p>
            <button class = "accordion">Community Creation</button>
            <div class = "panel">
                    <p>Use the selectors below create a community!</p>
                    <form id = "Community_Find" action = "http://localhost/CIS435Final/PHP/CreationDashboard.php" method = "POST">
                        <h3>Community Name</h3>
                        <input type = "text" id = "CommName" name = "CommunityName"><br>
                        <h3>Type of Games Played</h3>
                        <select name = "Type">
                            <option value = "All">All/Any
                            <option value = "Shooter">Shooter
                            <option value = "RPG">RPG
                            <option value = "Action/Adventure">Action/Adventure
                            <option value = "MMO">MMO/MMORPG
                        </select>
                        <br>
                        <h3>Platform(s)</h3>
                        <input type = "checkbox" name = "Platform4[]" value = "All" class = "Plats4" id = "CommAll">All<br>
                        <input type = "checkbox" name = "Platform4[]" value = "PC" class = "Plats4">PC <br>
                        <input type = "checkbox" name = "Platform4[]" value = "Xbox" class = "Plats4">Xbox<br>
                        <input type = "checkbox" name = "Platform4[]" value = "Playstation" class = "Plats4">Playstation<br>
                        <br>
                        <h3>Community Manager Email</h3>
                        <input type = "text" name = "email" value = ""><br>
                        <h3>Management Password</h3>
                        <input type = "password" name = "password" value = ""><br>
                        <h3>Where will the community meet?</h3>
                        <input type = "text" name = "platform" id = "cplatform" placeholder="Skype/Discord/etc.."><br>
                        <input type ="hidden" name = "Form" value = "communities">
                        <br>
                        <input type = "submit" id = "typeSubmit" name = "typeSubmiter" value = "Submit" onclick = "return CheckCommunity()">
                        <label for ="CommunityDescription">Description of your event(1000 character limit):</label><br>
                        <textarea rows = "20" cols = "50" name = "CommunityDescription" placeholder="Ex. What is your community about, its values etc...." id = "Commdesc" maxlength = "1000"></textarea>
                    </form>
            </div>
                
        </section>

    </main>
</html>