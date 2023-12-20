function change(button){

    // Removes the active_button class off all elements so makes it look like none are selected
    document.getElementById("dealsb1").classList.remove("active_button");
    document.getElementById("dealsb2").classList.remove("active_button");
    document.getElementById("dealsb3").classList.remove("active_button");

    // after removing the colour is added back onto the correct button
    button.classList.add("active_button");

    /*
    These if statements check to see which button was pressed and changes the information
    based on that - this was to test my javascripting out, however a more appropriate solution
    would be to use PHP however that will be used on view holidays page
     */
    if(button.id === "dealsb1"){
        document.getElementById("deals_h3").textContent = "Package Holiday to Paris";
        document.getElementById("deals_img").src = "img_paris.jpg"
        document.getElementById("deals_desc").textContent = "Embark on a beautiful adventure of the most romantic city in the world, Paris.";
        document.getElementById("deals_price").childNodes[0].textContent = "$200";
        document.getElementById("deals_price").childNodes[1].textContent = "/$100";
    }
    if(button.id === "dealsb2"){
        document.getElementById("deals_h3").textContent = "Package Holiday to Berlin";
        document.getElementById("deals_img").src = "img_berlin.jpg"
        document.getElementById("deals_desc").textContent = "Berlin home of the most interesting museums and architecture in the world.";
        document.getElementById("deals_price").childNodes[0].textContent = "$800";
        document.getElementById("deals_price").childNodes[1].textContent = "/$400";
    }
    if(button.id === "dealsb3"){
        document.getElementById("deals_h3").textContent = "Package Holiday to London";
        document.getElementById("deals_img").src = "img_london.jpg"
        document.getElementById("deals_desc").textContent = "London a city within England which once dominated the world, see the historic sites and even get some world famous fish and chips.";
        document.getElementById("deals_price").childNodes[0].textContent = "$1000";
        document.getElementById("deals_price").childNodes[1].textContent = "/$500";
    }

}

/* used text content instead of innerHTML as innerHTML poses a security risk of cross site scripting

 */