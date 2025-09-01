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

// MIXITUP (Projects page only)
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

// PROJECT POPUP HANDLER
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

// ABOUT MODAL HANDLER
document.addEventListener("DOMContentLoaded", function () {
  const readMoreBtn = document.getElementById('open-about-modal');
  const modal = document.getElementById('about-modal');
  const closeBtn = document.getElementById('close-modal');

  if (!(readMoreBtn && modal && closeBtn)) return;

  readMoreBtn.addEventListener('click', function (e) {
    e.preventDefault();
    modal.style.display = 'flex';
  });

  closeBtn.addEventListener('click', function () {
    modal.style.display = 'none';
  });

  window.addEventListener('click', function (e) {
    if (e.target === modal) modal.style.display = 'none';
  });

  window.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') modal.style.display = 'none';
  });
});

// ================== Skills Modal Handler ==================
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("skillModal");
  const modalTitle = document.getElementById("modal-title");
  const modalText = document.getElementById("modal-text");
  const closeBtn = document.querySelector(".skill-modal-close");

  if (modal && modalTitle && modalText && closeBtn) {
    // Open modal when clicking "Read more"
    document.querySelectorAll(".btn read-more").forEach(btn => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        modalTitle.textContent = btn.dataset.title || "Skill";
        modalText.textContent = btn.dataset.text || "No description available.";
        modal.classList.add("active");
      });
    });

    // Close modal when clicking X
    closeBtn.addEventListener("click", () => {
      modal.classList.remove("active");
    });

    // Close modal when clicking outside
    window.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.classList.remove("active");
      }
    });

    // Close modal on ESC key
    window.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        modal.classList.remove("active");
      }
    });
  }
});
