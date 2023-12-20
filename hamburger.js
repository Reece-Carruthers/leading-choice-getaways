function hamburgerShow(){
    var x = document.getElementById("hamburgerLinks");
    if(x.style.display === "grid"){
        x.style.display = "none";
    }else {
        x.style.display = "grid"
    }
}