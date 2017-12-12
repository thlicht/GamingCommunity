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
    var NameCheck = /^[a-zA-Z0-9 ]{1,50}$/;
    var Type = $("Type");
    var Platforms = document.getElementsByClassName("Plats4");
    var desc = $("Commdesc");

    if(Name.value == "")
    {
        alert("No name");
        return false;
    }
    else if (!Name.value.match(NameCheck))
    {
        alert("bad name")
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
    if(!TypeChecked)
    {
        alert ("no type");
        return false;
    }
    
    if(desc.value == "")
    {
        alert ("no desc");
        return false;
    }
    var manager = $("email");
    var emailFrom = /^[a-zA-Z0-9]{1,}[@]{1}([a-zA-Z0-9]{1,20}[.]{1}){1,4}[a-zA-Z]{3}$/;
    if(manager.value = "")
    {
        alert ("no email");
        return false;
    }
    else if(!manager.value.match(emailFrom))
    {
        alert ("bad email");
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

    $("xboxid").disabled = true;
    $("psid").disabled = true;
    $("pcid").disabled = true;

    Xbox.onclick = function(){
        if(this.checked)
        {
            $("xboxid").disabled = false;
        }
        else
        {
            $("xboxid").disabled = true;
        }
    }

    PS.onclick = function(){
        if(this.checked)
        {
            $("psid").disabled = false;
        }
        else
        {
            $("psid").disabled = true;
        }
    }

    PC.onclick = function(){
        if(this.checked)
        {   
            $("pcid").disabled = false;
        }
        else
        {
            $("pcid").disabled = true;
        }
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
    document.getElementsByClassName("Plats1")[0].checked = false;
    document.getElementsByClassName("Plats2")[0].checked = false;
    document.getElementsByClassName("Plats3")[0].checked = false;
    document.getElementsByClassName("Plats4")[0].checked = false;
    document.getElementsByClassName("Plats1")[0].onclick = function(){
        var Checks = document.getElementsByClassName("Plats1");
        
        if(Checks[0].checked)
        {
            for(var i = 1; i < Checks.length; i++)
            {
                Checks[i].checked = false;
                Checks[i].disabled = true;
            }
        }
        else
        {
            for(var i = 1; i < Checks.length; i++)
            {
                Checks[i].disabled = false;
            }
        }
    
    }

    document.getElementsByClassName("Plats2")[0].onclick = function(){
        var Checks = document.getElementsByClassName("Plats2");
        if(Checks[0].checked)
        {
            for(var i = 1; i < Checks.length; i++)
            {
                Checks[i].checked = false;
                Checks[i].disabled = true;
            }
        }
        else
        {
            for(var i = 1; i < Checks.length; i++)
            {
                Checks[i].disabled = false;
            }
        }
    }

    document.getElementsByClassName("Plats3")[0].onclick = function(){
        var Checks = document.getElementsByClassName("Plats3");
        if(Checks[0].checked)
        {
            for(var i = 1; i < Checks.length; i++)
            {
                Checks[i].checked = false;
                Checks[i].disabled = true;
            }
        }
        else
        {
            for(var i = 1; i < Checks.length; i++)
            {
                Checks[i].disabled = false;
            }
        }
    }

    document.getElementsByClassName("Plats4")[0].onclick = function(){
        var Checks = document.getElementsByClassName("Plats4");
        if(Checks[0].checked)
        {
            for(var i = 1; i < Checks.length; i++)
            {
                Checks[i].checked = false;
                Checks[i].disabled = true;
            }
        }
        else
        {
            for(var i = 1; i < Checks.length; i++)
            {
                Checks[i].disabled = false;
            }
        }
    }

}

window.addEventListener("load", OnloadFunctions, false);
