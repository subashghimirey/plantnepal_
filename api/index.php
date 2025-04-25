<?php include 'header.php'; ?>



    <!-- Aims and Objectives Section - Add this after the hero-section div in your HTML -->
    <section class="aims-section">
    <!-- Interactive Background -->
    <div class="interactive-background">
      <div class="floating-icon" id="leaf1">
        <i class="fas fa-leaf"></i>
      </div>
      <div class="floating-icon" id="tree1">
        <i class="fas fa-tree"></i>
      </div>
      <div class="floating-icon" id="seedling1">
        <i class="fas fa-seedling"></i>
      </div>
      <div class="floating-icon" id="cloud1">
        <i class="fas fa-cloud"></i>
      </div>
      <div class="floating-icon" id="sun1">
        <i class="fas fa-sun"></i>
      </div>
      <div class="floating-icon" id="water1">
        <i class="fas fa-tint"></i>
      </div>
    </div>

    <div class="aims-container">
      <div class="section-header">
        <h2>Our Aims & Objectives</h2>
        <p>Helping the planet one tree at a time</p>
      </div>

      <div class="aims-grid">
        <!-- Aim Box 1 -->
        <div class="aim-box">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="https://healtharkinsights.com/wp-content/uploads/2023/01/oAymCooSEONWHzOIf1cj_Newsletter_New_Format_2.jpg" alt="Tree planting" class="aim-image">
              <h3>Plant 1 Million Trees</h3>
              <p class="flip-instruction">(Click to learn more)</p>
            </div>
            <div class="flip-card-back">
              <div class="aim-icon">
                <i class="fas fa-seedling"></i>
              </div>
              <h3>Plant 1 Million Trees</h3>
              <p>
                Our ambitious goal is to plant one million trees across the globe,
                focusing on areas affected by deforestation and climate change.
              </p>
              <p class="flip-instruction">(Click to flip back)</p>
            </div>
          </div>
        </div>

        <!-- Aim Box 2 -->
        <div class="aim-box">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="https://www.npws.net/hs-fs/hubfs/Imported_Blog_Media/7-Ways-to-Reduce-the-Carbon-Footprint-of-Your-Marketing-Efforts-Sep-21-2022-09-20-56-16-PM.jpg?width=800&height=450&name=7-Ways-to-Reduce-the-Carbon-Footprint-of-Your-Marketing-Efforts-Sep-21-2022-09-20-56-16-PM.jpg" alt="Carbon reduction" class="aim-image">
              <h3>Reduce Carbon Footprint</h3>
              <p class="flip-instruction">(Click to learn more)</p>
            </div>
            <div class="flip-card-back">
              <div class="aim-icon">
                <i class="fas fa-globe-americas"></i>
              </div>
              <h3>Reduce Carbon Footprint</h3>
              <p>
                Every tree planted helps absorb CO2 from the atmosphere,
                contributing to the reduction of global carbon emissions.
              </p>
              <p class="flip-instruction">(Click to flip back)</p>
            </div>
          </div>
        </div>

        <!-- Aim Box 3 -->
        <div class="aim-box">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="https://clubshr-cms-uploads-211125357115.s3.ap-southeast-2.amazonaws.com/uploads/public/656/54c/456/65654c4561d0e633205714.png" alt="Community support" class="aim-image">
              <h3>Support Local Communities</h3>
              <p class="flip-instruction">(Click to learn more)</p>
            </div>
            <div class="flip-card-back">
              <div class="aim-icon">
                <i class="fas fa-hands-helping"></i>
              </div>
              <h3>Support Local Communities</h3>
              <p>
                We work with local communities to provide sustainable livelihoods
                through our tree planting initiatives and education programs.
              </p>
              <p class="flip-instruction">(Click to flip back)</p>
            </div>
          </div>
        </div>

        <!-- Aim Box 4 -->
        <div class="aim-box">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="https://miro.medium.com/v2/resize:fit:1100/1*YS_qYrU7mKxjVLP4qTH_ZA.jpeg" alt="Biodiversity" class="aim-image">
              <h3>Preserve Biodiversity</h3>
              <p class="flip-instruction">(Click to learn more)</p>
            </div>
            <div class="flip-card-back">
              <div class="aim-icon">
                <i class="fas fa-leaf"></i>
              </div>
              <h3>Preserve Biodiversity</h3>
              <p>
                By restoring forests, we help preserve habitats for countless
                species and maintain the delicate balance of our ecosystems.
              </p>
              <p class="flip-instruction">(Click to flip back)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Split Target Audience Section - Minimalist Card Design -->
    <section class="split-section-container">
      <div class="split-section">
        <!-- Individual Card (Left Side) -->
        <div class="audience-card individuals-card">
          <div class="brush-accent"></div>
          <div class="panel-badge">FOR INDIVIDUALS</div>
          <div class="panel-content">
            <h2>Are you a person?</h2>
            <p>
              Every gesture counts. Plant trees from your smartphone and join
              our community of pragmatic dreamers.
            </p>
            <div class="panel-buttons">
              <a href="#" class="outline-button">Gift a tree</a>
              <a href="#" class="solid-button">Start here</a>
            </div>
          </div>
        </div>

        <!-- Company Card (Right Side) -->
        <div class="audience-card companies-card">
          <div class="brush-accent"></div>
          <div class="panel-badge">FOR COMPANIES</div>
          <div class="panel-content">
            <h2>Are you a company?</h2>
            <p>
              Discover our services to make sustainability the competitive
              advantage of your business.
            </p>
            <div class="panel-buttons">
              <a href="#" class="outline-button">Gift ideas</a>
              <a href="#" class="solid-button">Find More</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
  // Initialize Supabase (uses supabase.js file)
  async function checkUser() {
    const { data: { user } } = await supabase.auth.getUser();

    const authSection = document.getElementById('auth-section');
    if (user) {
      // Logged in: Show email and logout option
      authSection.innerHTML = `
        <span style="color:white; margin-right: 10px;">👤 ${user.email}</span>
        <button onclick="logout()" class="login-btn">Logout</button>
      `;
    } else {
      // Not logged in: Show login button
      document.getElementById('login-btn').addEventListener('click', () => {
        window.location.href = 'login.php';
      });
    }
  }

  // Logout function
  async function logout() {
    await supabase.auth.signOut();
    location.reload();
  }

  checkUser();
</script>


    <!-- Supabase JS -->
<script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js"></script>
<script src="supabase.js"></script>


<?php include 'footer.php'; ?>