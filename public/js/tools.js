function auth() {
  let x = document.getElementById("login");
  let y = document.getElementById("register");

  if (x.style.display === "none") {
    x.style.display = "hidden";
    y.style.display = "none";
  } else {
    y.style.display = "block";
    x.style.display = "none";
  }
}
