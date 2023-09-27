// if header has class of sticky wait until you scroll down past the header to add the class of sticky
const header = document.querySelector('header');

window.addEventListener('scroll', () => {
  if (header.classList.contains('sticky') && window.scrollY < header.offsetHeight) {
    header.classList.remove('sticky');
  } else if (window.scrollY > header.offsetHeight) {
    header.classList.add('sticky');
  }
});

