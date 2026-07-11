const container = document.getElementById("container"); // eg target

document.addEventListener("DOMContentLoaded", function () {

    const button = document.getElementById("toggleBtn");

    if (button) {
        button.addEventListener("click", () => {
            document.body.classList.toggle('active');
        });
    }

});

function showPanel() {
    var x = document.getElementById("panel");

    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function showPanel2() {
    document.getElementById("panel2").classList.toggle("show");
}