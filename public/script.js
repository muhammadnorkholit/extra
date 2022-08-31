const header = document.querySelector(".navbar");
const navToggle = document.querySelector("#navToggle");
const navMenu = document.querySelector("#navMenu");
// let scrolPrev = window.scrollTop();
// console.log(scrolPrev);
let scrollCurrentPrev = window;
console.log(scrollCurrentPrev);

window.onscroll = function () {
    if (scrollY > 100) {
        header.classList.add("active");
    } else {
        header.classList.remove("active");
    }
};

function showMenu() {
    navMenu.classList.toggle("show");
}
