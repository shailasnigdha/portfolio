<?php
  // skills.php
  $pageTitle = "Skills";
  include 'includes/header.php';
?>
<section class="skills" id="skills">
  <h2 class="heading"><i class="fa-solid fa-screwdriver-wrench"></i> My <span>Skills</span></h2>

  <div class="skills-container">
    <!-- HTML -->
    <div class="skill-box">
      <i class="fa-regular fa-file-code"></i>
      <h3>HTML</h3>
      <p>Semantic, accessible structure for SEO and performance.</p>
      <button type="button"
              class="btn read-more"
              data-title="HTML"
              data-desc="I write semantic HTML that’s accessible, SEO-friendly, and easy to maintain. I focus on clean structure, ARIA roles where needed, and reusable components.">
        Read more
      </button>
    </div>

    <!-- CSS -->
    <div class="skill-box">
      <i class="fa-brands fa-css3"></i>
      <h3>CSS</h3>
      <p>Responsive layouts, animations, modern UI systems.</p>
      <button type="button"
              class="btn read-more"
              data-title="CSS"
              data-desc="From utility-first to component-driven CSS, I build responsive layouts, fluid grids, and elegant animations (keyframes, transitions, transforms). I use variables, prefers-reduced-motion, and modern features.">
        Read more
      </button>
    </div>

    <!-- Graphics Design -->
    <div class="skill-box">
      <i class="fa-solid fa-paintbrush"></i>
      <h3>Graphics Design</h3>
      <p>Brand-first visuals with a clean aesthetic.</p>
      <button type="button"
              class="btn read-more"
              data-title="Graphics Design"
              data-desc="I craft design systems that balance brand personality with usability—color, type, spacing, hierarchy, and iconography—optimized for web delivery.">
        Read more
      </button>
    </div>

    <!-- JavaScript -->
    <div class="skill-box">
      <i class="fa-brands fa-js"></i>
      <h3>JavaScript</h3>
      <p>Interactive UI, data flow, API work, tooling.</p>
      <button type="button"
              class="btn read-more"
              data-title="JavaScript"
              data-desc="I build interactive experiences, handle state, talk to APIs, and keep bundles lean. I pay attention to accessibility, performance, and progressive enhancement.">
        Read more
      </button>
    </div>

    <!-- MySQL -->
    <div class="skill-box">
      <i class="fa-solid fa-database"></i>
      <h3>MySQL</h3>
      <p>Relational modeling, queries, and optimization.</p>
      <button type="button"
              class="btn read-more"
              data-title="MySQL"
              data-desc="I design schemas, write efficient queries, and optimize with indexes. I care about data integrity, migrations, and safe database access from apps.">
        Read more
      </button>
    </div>
  </div>
</section>

<!-- Modal (will be auto-created by JS if you remove it) -->
<div id="skill-modal" class="skill-modal" aria-hidden="true" role="dialog" aria-modal="true">
  <div class="skill-modal__content">
    <button class="skill-modal__close" aria-label="Close">&times;</button>
    <h3 id="skill-modal-title"></h3>
    <div id="skill-modal-body"></div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
