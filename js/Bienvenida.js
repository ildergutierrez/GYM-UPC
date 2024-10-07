function logo() {
    var logo = document.getElementById('logo');
    var logo2 = document.getElementById('logo_2');
    var nombre = document.getElementById('nombre');
    var h1 = document.getElementById('x2');


    if (logo.style.display === "block") {
        logo.style.display = "none";
        logo2.style.display = "block";
        nombre.style.display = "none";
        nombre.style.border = "none";
        h1.style.display = "none";

    } else {
        logo2.style.display = "none";
        logo.style.display = "block";
        nombre.style.display = "block";
        nombre.style = "border-bottom: 2px solid #f1f1f1";
        h1.style.display = "block";
    }
}