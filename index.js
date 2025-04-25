// Get DOM elements
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const rightSection = document.querySelector('.right-section');

// Toggle mobile menu when hamburger is clicked
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active');
    rightSection.classList.toggle('active');
});

// Close menu when clicking on a navigation link
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navLinks.classList.remove('active');
        rightSection.classList.remove('active');
    });
});

// Close menu when clicking outside the navigation area
document.addEventListener('click', (e) => {
    if (!navLinks.contains(e.target) &&
        !hamburger.contains(e.target) &&
        !rightSection.contains(e.target)) {
        hamburger.classList.remove('active');
        navLinks.classList.remove('active');
        rightSection.classList.remove('active');
    }
});