<?php $pageTitle = "Skills — Shaila Akter"; include 'includes/header.php'; ?>
<section class="skills">
  <h2 class="heading">My <span>Skills</span></h2>
  <div class="skills-container">
    <div class="skill-box">
      <h3>HTML</h3>
      <p>Semantic and accessible markup.</p>
      <a href="#" class="btn read-more" data-title="HTML" data-text="HTML (HyperText Markup Language) is the standard markup language used to create the structure of web pages. I use semantic HTML to build well-organized, accessible and SEO-friendly websites. My knowledge covers elements, attributes, forms, media embedding, accessibility (ARIA), and responsive page layouts.">Read more</a>
    </div>
    <div class="skill-box">
      <h3>CSS</h3>
      <p>Responsive and modern UI design.</p>
      <a href="#" class="btn read-more" data-title="CSS" data-text="CSS (Cascading Style Sheets) is what I use to transform plain HTML into responsive, visually engaging websites. I specialize in modern CSS features such as Flexbox and Grid for layouts, CSS variables for maintainability and keyframe animations for interactive experiences. I ensure my styles are cross-browser compatible, mobile-friendly and accessible; delivering designs that adapt seamlessly to any screen size.">Read more</a>
    </div>
    <div class="skill-box">
      <h3>Graphics Design</h3>
      <p>Create animated and realistic designs.</p>
      <a href="#" class="btn read-more" data-title="Graphics Design" data-text="I create designs that are not only visually appealing but also functional and aligned with branding goals. My expertise covers creating logos, posters, banners and social media graphics using tools like Adobe Photoshop, Illustrator and Figma. I also design UI/UX prototypes and bring motion into projects through animated assets. My focus is on delivering designs that communicate effectively and leave a lasting impression.">Read more</a>
    </div>
    <div class="skill-box">
      <h3>JavaScript</h3>
      <p>Interactive frontends and tooling.</p>
      <a href="#" class="btn read-more" data-title="JavaScript" data-text="JavaScript allows me to add interactivity and functionality to websites and applications. I use ES6+ features, event-driven programming and DOM manipulation to build dynamic user interfaces. I work with APIs, asynchronous programming (AJAX/Fetch) and can integrate libraries or frameworks when needed. My focus is on creating responsive, fast and user-friendly frontends that make websites come alive.">Read more</a>
    </div>
    <div class="skill-box">
      <h3>MySQL</h3>
      <p>CRUD, joins, indexing basics.</p>
      <a href="#" class="btn read-more" data-title="MySQL" data-text="MySQL is the database system I use to manage structured data for web applications. I design normalized schemas, write optimized queries and perform CRUD operations securely. I also work with relationships, indexes and JOINs to ensure efficiency and scalability. MySQL skills allow me to build dynamic, data-driven applications that store and retrieve information reliably.">Read more</a>
    </div>
  </div>
</section>

<!-- Floating Modal -->
<div class="skill-modal" id="skillModal">
  <div class="skill-modal-content">
    <span class="skill-modal-close">&times;</span>
    <h3 id="modal-title"></h3>
    <p id="modal-text"></p>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
