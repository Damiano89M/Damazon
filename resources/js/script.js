/* document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
  
    let currentIndex = 0;
  
    nextBtn.addEventListener('click', function() {
      if (currentIndex < 2) {
        currentIndex++;
        updateCarousel();
      }
    });
  
    prevBtn.addEventListener('click', function() {
      if (currentIndex > 0) {
        currentIndex--;
        updateCarousel();
      }
    });
  
    function updateCarousel() {
      const translateValue = -currentIndex * 100 + '%';
      carousel.style.transform = 'translateX(' + translateValue + ')';
    }
  }); */

  document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
  
    let currentIndex = 0;
    const intervalTime = 3000; // Cambia slide ogni 3 secondi
    let intervalId;
  
    // Funzione per cambiare automaticamente la slide
    function startAutoSlide() {
      intervalId = setInterval(function() {
        if (currentIndex < 2) {
          currentIndex++;
        } else {
          currentIndex = 0;
        }
        updateCarousel();
      }, intervalTime);
    }
  
    // Funzione per fermare l'automazione
    function stopAutoSlide() {
      clearInterval(intervalId);
    }
  
    // Avvia l'automazione al caricamento della pagina
    startAutoSlide();
  
    // Aggiungi eventi ai pulsanti di scorrimento
    nextBtn.addEventListener('click', function() {
      stopAutoSlide(); // Fermare l'automazione quando l'utente preme un pulsante
      if (currentIndex < 2) {
        currentIndex++;
        updateCarousel();
      }
    });
  
    prevBtn.addEventListener('click', function() {
      stopAutoSlide();
      if (currentIndex > 0) {
        currentIndex--;
        updateCarousel();
      }
    });
  
    // Funzione per aggiornare il carosello
    function updateCarousel() {
      const translateValue = -currentIndex * 100 + '%';
      carousel.style.transform = 'translateX(' + translateValue + ')';
    }
  });
  
  