<?php
    function GetCheckedPlatforms()
    {
        $output = "";
        if(isset($_POST['Platform']))
        {
            if(in_array('All', $_POST['Platform']))
            {
                if($output == "")
                {
                    $output = "All";
                }
                else
                {
                    $output .= " " . "All";
                }
                
            }
    
            if(in_array('PC', $_POST['Platform']))
            {
                if($output == "")
                {
                    $output = "PC";
                }
                else
                {
                    $output .= " " . "PC";
                }
            }
            if(in_array('Xbox', $_POST['Platform']))
            {
                if($output == "")
                {
                    $output = "Xbox";
                }
                else
                {
                    $output .= " " . "Xbox";
                }
            }
    
            if(in_array('Playstation', $_POST['Platform']))
            {
                if($output == "")
                {
                    $output = "Playstation";
                }
                else
                {
                    $output .= " " . "Playstation";
                }
            }
            return $output;
        }
        

        if(isset($_POST['Platform2']))
        {
            if(in_array('All', $_POST['Platform2']))
            {
                if($output == "")
                {
                    $output = "All";
                }
                else
                {
                    $output .= " " . "All";
                }
                
            }
    
            if(in_array('PC', $_POST['Platform2']))
            {
                if($output == "")
                {
                    $output = "PC";
                }
                else
                {
                    $output .= " " . "PC";
                }
            }
            if(in_array('Xbox', $_POST['Platform2']))
            {
                if($output == "")
                {
                    $output = "Xbox";
                }
                else
                {
                    $output .= " " . "Xbox";
                }
            }
    
            if(in_array('Playstation', $_POST['Platform2']))
            {
                if($output == "")
                {
                    $output = "Playstation";
                }
                else
                {
                    $output .= " " . "Playstation";
                }
            }
            return $output;
        }
        

        if(isset($_POST['Platform3']))
        {
            if(in_array('All', $_POST['Platform3']))
            {
                if($output == "")
                {
                    $output = "All";
                }
                else
                {
                    $output .= " " . "All";
                }
                
            }
    
            if(in_array('PC', $_POST['Platform3']))
            {
                if($output == "")
                {
                    $output = "PC";
                }
                else
                {
                    $output .= " " . "PC";
                }
            }
            if(in_array('Xbox', $_POST['Platform3']))
            {
                if($output == "")
                {
                    $output = "Xbox";
                }
                else
                {
                    $output .= " " . "Xbox";
                }
            }
    
            if(in_array('Playstation', $_POST['Platform3']))
            {
                if($output == "")
                {
                    $output = "Playstation";
                }
                else
                {
                    $output .= " " . "Playstation";
                }
            }
            return $output;
        }
        
        if(isset($_POST['Platform4']))
        {
            if(in_array('All', $_POST['Platform4']))
            {
                if($output == "")
                {
                    $output = "All";
                }
                else
                {
                    $output .= " " . "All";
                }
                
            }
    
            if(in_array('PC', $_POST['Platform4']))
            {
                if($output == "")
                {
                    $output = "PC";
                }
                else
                {
                    $output .= " " . "PC";
                }
            }
            if(in_array('Xbox', $_POST['Platform4']))
            {
                if($output == "")
                {
                    $output = "Xbox";
                }
                else
                {
                    $output .= " " . "Xbox";
                }
            }
    
            if(in_array('Playstation', $_POST['Platform4']))
            {
                if($output == "")
                {
                    $output = "Playstation";
                }
                else
                {
                    $output .= " " . "Playstation";
                }
            }
            return $output;
        }
        
    }

?>