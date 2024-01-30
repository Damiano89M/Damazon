/* 
  var banner = document.getElementById('banner');
  var immagini = [
    '/public\media\vecteezy_businessman-holding-global-internet-connection-technology_7252575.jpg',
    '/public\media\vecteezy_e-commerce-hand-holding-shopping-bag-and-credit-card-from_6907007.jpg',
    '/public\media\vector-JUL-2021-61.jpg'
  ];
  var indiceImmagine = 0;

  function cambiaImmagine() {
    var img = new Image();
    img.src = immagini[indiceImmagine];
    img.style.position = 'absolute';
    img.style.left = '500px';
    img.style.top = '1150px';
    img.style.width = '500px';
    img.style.height = '200px';
    banner.appendChild(img);
  }

  cambiaImmagine();

  function anima() {
    var img = banner.querySelector('img');
    img.style.left = (parseInt(img.style.left, 10) || 0) - 1 + 'px';

    if (parseInt(img.style.left, 10) < -500) {
      banner.removeChild(img);
      indiceImmagine = (indiceImmagine + 1) % immagini.length;
      cambiaImmagine();
    }

    requestAnimationFrame(anima);
  }

  anima();

 */