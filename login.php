<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Plant Nepal</title>
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
      <h2>Login to Your Account</h2>
      <form id="login-form">
        <div class="input-group">
          <i class="fas fa-envelope input-icon"></i>
          <input type="email" id="login-email" placeholder="Email" required>
        </div>
        <div class="input-group">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" id="login-password" placeholder="Password" required>
        </div>
        <div class="forgot-password">
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btn-primary">Login</button>
      </form>
      <div class="auth-footer">
        Don't have an account? <a href="register.php">Register</a>
      </div>
      <div id="login-message" class="message"></div>
    </div>
  </div>

  <script type="module">
    import { supabase } from './supabase.js';

    document.getElementById("login-form").addEventListener("submit", async (e) => {
      e.preventDefault();
      const email = document.getElementById("login-email").value;
      const password = document.getElementById("login-password").value;
      const messageEl = document.getElementById("login-message");

      try {
        const { data, error } = await supabase.auth.signInWithPassword({ 
          email, 
          password 
        });

        if (error) {
          messageEl.textContent = "❌ " + error.message;
          messageEl.className = "message error";
        } else {
          messageEl.textContent = "✅ Login successful!";
          messageEl.className = "message success";
          
          // Redirect after successful login
          setTimeout(() => {
            window.location.href = "index.php";
          }, 1000);
        }
      } catch (err) {
        messageEl.textContent = "❌ An error occurred during login";
        messageEl.className = "message error";
        console.error(err);
      }
    });
  </script>
</body>
</html>