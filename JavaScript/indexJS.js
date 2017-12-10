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

function CheckCommunity()
{
    var Name = $("CommName");
    var NameCheck = /^ [a-zA-Z0-9]{50} $/;
    var Type = $("Type");
    var Platforms = document.getElementsByClassName("Platform");
    var desc = $("Commdesc");

    if(Name.value == "")
    {
        return false;
    }
    else if (!Name.value.match(NameCheck))
    {
        return false;
    }

    var TypeChecked = false;
    for(var i = 0; i < Platforms.length; i++)
    {
        if(Platforms[i].checked == true)
        {
            TypeChecked = true;
        }
    }

    if(TypeChecked)
    {
        return false;
    }
    
    if(desc.value == "")
    {
        return false;
    }

    return true;

}

function CheckEvent()
{
    var Name = $("Event");
    var online = $("Online");

    var InputForm = /^ [a-zA-Z0-9]{30} $/;

    if(!online.checked)
    {
        var county = $("country");
        if(country.value == "")
        {
            return false;
        }
        else if (!country.value.match(InputForm))
        {
            return false;
        }
        var state = $("state");
        if(state.value == "")
        {
            return false;
        }
        else if (!state.value.match(InputForm))
        {

        }
        var city = $("city");
        if(city.value == "")
        {
            return false;
        }
        else if (!city.value.match(InputForm))
        {

        }
        var addr = $("addr");
        if(addr.value == "")
        {
            return false;
        }
        else if (!addr.value.match(InputForm))
        {

        }
        var date = $("date");
        if(!date)
        {
            return false;
        }
        else if (!country.value.match(InputForm))
        {

        }
        var time = $("timestamp");
        if(!time.value)
        {
            return false;
        }

        var descrpt = $("desc");
        if(descrpt.value == "")
        {
            return false;
        }

    }
    else
    {
        if(Name.value == "")
        {
            //warning box should display name = blank and box should change to red
            return false;
        }
        
    }

    return true;
}

function PlatformIDs()
{
    var Xbox = $("XboxCheck");
    var PS = $("PScheck");
    var PC = $("PCcheck");

    if(Xbox.checked)
    {
        $("xboxid").disabled = false;
    }
    else
    {
        $("xboxid").disabled = true;
    }

    if(PS.checked)
    {
        $("psid").disabled = false;
    }
    else
    {
        $("psid").disabled = true;
    }

    if(PC.checked)
    {   
        $("pcid").disabled = false;
    }
    else
    {
        $("pcid").disabled = true;
    }
}

function CheckPersonal()
{
    var Fname = $("FnameBox");
    var Lname = $("LnameBox");

    var Xbox = $("XboxCheck");
    var PS = $("PScheck");
    var PC = $("PCcheck");

    var IDForm = /^ [a-zA-Z0-9]{25} $/;

    if(Xbox.checked)
    {
        if($("xboxid").value == "")
        {
            return false;
        }
        else if (!$("xboxid").value.match(IDForm))
        {
            return false;
        }
    }

    if(PS.checked)
    {
        if($("psid").value == "")
        {
            return false;
        }
        else if (!$("psid").value.match(IDForm))
        {
            return false;
        }
    }

    if(PC.checked)
    {
        if($("pcid").value == "")
        {
            return false;
        }
        else if (!$("pcid").value.match(IDForm))
        {
            return false;
        }
    }

}


function CreateAccordion()
{
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function(){
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");
    
            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") 
            {
                panel.style.display = "none";
            } 
            else 
            {
                panel.style.display = "block";
            }
        }
    }
}

function OnloadFunctions()
{
    CreateAccordion();
    PlatformIDs();
}


window.addEventListener("load", OnloadFunctions, false);
