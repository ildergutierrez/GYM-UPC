function logo() {
    const logo = document.getElementById("logo");
    const logo2 = document.getElementById("logo_2");

    if (logo.style.display === "block") {
        logo.style.display = "none";
        logo2.style.display = "block";
        // logo2.style.transition = "all 0.5s ease";

    }
    else {
        logo.style.display = "block";
        logo2.style.display = "none";
        // logo.style.transition = "all 0.5s ease";
    }


}


