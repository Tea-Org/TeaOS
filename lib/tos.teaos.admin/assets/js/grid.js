
window.addEventListener("DOMContentLoaded", () => {
    let gr = document.getElementsByClassName('gr');
    let div = document.getElementsByClassName('dr');

    gr[0].addEventListener("click", () => {
        div[0].style.display = "contents";
        div[1].style.display = "none";
    });
    gr[1].addEventListener("click", () => {
        div[1].style.display = "contents";
        div[0].style.display = "none";
    });
});