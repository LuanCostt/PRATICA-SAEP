console.log("coracao.js is loaded");
const hearts = document.querySelectorAll('.like img');

hearts.forEach((heart) => {
  heart.addEventListener('click', () => {
    if (heart.dataset.liked === 'true') {
      heart.src = 'images/coracao.svg';
      heart.dataset.liked = 'false';
    } else {
      heart.src = 'images/CoracaoVermelho.svg';
      heart.dataset.liked = 'true';
    }
  });
});