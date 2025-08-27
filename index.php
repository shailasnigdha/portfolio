<?php
// ------------------------------------------------------------
// Portfolio for: Shaila Akter
// Drop this folder on any PHP-capable server (XAMPP, Laragon, cPanel, etc.)
// Edit the $profile['tagline'] below with your own tagline (as you requested).
// ------------------------------------------------------------

$profile = [
  'name'    => 'Shaila Akter',
  'email'   => 'shailasnigdha28@gmail.com',
  'phone'   => '01822817919',
  // ✨ You will set your own tagline here
  'tagline' => 'Everything is possible if one can believe oneself, try one\'s best and gets help from Allah',
];

$education = [
  [
    'year'   => '2019',
    'title'  => 'SSC — GPA 5.00',
    'place'  => 'Dhanmondi Kamrunnesa Govt Girls High School',
  ],
  [
    'year'   => '2021',
    'title'  => 'HSC — GPA 5.00',
    'place'  => 'Birshrestha Munshi Abdur Rouf Public College',
  ],
  [
    'year'   => '2023 — Present',
    'title'  => 'B.Sc. (CSE) — KUET (3rd Year)',
    'place'  => 'Admitted 2023 — 1st yr CGPA 3.19, 2nd yr CGPA 3.12 — (2 years remaining)',
  ],
];

$experience = [
  'Did a small food business',
  'Visited many districts',
  'Volunteer work in TRY & DREAM (KUET)',
];

$skills = [
  'Good communication', 'Speaking in 4 languages', 'Good at handling teamwork', 'Problem solving'
];

// 4–8 projects with category, image, and live link placeholders
$projects = [
  [
    'title'    => 'Student Database',
    'stack'    => 'C',
    'category' => 'Systems / CLI',
    'image'    => 'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=1200&auto=format&fit=crop',
    'live'     => '#',
    'code'     => 'https://github.com/shailasnigdha/student-database.git'
  ],
  [
    'title'    => 'Quiz Game',
    'stack'    => 'C++',
    'category' => 'Algorithms / CLI',
    'image'    => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=1200&auto=format&fit=crop',
    'live'     => '#',
    'code'     => 'https://github.com/shailasnigdha/quiz-game.git'
  ],
  [
    'title'    => 'Digital Clock',
    'stack'    => 'DLD',
    'category' => 'Digital Logic Design',
    'image'    => 'assets/digital_clock.jpg',
    'live'     => '#',
    'code'     => '#'
  ],
  [
    'title'    => 'Android App',
    'stack'    => 'Android Studio',
    'category' => 'Mobile',
    'image'    => 'https://images.unsplash.com/photo-1518779578993-ec3579fee39f?q=80&w=1200&auto=format&fit=crop',
    'live'     => '#',
    'code'     => '#'
  ],
  [
    'title'    => 'CPU in Computer Architecture',
    'stack'    => 'Emu',
    'category' => 'Architecture / Simulation',
    'image'    => 'https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=1200&auto=format&fit=crop',
    'live'     => '#',
    'code'     => '#'
  ],
];

// Socials (cleaned final URLs)
$socials = [
  [ 'label' => 'Facebook',  'url' => 'https://www.facebook.com/shailahk.snigdha', 'icon' => 'facebook' ],
  [ 'label' => 'Instagram', 'url' => 'https://www.instagram.com/shailasnigdha',   'icon' => 'instagram' ],
  [ 'label' => 'GitHub',    'url' => 'https://github.com/shailasnigdha',          'icon' => 'github' ],
  [ 'label' => 'LinkedIn',  'url' => 'https://www.linkedin.com/in/shaila-snigdha-82163a380', 'icon' => 'linkedin' ],
];

function icon($name) {
  $icons = [
    'mail' => '<svg viewBox=\"0 0 24 24\" width=\"18\" height=\"18\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><rect x=\"2\" y=\"4\" width=\"20\" height=\"16\" rx=\"3\"/><path d=\"M22 6L12 13 2 6\"/></svg>',
    'phone' => '<svg viewBox=\"0 0 24 24\" width=\"18\" height=\"18\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07A19.5 19.5 0 0 1 3.15 9.81 19.8 19.8 0 0 1 .08 1.18 2 2 0 0 1 2.06 0h3a2 2 0 0 1 2 1.72c.12.9.33 1.78.63 2.63a2 2 0 0 1-.45 2.11L6.1 7.9a16 16 0 0 0 6 6l1.44-1.14a2 2 0 0 1 2.11-.45c.85.3 1.73.51 2.63.63A2 2 0 0 1 22 16.92z\"/></svg>',
    'facebook' => '<svg viewBox=\"0 0 24 24\" width=\"18\" height=\"18\" fill=\"currentColor\"><path d=\"M22 12a10 10 0 1 0-11.5 9.9v-6.9H8v-3h2.5V9.5A3.5 3.5 0 0 1 14 6h3v3h-3a1 1 0 0 0-1 1V12h4l-.5 3h-3.5v6.9A10 10 0 0 0 22 12z\"/></svg>',
    'instagram' => '<svg viewBox=\"0 0 24 24\" width=\"18\" height=\"18\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\"><rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"5\"/><circle cx=\"12\" cy=\"12\" r=\"4\"/><circle cx=\"17.5\" cy=\"6.5\" r=\"1\"/></svg>',
    'github' => '<svg viewBox=\"0 0 24 24\" width=\"18\" height=\"18\" fill=\"currentColor\"><path d=\"M12 .5a12 12 0 0 0-3.79 23.4c.6.11.82-.26.82-.58v-2c-3.34.73-4.04-1.61-4.04-1.61-.55-1.41-1.34-1.79-1.34-1.79-1.09-.76.09-.75.09-.75 1.2.09 1.84 1.24 1.84 1.24 1.07 1.84 2.81 1.31 3.5 1 .11-.78.42-1.31.76-1.61-2.67-.3-5.47-1.34-5.47-5.95 0-1.31.47-2.38 1.24-3.23-.12-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 6 0c2.28-1.55 3.29-1.23 3.29-1.23.66 1.65.24 2.87.12 3.17.77.85 1.24 1.92 1.24 3.23 0 4.62-2.8 5.64-5.48 5.94.43.37.81 1.1.81 2.22v3.29c0 .32.22.7.82.58A12 12 0 0 0 12 .5z\"/></svg>',
    'linkedin' => '<svg viewBox=\"0 0 24 24\" width=\"18\" height=\"18\" fill=\"currentColor\"><path d=\"M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM0 8h5v16H0V8zm7.5 0h4.8v2.2h.07C13.77 8.93 15.4 7.6 17.83 7.6c5.06 0 6 3.33 6 7.66V24h-5v-6.9c0-1.65-.03-3.77-2.3-3.77-2.3 0-2.65 1.8-2.65 3.65V24h-5V8z\"/></svg>',
    'arrow' => '<svg viewBox=\"0 0 24 24\" width=\"16\" height=\"16\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M5 12h14\"/><path d=\"M13 5l7 7-7 7\"/></svg>',
  ];
  return $icons[$name] ?? '';
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($profile['name']) ?> — Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <header class="site-header">
    <div class="wrap nav">
      <nav class="menu">
        <a href="#about">About</a>
        <a href="#education">Education</a>
        <a href="#experience">Experience</a>
        <a href="#skills">Skills</a>
        <a href="#projects">Projects</a>
        <a href="#contact">Contact</a>
      </nav>
    </div>
  </header>

  <main class="wrap">
    <section class="hero card">
      <div class="hero-left">
        <h1>Hi, I'm <span><?= htmlspecialchars($profile['name']) ?></span></h1>
        <p class="tagline"><?= htmlspecialchars($profile['tagline']) ?></p>
        <div class="contact-row">
          <a class="chip" href="mailto:<?= htmlspecialchars($profile['email']) ?>"><?= icon('mail') ?><?= htmlspecialchars($profile['email']) ?></a>
          <a class="chip" href="tel:<?= htmlspecialchars($profile['phone']) ?>"><?= icon('phone') ?><?= htmlspecialchars($profile['phone']) ?></a>
        </div>
      </div>
      <div class="hero-right portrait"><img src="<?= htmlspecialchars($profile['avatar']) ?>" alt="Avatar" class="avatar-img"></div>
    </section>

    <section id="about">
      <h2>About</h2>
      <div class="card padded">
        <p>I'm a third-year CSE student at KUET. I enjoy building practical projects, collaborating with teams, and solving problems with a calm, structured approach.</p>
      </div>
    </section>

    <section id="education">
      <h2>Education</h2>
      <div class="timeline">
        <?php foreach ($education as $e): ?>
          <article class="timeline-item shine">
            <div class="year"><?= htmlspecialchars($e['year']) ?></div>
            <div>
              <div class="degree"><?= htmlspecialchars($e['title']) ?></div>
              <div class="place"><?= htmlspecialchars($e['place']) ?></div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="experience">
      <h2>Experience</h2>
      <div class="exp-list">
        <?php foreach ($experience as $x): ?>
          <div class="exp-item shine">• <?= htmlspecialchars($x) ?></div>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="skills">
      <h2>Skills</h2>
      <div class="badges">
        <?php foreach ($skills as $s): ?>
          <span class="badge"><?= htmlspecialchars($s) ?></span>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="projects">
      <h2>Projects</h2>
      <div class="grid">
        <?php foreach ($projects as $p): ?>
          <article class="proj shine">
            <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?> preview">
            <div class="meta">
              <h3><?= htmlspecialchars($p['title']) ?></h3>
              <div class="tags">
                <span class="pill"><?= htmlspecialchars($p['stack']) ?></span>
                <span class="pill"><?= htmlspecialchars($p['category']) ?></span>
              </div>
              <?php if (!empty($p['code']) && $p['code'] !== '#'): ?>
  <div class="links">
    <a class="chip" href="<?= htmlspecialchars($p['code']) ?>" target="_blank" rel="noopener"><?php echo icon('github'); ?>GitHub</a>
  </div>
<?php endif; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="contact">
      <h2>Contact & Socials</h2>
      <div class="card padded">
        <div class="socials">
          <?php foreach ($socials as $s): ?>
            <a class="chip" href="<?= htmlspecialchars($s['url']) ?>" target="_blank" rel="noopener" title="<?= htmlspecialchars($s['label']) ?>">
              <?= icon($s['icon']) ?><?= htmlspecialchars($s['label']) ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <footer class="footer">
      © <?= date('Y') ?> <?= htmlspecialchars($profile['name']) ?> — Built with ♥ in PHP
    </footer>
  </main>

  <script src="assets/script.js"></script>
</body>
</html>
