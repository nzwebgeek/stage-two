const container = document.getElementById("container"); // eg target
const button = document.getElementById("toggleBtn"); // eg source

const frmLink =document.getElementById('hide');

button.addEventListener("click", () => {
  document.body.classList.toggle('active');
});

function showPanel() {
  var x = document.getElementById("panel");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}