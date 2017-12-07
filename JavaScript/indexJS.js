var $ = function(id) //shorthand function to get elementID
{
    return document.getElementById(id);
}

function DisableLocation()
{
    if($("online").checked)
    {
        $("country").disabled= true;
        $("state").disabled = true;
        $("city").disabled = true;
        $("addr").disabled = true;
    }
    else{
        $("country").disabled= false;
        $("state").disabled = false;
        $("city").disabled = false;
        $("addr").disabled = false;
    }
    
}
