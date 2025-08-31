</main>

<footer class="footer">
  <div class="footer-text">
    <p>&copy; <?= date('Y') ?> Shaila Akter | All rights reserved.</p>
  </div>
  <div class="footer-iconTop">
    <a href="#"><i class="fa-solid fa-angle-up"></i></a>
  </div>
</footer>

<!-- Style Switcher -->
<div class="style-switcher" id="style-switcher">
  <h2 class="style-switcher-title">Style Switcher</h2>

  <!-- Color Picker -->
  <div class="style-switcher-item">
    <h3 class="style-switcher-subtitle">Color</h3>
    <div class="style-switcher-colors">
      <span class="style-switcher-color" data-hue="355"><i class="fa-solid fa-check"></i></span>
      <span class="style-switcher-color" data-hue="220"><i class="fa-solid fa-check"></i></span>
      <span class="style-switcher-color" data-hue="120"><i class="fa-solid fa-check"></i></span>
      <span class="style-switcher-color" data-hue="45"><i class="fa-solid fa-check"></i></span>
      <span class="style-switcher-color" data-hue="280"><i class="fa-solid fa-check"></i></span>
    </div>
  </div>

  <!-- Theme Picker -->
  <div class="style-switcher-item">
    <h3 class="style-switcher-subtitle">Theme</h3>
    <div class="style-switcher-themes">
      <label class="style-switcher-theme">
        <input type="radio" id="light-theme" name="body-theme" value="light" />
        <span class="style-switcher-label">Light</span>
      </label>
      <label class="style-switcher-theme">
        <input type="radio" id="dark-theme" name="body-theme" value="dark" />
        <span class="style-switcher-label">Dark</span>
      </label>
    </div>
  </div>

  <!-- Close Button -->
  <div class="style-switcher-close" id="switcher-close">
    <i class="fa-solid fa-xmark"></i>
  </div>
</div>

<!-- Vendor libs -->
<script src="https://cdn.jsdelivr.net/npm/mixitup@3"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

<!-- App JS -->
<script src="script.js"></script>
</body>
</html>
