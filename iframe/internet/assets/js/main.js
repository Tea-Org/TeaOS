window.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementsByTagName('input');
    const button = document.getElementsByTagName('button');
    const iframe = document.getElementsByTagName('iframe');

    button[0].addEventListener("click", () => {
        iframe[0].src = search[0].value;
    });
});