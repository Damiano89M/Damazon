
  //Modale//
  document.addEventListener('DOMContentLoaded', function() {
    var apriModaleBtns = document.querySelectorAll('.apriModale');
    var chiudiModaleBtns = document.querySelectorAll('.chiudi');

    apriModaleBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var target = btn.getAttribute('data-target');
            var modale = document.getElementById(target);
            if (modale) {
                modale.style.display = 'block';
            }
        });
    });

    chiudiModaleBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var target = btn.getAttribute('data-target');
            var modale = document.getElementById(target);
            if (modale) {
                modale.style.display = 'none';
            }
        });
    });

    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modale')) {
            event.target.style.display = 'none';
        }
    });
});

//mostra password//

window.mostrapassword = function() {
 var x = document.getElementById("password");
 var eyeIcon = document.querySelector("fa-eye")

 if(x.type === "password") {
  x.type = "text"
  eyeIcon.classList.remove("fa-eye");
  eyeIcon.classList.add("fa-eye-slash");
 } else {
  x.type = "password"
  eyeIcon.classList.remove("fa-eye");
  eyeIcon.classList.add("fa-eye-slash");
 }
}

window.showapassword = function() {
  var x = document.getElementById("password");
  var eyeIcon = document.querySelector("fa-eye")
 
  if(x.type === "password") {
   x.type = "text"
   eyeIcon.classList.remove("fa-eye");
   eyeIcon.classList.add("fa-eye-slash");
  } else {
   x.type = "password"
   eyeIcon.classList.remove("fa-eye");
   eyeIcon.classList.add("fa-eye-slash");
  }
 }

 window.vediapassword = function() {
  var x = document.getElementById("password_confirmation");
  var eyeIcon = document.querySelector("fa-eye")
 
  if(x.type === "password") {
   x.type = "text"
   eyeIcon.classList.remove("fa-eye");
   eyeIcon.classList.add("fa-eye-slash");
  } else {
   x.type = "password"
   eyeIcon.classList.remove("fa-eye");
   eyeIcon.classList.add("fa-eye-slash");
  }
 }


  
  
  