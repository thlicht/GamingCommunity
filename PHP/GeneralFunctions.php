<?php
    function GetCheckedPlatforms()
    {
        $output = "";
        if(!isset($_POST['Platform']))
        {
            echo "NO!";
            return;
        }
        $output = "";
        if(in_array('All', $_POST['Platform']))
        {
            $output .= " " . "All";
        }

        if(in_array('PC', $_POST['Platform']))
        {
            $output .= " " . "PC";
        }

        if(in_array('Xbox', $_POST['Platform']))
        {
            $output .= " " . "Xbox";
        }

        if(in_array('Playstation', $_POST['Platform']))
        {
            $output .= " " . "Playstation";
        }
        return $output;
    }

?>