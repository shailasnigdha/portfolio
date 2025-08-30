// toggle icon navbar

let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('fa-xmark');
    navbar.classList.toggle('active');
}   

// Scroll section active link

let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('.header nav a');

window.onscroll = () => {
    sections.forEach(section => {
        let top = window.scrollY;
        let offset = section.offsetTop - 150;
        let height = section.offsetHeight;
        let id = section.getAttribute('id');

        if(top >= offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('.header nav a[href*=' + id + ']').classList.add('active');
            });
        }
    });

    // Sticky navbar

    let header = document.querySelector('.header');
    header.classList.toggle('sticky', window.scrollY > 100);

    //Remove toggle icon navbar

    menuIcon.classList.remove('fa-xmark');
    navbar.classList.remove('active');
};

//Scroll reveal animation
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
    var typed = new Typed(".multiple-text", {
        strings: ["Web Developer", "App Developer", "Web Designer", "Programmer"],
        typeSpeed: 70,
        backSpeed: 70,
        backDelay: 1000,
        loop: true,
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('popup');
    const popupTitle = document.getElementById('popup-title');
    const popupText = document.getElementById('popup-text');
    const closeBtn = document.querySelector('.close-btn');

    const skillDetails = {
        web: {
            title: "Web Development",
            text: "I have expertise in building modern, responsive websites using HTML, CSS, JavaScript, and frameworks like React and Vue.js."
        },
        app: {
            title: "App Development",
            text: "Experienced in developing Android apps with Java, Kotlin, and Flutter, ensuring smooth user experiences."
        },
        uiux: {
            title: "UI/UX Designing",
            text: "I design intuitive and aesthetically pleasing interfaces using tools like Figma, Adobe XD, and Sketch."
        }
    };

    document.querySelectorAll('.read-more').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent page jump
            const skillType = this.closest('.skill-box').getAttribute('data-skill'); // Correct selector
            if (skillDetails[skillType]) {
                popupTitle.textContent = skillDetails[skillType].title;
                popupText.textContent = skillDetails[skillType].text;
                popup.style.display = 'flex';
            }
        });
    });

    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });
});

// Style Switcher Toggle
const styleSwitcher = document.getElementById('style-switcher'),
    switcherToggle = document.getElementById('switcher-toggle'),
    switcherClose = document.getElementById('switcher-close');

switcherToggle.addEventListener('click', () => {
    styleSwitcher.classList.add('show-switcher');
});

switcherClose.addEventListener('click', () => {
    styleSwitcher.classList.remove('show-switcher');
});

// Change color theme
const colors = document.querySelectorAll('.style-switcher-color');
colors.forEach(color => {
    color.addEventListener('click', () => {
        const activeColor = color.style.getPropertyValue('--hue');

        // Remove active class from previous selection
        colors.forEach(c => c.classList.remove('active-color'));
        color.classList.add('active-color');

        // Apply new hue to root
        document.documentElement.style.setProperty('--hue', activeColor);
    });
});

// Theme Switcher (Light / Dark)
const themeInputs = document.querySelectorAll('input[name="body-theme"]');

themeInputs.forEach(input => {
    input.addEventListener('change', () => {
        document.documentElement.setAttribute('data-theme', input.value);
    });
});

// Set default theme based on user's preference or system settings
const userPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
if (userPrefersDark) {
    document.getElementById('dark-theme').checked = true;
    document.documentElement.setAttribute('data-theme', 'dark');
} else {
    document.getElementById('light-theme').checked = true;
    document.documentElement.setAttribute('data-theme', 'light');
}

// Ensure MixItUp is properly initialized
let mixerProject = mixitup('.project-container', {
    selectors: {    
        target : '.project-card'
    },
    animation: {
        duration: 300
    }
});

//link active work
const linkWork = document.querySelectorAll('.project-item');

function activeWork() {
        linkWork.forEach(l => l.classList.remove('active-work'));
        this.classList.add('active-work');
}

linkWork.forEach(l => l.addEventListener('click', activeWork));

//project popup
document.addEventListener('click', (e) => {
    if(e.target.classList.contains('project-button')) {
        toggleProjectPopup();
        projectItemDetails(e.target.parentElement);
    }
})

function toggleProjectPopup() {
    document.querySelector('.project-popup').classList.toggle('open'); 
}

document.querySelector('.project-popup-close').addEventListener('click', toggleProjectPopup);

function projectItemDetails(projectItem) {
    document.querySelector('.pp-thumbnail img').src = projectItem.querySelector('.project-img').src;
    document.querySelector('.project-popup-subtitles span').innerHTML = projectItem.querySelector('.project-title').innerHTML;
    document.querySelector('.project-popup-body').innerHTML = projectItem.querySelector('.project-item-details').innerHTML;
}   
        