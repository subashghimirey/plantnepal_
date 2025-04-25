<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | Plant Nepal</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="main-container">
    <div class="auth-container">
      <div class="logo-container">
        <i class="fas fa-leaf logo-icon"></i>
        <h1>Plant Nepal</h1>
      </div>
      <h2>Create an Account</h2>
      <form id="register-form">
        <div class="name-fields">
          <div class="input-group half">
            <i class="fas fa-user input-icon"></i>
            <input type="text" id="first-name" placeholder="First Name" required>
          </div>
          <div class="input-group half">
            <i class="fas fa-user input-icon"></i>
            <input type="text" id="last-name" placeholder="Last Name" required>
          </div>
        </div>
        <div class="input-group">
          <i class="fas fa-envelope input-icon"></i>
          <input type="email" id="register-email" placeholder="Email" required>
        </div>
        <div class="input-group">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" id="register-password" placeholder="Password" required>
        </div>
        <div class="input-group">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" id="confirm-password" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn-primary">Register</button>
      </form>
      <div class="auth-footer">
        Already have an account? <a href="login.html">Login</a>
      </div>
      <div id="message" class="message"></div>
    </div>
  </div>

  <script type="module">
    import { supabase } from './supabase.js';

    const form = document.getElementById("register-form");
    const message = document.getElementById("message");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      const firstName = document.getElementById("first-name").value.trim();
      const lastName = document.getElementById("last-name").value.trim();
      const email = document.getElementById("register-email").value.trim();
      const password = document.getElementById("register-password").value;
      const confirmPassword = document.getElementById("confirm-password").value;

      if (password !== confirmPassword) {
        message.textContent = "Passwords do not match!";
        message.className = "message error";
        return;
      }

      try {
        const { data, error } = await supabase.auth.signUp({
          email,
          password,
          options: {
            data: {
              first_name: firstName,
              last_name: lastName
            }
          }
        });

        if (error) {
          message.textContent = "❌ " + error.message;
          message.className = "message error";
        } else {
          message.textContent = "✅ Registration successful! Please check your email.";
          message.className = "message success";
          form.reset();
          
          // Redirect after successful registration
          setTimeout(() => {
            window.location.href = "login.html";
          }, 2000);
        }
      } catch (err) {
        message.textContent = "❌ An error occurred during registration";
        message.className = "message error";
        console.error(err);
      }
    });
  </script>
</body>
</html>