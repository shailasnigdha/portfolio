<?php $pageTitle = "Skills — Shaila Akter"; include 'includes/header.php'; ?>
<section class="skills">
  <h2 class="heading">My <span>Skills</span></h2>
  <div class="skills-container">
    <div class="skill-box">
      <i class="fab fa-html5"></i>
      <h3>HTML</h3>
      <p>Semantic and accessible markup.</p>
      <a href="#" class="btn read-more" data-title="HTML" data-text="I write semantic, accessible HTML with ARIA where needed.">Read more</a>
    </div>
    <div class="skill-box">
      <i class="fab fa-css3-alt"></i>
      <h3>CSS</h3>
      <p>Responsive and modern UI design.</p>
      <a href="#" class="btn read-more" data-title="CSS" data-text="Responsive layouts, Flexbox/Grid, animations and component systems.">Read more</a>
    </div>
    <div class="skill-box">
      <h3>Graphics Design</h3>
      <p>Create animated and realistic designs.</p>
      <a href="#" class="btn read-more" data-title="Design" data-text="Logos, banners, social creatives, motion snippets.">Read more</a>
    </div>
    <div class="skill-box">
      <h3>JavaScript</h3>
      <p>Interactive frontends and tooling.</p>
      <a href="#" class="btn read-more" data-title="JavaScript" data-text="Vanilla JS, DOM APIs, small libraries, and SPA basics.">Read more</a>
    </div>
    <div class="skill-box">
      <h3>MySQL</h3>
      <p>CRUD, joins, indexing basics.</p>
      <a href="#" class="btn read-more" data-title="MySQL" data-text="Designing schemas, writing safe queries and optimizing basics.">Read more</a>
    </div>
  </div>
</section>

<div class="popup-box" id="popup">
  <div class="popup-content">
    <span class="close-btn">&times;</span>
    <h3 id="popup-title"></h3>
    <p id="popup-text"></p>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
