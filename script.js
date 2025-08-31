// toggle icon navbar
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('fa-xmark');
    navbar.classList.toggle('active');
};

// Scroll section active link
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('.header nav a');

window.onscroll = () => {
    sections.forEach(section => {
        let top = window.scrollY;
        let offset = section.offsetTop - 150;
        let height = section.offsetHeight;
        let id = section.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
                const found = document.querySelector('.header nav a[href*=' + id + ']');
                if (found) found.classList.add('active');
            });
        }
    });

    // Sticky navbar
    let header = document.querySelector('.header');
    header.classList.toggle('sticky', window.scrollY > 100);

    // Remove toggle icon navbar
    menuIcon.classList.remove('fa-xmark');
    navbar.classList.remove('active');
};

// Scroll reveal animation
ScrollReveal({
    distance: '80px',
    duration: 2000,
    delay: 200
});
ScrollReveal().reveal('.home-content, .heading', { origin: 'top' });
ScrollReveal().reveal('.home-img, .services-container, .project-box, .skills-container, .contact-form, .education-container', { origin: 'bottom' });
ScrollReveal().reveal('.home-content h1, .about-img, .contact-content', { origin: 'left' });
ScrollReveal().reveal('.home-content p, .about-content, .home-img-container', { origin: 'right' });

// Typed js
document.addEventListener("DOMContentLoaded", function () {
    const target = document.querySelector(".multiple-text");
    if (target) {
        new Typed(".multiple-text", {
            strings: ["Web Developer", "App Developer", "Web Designer", "Programmer"],
            typeSpeed: 70,
            backSpeed: 70,
            backDelay: 1000,
            loop: true,
        });
    }
});

// Style Switcher Toggle
const styleSwitcher = document.getElementById('style-switcher'),
      switcherToggle = document.getElementById('switcher-toggle'),
      switcherClose = document.getElementById('switcher-close');

if (switcherToggle && styleSwitcher) {
    switcherToggle.addEventListener('click', () => styleSwitcher.classList.add('show-switcher'));
}
if (switcherClose && styleSwitcher) {
    switcherClose.addEventListener('click', () => styleSwitcher.classList.remove('show-switcher'));
}

// Change color theme
const colors = document.querySelectorAll('.style-switcher-color');
colors.forEach(color => {
    color.addEventListener('click', () => {
        const activeColor = color.dataset.hue;
        colors.forEach(c => c.classList.remove('active-color'));
        color.classList.add('active-color');
        document.documentElement.style.setProperty('--hue', activeColor);
    });
});

// Theme Switcher (Light / Dark / Ash)
const themeInputs = document.querySelectorAll('input[name="body-theme"]');
themeInputs.forEach(input => {
    input.addEventListener('change', () => {
        document.documentElement.setAttribute('data-theme', input.value);
    });
});

/* =======================
   FORCE DEFAULT THEME = ASH + GREEN
======================= */
document.addEventListener("DOMContentLoaded", () => {
    document.documentElement.setAttribute('data-theme', 'ash');
    document.documentElement.style.setProperty('--hue', 120); // green
});

/* =======================
   MIXITUP (Projects page only)
======================= */
if (document.querySelector('.project-container')) {
    mixitup('.project-container', {
        selectors: { target: '.project-card' },
        animation: { duration: 300 }
    });
}

// link active work
const linkWork = document.querySelectorAll('.project-item');
function activeWork() {
    linkWork.forEach(l => l.classList.remove('active-work'));
    this.classList.add('active-work');
}
linkWork.forEach(l => l.addEventListener('click', activeWork));

/* =======================
   PROJECT POPUP HANDLER
======================= */
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('project-button')) {
        toggleProjectPopup();
        projectItemDetails(e.target.closest('.project-card'));
    }
});

function toggleProjectPopup() {
    const popup = document.querySelector('.project-popup');
    if (popup) popup.classList.toggle('open');
}

const popupClose = document.querySelector('.project-popup-close');
if (popupClose) popupClose.addEventListener('click', toggleProjectPopup);

function projectItemDetails(projectItem) {
    if (!projectItem) return;
    const img = projectItem.querySelector('.project-img');
    const title = projectItem.querySelector('.project-title');
    const details = projectItem.querySelector('.portfolio-item-details');

    const popupImg = document.querySelector('.pp-thumbnail img');
    const popupTitle = document.querySelector('.project-popup-subtitles span');
    const popupBody = document.querySelector('.project-popup-body');

    if (popupImg && img) popupImg.src = img.src;
    if (popupTitle && title) popupTitle.innerHTML = title.innerHTML;
    if (popupBody && details) popupBody.innerHTML = details.innerHTML;
}

/* =======================
   ABOUT MODAL HANDLER
======================= */
document.addEventListener("DOMContentLoaded", function () {
  const readMoreBtn = document.getElementById('open-about-modal');
  const modal = document.getElementById('about-modal');
  const closeBtn = document.getElementById('close-modal');

  if (!(readMoreBtn && modal && closeBtn)) return;

  // Open modal
  readMoreBtn.addEventListener('click', function (e) {
    e.preventDefault();
    modal.style.display = 'flex';
  });

  // Close modal
  closeBtn.addEventListener('click', function () {
    modal.style.display = 'none';
  });


  // Close when clicking outside
  window.addEventListener('click', function (e) {
    if (e.target === modal) modal.style.display = 'none';
  });

  // Close on ESC
  window.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') modal.style.display = 'none';
  });
});

// ================== Skills Modal ==================
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("skillModal");
  const modalTitle = document.getElementById("modal-title");
  const modalText = document.getElementById("modal-text");
  const closeBtn = document.querySelector(".skill-modal-close");

  // Ensure modal exists before binding
  if (modal && modalTitle && modalText && closeBtn) {
    document.querySelectorAll(".read-more").forEach(btn => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        modalTitle.textContent = btn.dataset.title || "Skill";
        modalText.textContent = btn.dataset.text || "No description available.";
        modal.style.display = "flex";
      });
    });

    closeBtn.addEventListener("click", () => {
      modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
      }
    });
  }
});
