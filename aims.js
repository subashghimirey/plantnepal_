// Interactive Background Elements Movement
// Add this code to your existing index.js file

// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function () {
    // Get all floating icons
    const floatingIcons = document.querySelectorAll('.floating-icon');

    // Add mouse move event listener to the aims section
    const aimsSection = document.querySelector('.aims-section');

    if (aimsSection) {
        aimsSection.addEventListener('mousemove', function (e) {
            // Get mouse position relative to the section
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            // Get section dimensions and position
            const rect = aimsSection.getBoundingClientRect();
            const sectionX = rect.left + rect.width / 2;
            const sectionY = rect.top + rect.height / 2;

            // Calculate mouse position relative to center of section
            const relativeX = mouseX - sectionX;
            const relativeY = mouseY - sectionY;

            // Move each floating icon based on mouse position
            floatingIcons.forEach((icon, index) => {
                // Different movement factor for each icon for varied effect
                const movementFactor = 0.03 + (index * 0.01);

                // Calculate movement distance
                const moveX = relativeX * movementFactor;
                const moveY = relativeY * movementFactor;

                // Apply transform
                icon.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });

        // Reset positions when mouse leaves the section
        aimsSection.addEventListener('mouseleave', function () {
            floatingIcons.forEach(icon => {
                icon.style.transform = 'translate(0, 0)';
            });
        });
    }

    // Add subtle floating animation to icons when page loads
    floatingIcons.forEach((icon, index) => {
        // Create random initial position for natural look
        const randomX = Math.random() * 20 - 10;
        const randomY = Math.random() * 20 - 10;

        // Set initial position
        icon.style.transform = `translate(${randomX}px, ${randomY}px)`;
    });
});

document.querySelectorAll('.aim-box').forEach(card => {
    card.addEventListener('click', () => {
        card.classList.toggle('flipped');
    });
});