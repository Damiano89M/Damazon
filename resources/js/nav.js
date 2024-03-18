var menuOpen = false;

document.getElementById('button').addEventListener("click", function() {
  menuOpen = !menuOpen;
  if (menuOpen) {
    this.classList.add('menu-open');
  } else {
    this.classList.remove('menu-open');
  }
});
