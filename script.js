// Smooth scroll + tiny polish
document.querySelectorAll('.menu a').forEach(a => {
  a.addEventListener('click', e => {
    const href = a.getAttribute('href');
    if (href && href.startsWith('#')) {
      e.preventDefault();
      const el = document.querySelector(href);
      if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

// Reveal email on click
document.querySelectorAll('.reveal-email').forEach(a=>{
  a.addEventListener('click', (e)=>{
    e.preventDefault();
    const email = a.getAttribute('data-email');
    if (a.dataset.revealed !== '1') {
      a.innerHTML = a.innerHTML.replace(/Email/i, email);
      a.setAttribute('href', 'mailto:' + email);
      a.dataset.revealed = '1';
    } else {
      window.location.href = 'mailto:' + email;
    }
  });
});
