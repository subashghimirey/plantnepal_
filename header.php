<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Navbar with Video Background</title>
    <!-- Google Fonts - Montserrat -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- Font Awesome for icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <!-- Custom CSS (linked from external file) -->
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="aims.css" />
    <link rel="stylesheet" href="split.css" />
    <link rel="stylesheet" href="footer.css" />
    <!-- Add the user menu CSS -->
    <link rel="stylesheet" href="user-menu.css" />
  </head>
  <body>
    <!-- Video Background Container -->
    <div class="video-container">
      <!-- Video Background - Replace 'your-video.mp4' with your actual video file -->
      <video autoplay muted loop id="bg-video">
        <source src="video/bg.mp4" type="video/mp4" />
        <!-- Fallback image if video doesn't load -->
        Your browser does not support the video tag.
      </video>

      <!-- Overlay to ensure text readability -->
      <div class="video-overlay"></div>
    </div>

    <!-- Hero Section Container -->
    <div class="hero-section">
      <!-- Main Navigation Bar -->
      <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">
          <a href="#"><img src="images/logo.png" alt="Logo" /></a>
        </div>

        <!-- Navigation Links -->
        <div class="nav-links">
          <ul>
            <li><a href="#">Plant and Gift</a></li>
            <li><a href="#">For Companies</a></li>
            <li><a href="#">About Us</a></li>

            <!-- Free Tree Promotion Section -->
            <li class="free-tree">
              <a href="#">
                <i class="fas fa-gift"></i>
                Want a free tree?
              </a>
            </li>
          </ul>
        </div>

        <!-- Right Side Section - Language & Auth Buttons -->
        <div class="right-section">
          <div class="auth-buttons" id="auth-container">
            <!-- Auth content will be dynamically inserted here -->
            <a href="login.html" class="login-btn" style="text-decoration: none">Log in</a>
          </div>
        </div>

        <!-- Mobile Hamburger Menu -->
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>

      <!-- Hero Content - Add your hero content here -->
      <div class="hero-content">
        <h1>Grow Your Forest</h1>
        <p>Plant trees, grow forests, save the planet.</p>
        <button class="cta-button">Get Started</button>
      </div>
    </div>

    <!-- Add this script just before the closing body tag -->
    <script type="module">
      import { supabase } from './supabase.js';

      // Function to update authentication section based on login status
      async function updateAuthSection() {
        try {
          const { data, error } = await supabase.auth.getUser();
          
          if (error) {
            console.error('Error fetching user:', error);
            return;
          }
          
          const authContainer = document.getElementById('auth-container');
          
          if (data && data.user) {
            // User is logged in - display their name and dropdown
            const userData = data.user.user_metadata;
            const firstName = userData.first_name || 'User';
            
            authContainer.innerHTML = `
              <div class="user-menu">
                <div class="user-greeting">
                  <span>Hi, ${firstName}</span>
                  <i class="fas fa-chevron-down dropdown-icon"></i>
                </div>
                <div class="dropdown-menu">
                  <a href="dashboard.html"><i class="fas fa-tree"></i> My Forest</a>
                  <a href="profile.html"><i class="fas fa-user"></i> My Profile</a>
                  <a href="#" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </div>
              </div>
            `;
            
            // Add event listener to logout button
            document.getElementById('logout-btn').addEventListener('click', async (e) => {
              e.preventDefault();
              const { error } = await supabase.auth.signOut();
              if (error) {
                console.error('Error signing out:', error);
              } else {
                window.location.href = 'index.php';
              }
            });
            
            // Toggle dropdown on click
            const userGreeting = document.querySelector('.user-greeting');
            const dropdownMenu = document.querySelector('.dropdown-menu');
            
            userGreeting.addEventListener('click', (e) => {
              e.stopPropagation();
              dropdownMenu.classList.toggle('active');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', () => {
              dropdownMenu.classList.remove('active');
            });
            
          } else {
            // User is not logged in - show login/signup buttons
            authContainer.innerHTML = `
              <a href="login.html" class="login-btn">Log in</a>
              <a href="register.html" class="signup-btn">Start forest</a>
            `;
          }
        } catch (err) {
          console.error('Authentication error:', err);
        }
      }
      
      // Run when page loads
      document.addEventListener('DOMContentLoaded', updateAuthSection);
    </script>