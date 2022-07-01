document.addEventListener("DOMContentLoaded", () => {
    loadHtml("../html/modal_update.html", document.getElementsByClassName("mdl-update"));

});

function loadHtml(urlLocation, componet) {
    req = new XMLHttpRequest();
    req.open("GET", urlLocation, false);
    req.send(null);
    componet.innerHTML = req.responseText;
}

