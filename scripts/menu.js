const mobileNavigation = document.querySelector("#mobile-navigation");
const menuIcon = document.querySelector("#menu-icon");

menuIcon.addEventListener("click", function() {
    menuIcon.classList.toggle("change");
    mobileNavigation.classList.toggle("hidden-menu");
});

window.addEventListener("resize", function() {
    if (this.innerWidth > 600 ) {
        // console.log("works!");
        mobileNavigation.classList.add("hidden-menu");
        menuIcon.classList.remove("change");
    } 
}, false);