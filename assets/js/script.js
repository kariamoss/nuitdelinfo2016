function switcher(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";

    if(cityName == 'ressources'){
    document.getElementById("header").style.backgroundColor  = "#f69319";
    document.getElementById("container").style.backgroundColor  = "#F68700";       
    }

    if(cityName == 'feeds'){
    document.getElementById("header").style.backgroundColor  = "#1690a0";
    document.getElementById("container").style.backgroundColor  = "#40b7bf";  
    }
}

