<?php
// URL de base du site (sert pour le canonical, og:image, JSON-LD...)
$__scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$__host   = $_SERVER['HTTP_HOST'] ?? '';
$__base   = $__scheme . '://' . $__host . rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');

// ------------------------------------------------------------------
// GALERIE AUTO-DÉFILANTE
// Ajoute simplement le chemin de tes images ci-dessous : elles seront
// répétées automatiquement (x2) pour un défilement infini sans couture.
// Exemple : 'assets/img/ma-photo.jpg',
// ------------------------------------------------------------------
$gallery = [
    'assets/img/projet1.png',
    'assets/img/projet2.png',
    'assets/img/projet3.png',
    'assets/img/profile.jpeg',
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espendi Piocel HOUNKANLIN — Développeur Web & UX/UI Designer à Cotonou</title>
    <meta name="description" content="Portfolio de Espendi Piocel HOUNKANLIN, Développeur Web & UX/UI Designer à Cotonou (Bénin). Création de sites web, applications et interfaces UI/UX modernes et performantes. Contact : pioceldev@gmail.com">
    <meta name="keywords" content="développeur web, bénin, cotonou, ui design, ux design, portfolio, espendi piocel hounkanlin, site web, application web, création de site, développeur front-end, php, sql, python">
    <meta name="author" content="Espendi Piocel HOUNKANLIN">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#09090b">
    <meta name="geo.region" content="BJ">
    <meta name="geo.placename" content="Cotonou">
    <link rel="canonical" href="<?php echo $__base; ?>/<?php echo basename($_SERVER['SCRIPT_NAME'] ?? '') === 'index.php' ? '' : basename($_SERVER['SCRIPT_NAME'] ?? ''); ?>">
    <link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
    <link rel="icon" type="image/png" sizes="180x180" href="assets/img/favicon-180.png">
    <link rel="apple-touch-icon" href="assets/img/favicon-180.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Espendi.Devs">
    <meta property="og:url" content="<?php echo $__base; ?>/<?php echo basename($_SERVER['SCRIPT_NAME'] ?? '') === 'index.php' ? '' : basename($_SERVER['SCRIPT_NAME'] ?? ''); ?>">
    <meta property="og:title" content="Espendi Piocel HOUNKANLIN — Développeur Web & UX/UI Designer">
    <meta property="og:description" content="Développeur Web & UX/UI Designer à Cotonou (Bénin). Sites web, applications et interfaces modernes. Découvrez mes projets et services.">
    <meta property="og:image" content="<?php echo $__base; ?>/assets/img/profile.jpeg">
    <meta property="og:locale" content="fr_FR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Espendi Piocel HOUNKANLIN — Développeur Web & UX/UI Designer">
    <meta name="twitter:description" content="Portfolio de Développeur Web & UX/UI Designer à Cotonou (Bénin).">
    <meta name="twitter:image" content="<?php echo $__base; ?>/assets/img/profile.jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Espendi Piocel HOUNKANLIN",
      "url": "<?php echo $__base; ?>/",
      "image": "<?php echo $__base; ?>/assets/img/profile.jpeg",
      "jobTitle": "Développeur Web & UX/UI Designer",
      "email": "mailto:pioceldev@gmail.com",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Cotonou",
        "addressCountry": "BJ"
      },
      "knowsAbout": ["PHP", "SQL", "Python", "JavaScript", "HTML5", "CSS3", "React", "UI Design", "UX Design", "Figma"]
    }
    </script>
</head>
<body>

    <!-- Effets de fond -->
    <div class="bg-blobs">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>
    <div class="bg-noise"></div>
    <div class="cursor-glow"></div>
    <div class="scroll-progress"></div>

    <!-- Header -->
    <header class="scrolled">
        <div class="container">
            <nav class="navbar">
                <a href="#accueil" class="logo" aria-label="Espendi.Devs — retour à l'accueil">
                    <span class="logo-mark" aria-hidden="true">E</span>
                    Espendi<span>.Devs</span>
                </a>
                <ul class="nav-links">
                    <li><a href="#accueil" class="active">Accueil</a></li>
                    <li><a href="#apropos">À propos</a></li>
                    <li><a href="#competences">Compétences</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#contact" class="nav-cta">Me contacter</a></li>
                </ul>
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Contenu principal -->

        <!-- Accueil -->
        <section class="hero" id="accueil">
            <div class="grid-overlay"></div>
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <div class="hero-badge">
                            Disponible pour de nouveaux projets
                        </div>
                        <h1>Hello, je suis <span class="name">Espendi Piocel HOUNKANLIN</span></h1>
                        <div class="typing-container">
                            <span class="prefix">&gt;</span>
                            <span class="typing-text" id="typing-text">Développeur Web</span>
                        </div>
                        <p class="lead">Passionné par la création d'expériences digitales innovantes qui allient esthétique, fonctionnalité et convivialité.</p>
                        <div class="hero-btns">
                            <a href="#portfolio" class="btn">
                                <i class="fas fa-briefcase"></i>
                                Voir mes projets
                            </a>
                            <a href="#contact" class="btn btn-outline">
                                <i class="fas fa-paper-plane"></i>
                                Me contacter
                            </a>
                        </div>
                        <div class="hero-socials">
                            <a href="mailto:pioceldev@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
                            <a href="https://wa.me/22968004201" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            <a href="mailto:pioceldev@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>

                    <div class="hero-visual">
                        <canvas id="hero-3d" class="hero-3d-canvas"></canvas>
                        <div class="tech-chip chip-1"><i class="fab fa-js js"></i> JavaScript</div>
                        <div class="tech-chip chip-2"><i class="fab fa-react react"></i> React</div>
                        <div class="tech-chip chip-3"><i class="fab fa-figma figma"></i> Figma</div>
                        <div class="avatar-frame">
                            <div class="avatar-ring"></div>
                            <div class="avatar-orbit"></div>
                            <div class="avatar-spark"></div>
                            <div class="avatar-wrap">
                                <img src="assets/img/profile.jpeg" alt="Espendi Piocel HOUNKANLIN" onerror="handleImageError(this)">
                                <div class="avatar-fallback"><span>EP</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-hint" onclick="document.getElementById('stats').scrollIntoView({behavior:'smooth'})">
                <i class="fas fa-arrow-down"></i>
                <span>Scrollez</span>
            </div>
        </section>

        <!-- Stats -->
        <section class="stats" id="stats">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item reveal">
                        <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
                        <div class="stat-number" data-count="30">0</div>
                        <div class="stat-text">Projets Réalisés</div>
                    </div>
                    <div class="stat-item reveal" style="--d: 0.1s">
                        <div class="stat-icon"><i class="fas fa-smile"></i></div>
                        <div class="stat-number" data-count="30">0</div>
                        <div class="stat-text">Clients Satisfaits</div>
                    </div>
                    <div class="stat-item reveal" style="--d: 0.2s">
                        <div class="stat-icon"><i class="fas fa-award"></i></div>
                        <div class="stat-number" data-count="2">0</div>
                        <div class="stat-text">Années d'Expérience</div>
                    </div>
                    <div class="stat-item reveal" style="--d: 0.3s">
                        <div class="stat-icon"><i class="fas fa-code"></i></div>
                        <div class="stat-number" data-count="127">0</div>
                        <div class="stat-text">Bugs Résolus</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- À propos -->
        <section class="section alt" id="apropos">
            <div class="container">
                <div class="section-head reveal">
                    <span class="section-tag">À propos</span>
                    <h2>Qui suis-<span class="grad-text">je ?</span></h2>
                    <p>Découvrez mon parcours et ma passion pour le développement web et le design</p>
                </div>
                <div class="about-content">
                    <div class="about-img-wrap reveal reveal-ltr">
                        <div class="avatar-wrap">
                            <img src="assets/img/profile.jpeg" alt="Espendi Piocel HOUNKANLIN" onerror="handleImageError(this)">
                            <div class="avatar-fallback"><span>EP</span></div>
                        </div>
                        <div class="about-exp">
                            <div class="num">2+</div>
                            <div class="label">Années d'expérience</div>
                        </div>
                    </div>
                    <div class="about-text reveal reveal-rtl" style="--d: 0.15s">
                        <h3>Développeur Web <span class="grad-text">&</span> UX/UI Designer</h3>
                        <p>Passionné par la création d'interfaces utilisateur intuitives et esthétiques, je combine mes compétences en développement front-end et en design pour concevoir des expériences digitales mémorables.</p>
                        <p>Avec plus de 2 ans d'expérience, j'ai travaillé sur divers projets allant des sites vitrines aux applications web complexes, en mettant toujours l'utilisateur au centre de mes préoccupations.</p>
                        <ul class="about-list">
                            <li><i class="fas fa-check-circle"></i> Développement Front-end</li>
                            <li><i class="fas fa-check-circle"></i> UX / UI Design</li>
                            <li><i class="fas fa-check-circle"></i> Applications Web</li>
                            <li><i class="fas fa-check-circle"></i> Sites Vitrines</li>
                        </ul>
                        <a href="assets/img/espendi-cv.png" download="espendi-cv.png" class="btn">
                            <i class="fas fa-download"></i>
                            Télécharger mon CV
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compétences -->
        <section class="section" id="competences">
            <div class="container">
                <div class="section-head reveal">
                    <span class="section-tag">Compétences</span>
                    <h2>Mes <span class="grad-text">Compétences</span></h2>
                    <p>PHP, SQL, Python, JavaScript et design — mon arsenal complet</p>
                </div>

                <div class="skills-block reveal reveal-ltr">
                    <h3 class="skills-block-title"><i class="fas fa-code"></i> Développement & Données</h3>
                    <div class="skills-rings">
                        <div class="skill-ring reveal" data-percent="90">
                            <div class="ring-wrap">
                                <svg viewBox="0 0 120 120">
                                    <circle class="ring-bg" cx="60" cy="60" r="52"></circle>
                                    <circle class="ring-fg" cx="60" cy="60" r="52"></circle>
                                </svg>
                                <div class="ring-center"><i class="fab fa-php"></i><span class="ring-pct">90%</span></div>
                            </div>
                            <p class="ring-name">PHP</p>
                        </div>
                        <div class="skill-ring reveal" data-percent="85" style="--d: 0.08s">
                            <div class="ring-wrap">
                                <svg viewBox="0 0 120 120">
                                    <circle class="ring-bg" cx="60" cy="60" r="52"></circle>
                                    <circle class="ring-fg" cx="60" cy="60" r="52"></circle>
                                </svg>
                                <div class="ring-center"><i class="fas fa-database"></i><span class="ring-pct">85%</span></div>
                            </div>
                            <p class="ring-name">SQL / MySQL</p>
                        </div>
                        <div class="skill-ring reveal" data-percent="80" style="--d: 0.16s">
                            <div class="ring-wrap">
                                <svg viewBox="0 0 120 120">
                                    <circle class="ring-bg" cx="60" cy="60" r="52"></circle>
                                    <circle class="ring-fg" cx="60" cy="60" r="52"></circle>
                                </svg>
                                <div class="ring-center"><i class="fab fa-python"></i><span class="ring-pct">80%</span></div>
                            </div>
                            <p class="ring-name">Python</p>
                        </div>
                        <div class="skill-ring reveal" data-percent="88" style="--d: 0.24s">
                            <div class="ring-wrap">
                                <svg viewBox="0 0 120 120">
                                    <circle class="ring-bg" cx="60" cy="60" r="52"></circle>
                                    <circle class="ring-fg" cx="60" cy="60" r="52"></circle>
                                </svg>
                                <div class="ring-center"><i class="fab fa-js"></i><span class="ring-pct">88%</span></div>
                            </div>
                            <p class="ring-name">JavaScript</p>
                        </div>
                    </div>
                </div>

                <div class="skills-block reveal reveal-rtl" style="--d: 0.12s">
                    <h3 class="skills-block-title"><i class="fas fa-palette"></i> Front-end & Design</h3>
                    <div class="skills-rings">
                        <div class="skill-ring reveal" data-percent="95">
                            <div class="ring-wrap">
                                <svg viewBox="0 0 120 120">
                                    <circle class="ring-bg" cx="60" cy="60" r="52"></circle>
                                    <circle class="ring-fg" cx="60" cy="60" r="52"></circle>
                                </svg>
                                <div class="ring-center"><i class="fab fa-html5"></i><span class="ring-pct">95%</span></div>
                            </div>
                            <p class="ring-name">HTML5 / CSS3</p>
                        </div>
                        <div class="skill-ring reveal" data-percent="78" style="--d: 0.08s">
                            <div class="ring-wrap">
                                <svg viewBox="0 0 120 120">
                                    <circle class="ring-bg" cx="60" cy="60" r="52"></circle>
                                    <circle class="ring-fg" cx="60" cy="60" r="52"></circle>
                                </svg>
                                <div class="ring-center"><i class="fab fa-react"></i><span class="ring-pct">78%</span></div>
                            </div>
                            <p class="ring-name">React / Vue.js</p>
                        </div>
                        <div class="skill-ring reveal" data-percent="90" style="--d: 0.16s">
                            <div class="ring-wrap">
                                <svg viewBox="0 0 120 120">
                                    <circle class="ring-bg" cx="60" cy="60" r="52"></circle>
                                    <circle class="ring-fg" cx="60" cy="60" r="52"></circle>
                                </svg>
                                <div class="ring-center"><i class="fas fa-palette"></i><span class="ring-pct">90%</span></div>
                            </div>
                            <p class="ring-name">UI / UX Design</p>
                        </div>
                        <div class="skill-ring reveal" data-percent="85" style="--d: 0.24s">
                            <div class="ring-wrap">
                                <svg viewBox="0 0 120 120">
                                    <circle class="ring-bg" cx="60" cy="60" r="52"></circle>
                                    <circle class="ring-fg" cx="60" cy="60" r="52"></circle>
                                </svg>
                                <div class="ring-center"><i class="fab fa-figma"></i><span class="ring-pct">85%</span></div>
                            </div>
                            <p class="ring-name">Figma</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services (scroll horizontal) -->
        <div class="hscroll" id="services">
            <div class="hscroll-sticky">
                <div class="hscroll-head">
                    <div>
                        <span class="section-tag">Services</span>
                        <h2>Ce que je peux <span class="grad-text">vous apporter</span></h2>
                    </div>
                    <div class="hint"><i class="fas fa-arrow-right"></i> Scroll →</div>
                </div>
                <div class="hscroll-track" data-hscroll>
                    <div class="hscroll-panel">
                        <span class="hscroll-num">01</span>
                        <div class="hscroll-icon"><i class="fas fa-laptop-code"></i></div>
                        <h3>Développement Web</h3>
                        <p>Création de sites web responsifs et d'applications web performantes avec les dernières technologies.</p>
                    </div>
                    <div class="hscroll-panel">
                        <span class="hscroll-num">02</span>
                        <div class="hscroll-icon"><i class="fas fa-palette"></i></div>
                        <h3>UI Design</h3>
                        <p>Conception d'interfaces utilisateur esthétiques, intuitives et cohérentes avec votre identité.</p>
                    </div>
                    <div class="hscroll-panel">
                        <span class="hscroll-num">03</span>
                        <div class="hscroll-icon"><i class="fas fa-user-friends"></i></div>
                        <h3>UX Design</h3>
                        <p>Optimisation de l'expérience utilisateur pour des parcours fluides et une satisfaction maximale.</p>
                    </div>
                    <div class="hscroll-panel hscroll-cta">
                        <h3>Un projet en tête ?</h3>
                        <p>Discutons de votre prochain projet et trouvons la meilleure solution ensemble.</p>
                        <a href="#contact" class="btn">Me contacter</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio (scroll horizontal) -->
        <div class="hscroll" id="portfolio">
            <div class="hscroll-sticky">
                <div class="hscroll-head">
                    <div>
                        <span class="section-tag">Portfolio</span>
                        <h2>Mes <span class="grad-text">Réalisations</span></h2>
                    </div>
                    <div class="hint"><i class="fas fa-arrow-right"></i> Scroll →</div>
                </div>
                <div class="hscroll-track" data-hscroll>
                    <div class="hscroll-panel" style="padding:0;overflow:hidden;">
                        <div class="portfolio-img" style="background-image: url('assets/img/projet1.png');position:absolute;inset:0;"></div>
                        <div class="portfolio-overlay" style="opacity:1;">
                            <span class="portfolio-cat">Développement Web</span>
                            <h3>Site de Recherche d'Emploi</h3>
                            <p>Plateforme de recherche d'emploi avec moteur de recherche avancé, dépôt de CV et alertes personnalisées.</p>
                            <a href="https://github.com/pioceldev" target="_blank" rel="noopener" class="btn"><i class="fab fa-github"></i> Voir le code</a>
                        </div>
                    </div>
                    <div class="hscroll-panel" style="padding:0;overflow:hidden;">
                        <div class="portfolio-img" style="background-image: url('assets/img/projet2.png');position:absolute;inset:0;"></div>
                        <div class="portfolio-overlay" style="opacity:1;">
                            <span class="portfolio-cat">Développement Web</span>
                            <h3>Générateur de Factures</h3>
                            <p>Génération automatique de factures pour entreprises : devis, facturation et suivi des paiements.</p>
                            <a href="https://github.com/pioceldev" target="_blank" rel="noopener" class="btn"><i class="fab fa-github"></i> Voir le code</a>
                        </div>
                    </div>
                    <div class="hscroll-panel" style="padding:0;overflow:hidden;">
                        <div class="portfolio-img" style="background-image: url('assets/img/projet3.png');position:absolute;inset:0;"></div>
                        <div class="portfolio-overlay" style="opacity:1;">
                            <span class="portfolio-cat">Développement Web</span>
                            <h3>Réservation Restaurant</h3>
                            <p>Système de réservation en ligne pour restaurant avec gestion des tables et confirmation automatique.</p>
                            <a href="https://github.com/pioceldev" target="_blank" rel="noopener" class="btn"><i class="fab fa-github"></i> Voir le code</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galerie auto-défilante -->
        <section class="section alt gallery-section" id="galerie">
            <div class="container">
                <div class="section-head reveal">
                    <span class="section-tag">Galerie</span>
                    <h2>Ma <span class="grad-text">Galerie</span></h2>
                    <p>Un aperçu en images — le défilement est automatique</p>
                </div>
            </div>
            <div class="gallery" aria-label="Galerie de réalisations">
                <?php foreach ([false, true] as $__reverse): ?>
                <div class="gallery-row<?php echo $__reverse ? ' reverse' : ''; ?>">
                    <div class="gallery-track">
                        <?php for ($__copy = 0; $__copy < 2; $__copy++): ?>
                            <?php foreach ($gallery as $__img): ?>
                            <figure class="gallery-item">
                                <img src="<?php echo htmlspecialchars($__img, ENT_QUOTES); ?>" alt="Réalisation" loading="lazy" onerror="this.classList.add('img-error')">
                            </figure>
                            <?php endforeach; ?>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Processus -->
        <section class="section alt" id="processus">
            <div class="container">
                <div class="section-head reveal">
                    <span class="section-tag">Processus</span>
                    <h2>Mon Processus <span class="grad-text">de Travail</span></h2>
                    <p>Comment je transforme vos idées en solutions digitales</p>
                </div>
                <div class="process-steps">
                    <div class="process-step reveal">
                        <div class="process-icon"><i class="fas fa-lightbulb"></i></div>
                        <h3>Découverte & Analyse</h3>
                        <p>Compréhension approfondie de vos besoins, objectifs et public cible.</p>
                    </div>
                    <div class="process-step reveal" style="--d: 0.12s">
                        <div class="process-icon"><i class="fas fa-pencil-ruler"></i></div>
                        <h3>Conception & Prototypage</h3>
                        <p>Création de wireframes, maquettes et prototypes interactifs.</p>
                    </div>
                    <div class="process-step reveal" style="--d: 0.24s">
                        <div class="process-icon"><i class="fas fa-code"></i></div>
                        <h3>Développement</h3>
                        <p>Implémentation technique avec les meilleures pratiques de codage.</p>
                    </div>
                    <div class="process-step reveal" style="--d: 0.36s">
                        <div class="process-icon"><i class="fas fa-rocket"></i></div>
                        <h3>Lancement & Optimisation</h3>
                        <p>Déploiement, tests et améliorations continues basées sur les retours.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Témoignages -->
        <section class="section testimonials">
            <div class="container">
                <div class="section-head reveal">
                    <span class="section-tag">Témoignages</span>
                    <h2>Ce que disent <span class="grad-text">mes clients</span></h2>
                    <p>La confiance de mes clients est ma meilleure référence</p>
                </div>
                <div class="testimonials-slider reveal">
                    <div class="testimonials-container">
                        <div class="testimonial">
                            <div class="testimonial-img-wrap">
                                <img src="assets/img/achille.png" alt="Achille MTCH" onerror="handleImageError(this)">
                                <div class="testimonial-fallback">AM</div>
                            </div>
                            <div class="testimonial-text">
                                "Espendi a transformé notre vision en une plateforme exceptionnelle. Son professionnalisme et sa créativité ont dépassé nos attentes. Le site qu'il a développé pour nous a considérablement augmenté notre taux de conversion."
                            </div>
                            <div class="testimonial-author">Achille MTCH</div>
                            <div class="testimonial-role">Développeur Web</div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-img-wrap">
                                <img src="assets/img/math.jpg" alt="Mathilde Sophie" onerror="handleImageError(this)">
                                <div class="testimonial-fallback">MS</div>
                            </div>
                            <div class="testimonial-text">
                                "Le travail d'Espendi sur notre interface utilisateur a considérablement amélioré l'engagement de nos clients. Son approche centrée sur l'utilisateur et son attention aux détails font de lui un partenaire précieux. Je le recommande vivement !"
                            </div>
                            <div class="testimonial-author">Mathilde Sophie</div>
                            <div class="testimonial-role">Développeuse / E-commerce</div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-img-wrap">
                                <img src="assets/img/jp.jpg" alt="Jean Paul" onerror="handleImageError(this)">
                                <div class="testimonial-fallback">JP</div>
                            </div>
                            <div class="testimonial-text">
                                "Un professionnel talentueux qui comprend parfaitement les besoins business. Notre application a connu une augmentation de 40% des conversions après son intervention. Espendi allie parfaitement compétences techniques et sens du design."
                            </div>
                            <div class="testimonial-author">Jean Paul</div>
                            <div class="testimonial-role">Développeur Full-stack</div>
                        </div>
                    </div>
                    <div class="slider-controls">
                        <button class="slider-btn active" aria-label="Témoignage 1"></button>
                        <button class="slider-btn" aria-label="Témoignage 2"></button>
                        <button class="slider-btn" aria-label="Témoignage 3"></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog -->
        <section class="section alt blog" id="blog">
            <div class="container">
                <div class="section-head reveal">
                    <span class="section-tag">Blog</span>
                    <h2>Blog & <span class="grad-text">Ressources</span></h2>
                    <p>Derniers articles et réflexions sur le design et le développement</p>
                </div>
                <div class="blog-grid">
                    <div class="blog-card reveal reveal-ltr">
                        <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');"></div>
                        <div class="blog-content">
                            <div class="blog-date"><i class="fas fa-calendar-alt"></i> 26 Juin 2025</div>
                            <h3>Les tendances UX/UI à suivre en 2026</h3>
                            <p>Découvrez les nouvelles approches en matière de design d'interface et d'expérience utilisateur qui transformeront vos projets digitaux.</p>
                            <a href="#" class="btn btn-outline">Lire l'article</a>
                        </div>
                    </div>
                    <div class="blog-card reveal reveal-rtl" style="--d: 0.12s">
                        <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=967&q=80');"></div>
                        <div class="blog-content">
                            <div class="blog-date"><i class="fas fa-calendar-alt"></i> 2 Septembre 2025</div>
                            <h3>Optimiser les performances web</h3>
                            <p>Techniques avancées pour améliorer la vitesse de chargement de vos applications et offrir une expérience utilisateur fluide.</p>
                            <a href="#" class="btn btn-outline">Lire l'article</a>
                        </div>
                    </div>
                    <div class="blog-card reveal reveal-ltr" style="--d: 0.24s">
                        <div class="blog-img" style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1050&q=80');"></div>
                        <div class="blog-content">
                            <div class="blog-date"><i class="fas fa-calendar-alt"></i> 3 Octobre 2025</div>
                            <h3>Accessibilité numérique</h3>
                            <p>Pourquoi et comment rendre vos interfaces accessibles à tous les utilisateurs, y compris ceux en situation de handicap.</p>
                            <a href="#" class="btn btn-outline">Lire l'article</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Certifications -->
        <section class="section" id="certifications">
            <div class="container">
                <div class="section-head reveal">
                    <span class="section-tag">Certifications</span>
                    <h2>Certifications & <span class="grad-text">Formations</span></h2>
                    <p>Mes qualifications et compétences validées</p>
                </div>
                <div class="certifications-grid">
                    <div class="certification-card reveal">
                        <div class="certification-icon"><i class="fas fa-graduation-cap"></i></div>
                        <h3>Google UX Design Certificate</h3>
                        <p>Certification professionnelle en design d'expérience utilisateur</p>
                        <div class="certification-date">2025</div>
                    </div>
                    <div class="certification-card reveal" style="--d: 0.1s">
                        <div class="certification-icon"><i class="fas fa-code"></i></div>
                        <h3>Full Stack Development</h3>
                        <p>Formation avancée en développement web full stack</p>
                        <div class="certification-date">2024</div>
                    </div>
                    <div class="certification-card reveal" style="--d: 0.2s">
                        <div class="certification-icon"><i class="fas fa-palette"></i></div>
                        <h3>UI Design Specialization</h3>
                        <p>Spécialisation en design d'interface utilisateur</p>
                        <div class="certification-date">2023</div>
                    </div>
                    <div class="certification-card reveal" style="--d: 0.3s">
                        <div class="certification-icon"><i class="fas fa-mobile-alt"></i></div>
                        <h3>Mobile App Design</h3>
                        <p>Certification en conception d'applications mobiles</p>
                        <div class="certification-date">2022</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section class="section alt contact" id="contact">
            <div class="container">
                <div class="section-head reveal">
                    <span class="section-tag">Contact</span>
                    <h2>Travaillons <span class="grad-text">ensemble</span></h2>
                    <p>Parlons de votre prochain projet</p>
                </div>
                <div class="contact-content">
                    <div class="contact-info reveal reveal-ltr">
                        <h3>Parlons de votre projet</h3>
                        <p>N'hésitez pas à me contacter pour discuter de votre projet. Je serais ravi de contribuer à sa réussite et de vous accompagner dans la réalisation de vos objectifs digitaux.</p>

                        <div class="contact-details">
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="contact-detail-text">
                                    <h4>Adresse</h4>
                                    <p>Cotonou, Bénin</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fas fa-phone"></i></div>
                                <div class="contact-detail-text">
                                    <h4>Téléphone</h4>
                                    <p>+229 01 68 00 42 01</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                <div class="contact-detail-text">
                                    <h4>Email</h4>
                                    <p>pioceldev@gmail.com / espendidev@gmail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="social-links">
                            <a href="mailto:pioceldev@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
                            <a href="https://wa.me/22968004201" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>

                    <div class="contact-form reveal reveal-rtl" style="--d: 0.15s">
                        <form action="contact.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="nom" placeholder="Votre nom" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Votre email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="sujet" placeholder="Sujet" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" placeholder="Votre message" required></textarea>
                            </div>
                            <input type="text" name="website" tabindex="-1" autocomplete="off" style="display:none" aria-hidden="true">
                            <button type="submit" class="btn">
                                <i class="fas fa-paper-plane"></i>
                                Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <a href="#accueil" class="logo" style="margin-bottom: 18px;" aria-label="Espendi.Devs — retour à l'accueil">
                            <span class="logo-mark" aria-hidden="true">E</span>
                            Espendi<span>.Devs</span>
                        </a>
                        <div class="footer-about">
                            <p>Développeur Web & UX/UI Designer passionné par la création d'expériences digitales innovantes qui allient esthétique, fonctionnalité et convivialité.</p>
                        </div>
                        <div class="footer-social">
                            <a href="mailto:pioceldev@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
                            <a href="https://wa.me/22968004201" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="footer-column">
                        <h3>Liens rapides</h3>
                        <ul class="footer-links">
                            <li><a href="#accueil">Accueil</a></li>
                            <li><a href="#apropos">À propos</a></li>
                            <li><a href="#competences">Compétences</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#portfolio">Portfolio</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Services</h3>
                        <ul class="footer-links">
                            <li><a href="#services">Développement Web</a></li>
                            <li><a href="#services">UI Design</a></li>
                            <li><a href="#services">UX Design</a></li>
                            <li><a href="#contact">Consulting</a></li>
                            <li><a href="#contact">Formation</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Contact</h3>
                        <ul class="footer-links">
                            <li><i class="fas fa-map-marker-alt"></i>Cotonou, Bénin</li>
                            <li><i class="fas fa-phone"></i>+229 01 68 00 42 01</li>
                            <li><i class="fas fa-envelope"></i>pioceldev@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; 2026 <span>Espendi Piocel HOUNKANLIN</span>. Tous droits réservés.</p>
                </div>
            </div>
        </footer>



    <!-- Boutons flottants -->
    <div class="float-btns">
        <a href="https://wa.me/22968004201" target="_blank" rel="noopener" class="float-btn whatsapp" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <button class="float-btn top-btn" aria-label="Revenir au début"><i class="fas fa-arrow-up"></i></button>
    </div>

<script>
// =============================================
// UTILITAIRES
// =============================================

function handleImageError(img) {
    img.remove();
    const wrap = img.closest('.avatar-wrap, .testimonial-img-wrap');
    if (wrap) wrap.classList.add('no-img');
}

// =============================================
// OBJET 3D INTERACTIF (hero)
// =============================================

function initHeroObject() {
    const canvas = document.getElementById('hero-3d');
    if (!canvas || typeof THREE === 'undefined' || window.innerWidth < 768) return;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 100);
    camera.position.z = 7;

    let renderer;
    try {
        renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
    } catch (e) {
        return;
    }
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    const container = canvas.parentElement;
    function resize() {
        const w = container.clientWidth || 400;
        const h = container.clientHeight || w;
        renderer.setSize(w, h, false);
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
    }
    resize();
    window.addEventListener('resize', resize);

    const outerWire = new THREE.LineSegments(
        new THREE.EdgesGeometry(new THREE.IcosahedronGeometry(2.4, 1)),
        new THREE.LineBasicMaterial({ color: 0x8b5cf6, transparent: true, opacity: 0.8 })
    );

    const innerWire = new THREE.LineSegments(
        new THREE.EdgesGeometry(new THREE.IcosahedronGeometry(1.6, 1)),
        new THREE.LineBasicMaterial({ color: 0xa78bfa, transparent: true, opacity: 0.6 })
    );

    const group = new THREE.Group();
    group.add(outerWire);
    group.add(innerWire);
    scene.add(group);

    let mx = 0, my = 0;
    document.addEventListener('mousemove', (e) => {
        mx = (e.clientX / window.innerWidth - 0.5) * 2;
        my = (e.clientY / window.innerHeight - 0.5) * 2;
    });

    function animate() {
        requestAnimationFrame(animate);
        outerWire.rotation.y += 0.005;
        outerWire.rotation.z += 0.0015;
        innerWire.rotation.y -= 0.008;
        innerWire.rotation.x += 0.004;
        group.rotation.x += (my * 0.4 - group.rotation.x) * 0.04;
        group.rotation.y += (mx * 0.5 - group.rotation.y) * 0.04;
        renderer.render(scene, camera);
    }
    animate();
}

// =============================================
// SITE HORIZONTAL : plus de scroll vertical,
// le scroll fait avancer les sections latéralement
// =============================================

function setupHscroll() {
    document.querySelectorAll('[data-hscroll]').forEach(track => {
        const container = track.closest('.hscroll');
        if (!container) return;

        function update() {
            const rect = container.getBoundingClientRect();
            const vh = window.innerHeight;
            const raw = -rect.top / (rect.height - vh);
            const p = Math.max(0, Math.min(1, raw));
            const maxTranslate = track.scrollWidth - window.innerWidth;
            track.style.transform = 'translateX(' + (-p * maxTranslate) + 'px)';
        }

        window.addEventListener('scroll', update, { passive: true });
        window.addEventListener('resize', update);
        update();
    });
}

// =============================================
// FORMULAIRE DE CONTACT
// =============================================

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = 'notification ' + (type || '');
    notification.innerHTML =
        '<div class="notification-content">' +
            '<i class="fas ' + (type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle') + '"></i>' +
            '<span>' + message + '</span>' +
        '</div>';
    document.body.appendChild(notification);
    setTimeout(() => notification.classList.add('show'), 100);
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            if (notification.parentNode) notification.parentNode.removeChild(notification);
        }, 300);
    }, 5000);
}

function setupContactForm() {
    const form = document.querySelector('.contact-form form');
    if (!form) return;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = {
            nom: (this.nom && this.nom.value.trim()) || '',
            email: (this.email && this.email.value.trim()) || '',
            sujet: (this.sujet && this.sujet.value.trim()) || '',
            message: (this.message && this.message.value.trim()) || ''
        };

        if (!formData.nom || !formData.email || !formData.sujet || !formData.message) {
            showNotification('Veuillez remplir tous les champs.', 'error');
            return;
        }
        if (!isValidEmail(formData.email)) {
            showNotification('Email invalide.', 'error');
            return;
        }

        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
        submitBtn.disabled = true;

        try {
            const response = await fetch('contact.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams(new FormData(form)).toString()
            });

            let data = {};
            try { data = await response.json(); } catch (err) { /* réponse non-JSON */ }

            if (data.success) {
                showNotification(data.message || 'Message envoyé !', 'success');
                form.reset();
            } else {
                showNotification(data.message || 'Erreur lors de l\'envoi. Réessayez.', 'error');
            }
        } catch (error) {
            showNotification('Erreur réseau. Réessayez ou écrivez à pioceldev@gmail.com.', 'error');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });
}

// =============================================
// ANIMATIONS
// =============================================

function setupTypingAnimation() {
    const typingText = document.getElementById('typing-text');
    if (!typingText) return;

    const texts = ['Développeur Web', 'UX & UI Designer'];
    let textIndex = 0, charIndex = 0, isDeleting = false;

    function typeText() {
        const currentText = texts[textIndex];
        if (isDeleting) {
            typingText.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            typingText.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
        }

        let speed = isDeleting ? 50 : 110;
        if (!isDeleting && charIndex === currentText.length) {
            isDeleting = true;
            speed = 1400;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            speed = 500;
        }
        setTimeout(typeText, speed);
    }
    setTimeout(typeText, 800);
}

function setupStatsAnimation() {
    const statNumbers = document.querySelectorAll('.stat-number');
    if (statNumbers.length === 0) return;

    let statsAnimated = false;

    function animateStats() {
        if (statsAnimated) return;
        statsAnimated = true;
        statNumbers.forEach(stat => {
            const target = parseInt(stat.getAttribute('data-count'), 10);
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                stat.textContent = Math.floor(current);
            }, 30);
        });
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) animateStats();
        });
    }, { threshold: 0.3 });
    observer.observe(document.querySelector('.stats'));
}

function setupSkillsAnimation() {
    const rings = document.querySelectorAll('.skill-ring');
    if (rings.length === 0) return;

    const C = 2 * Math.PI * 52; // circonférence du cercle (r=52 du viewBox)
    const ns = 'http://www.w3.org/2000/svg';

    rings.forEach(ring => {
        const svg = ring.querySelector('svg');
        if (!svg) return;

        // Dégradé émeraude → menthe injecté dans chaque anneau
        const defs = document.createElementNS(ns, 'defs');
        const grad = document.createElementNS(ns, 'linearGradient');
        const id = 'ring-grad-' + Math.random().toString(36).slice(2, 9);
        grad.setAttribute('id', id);
        grad.setAttribute('x1', '0%');
        grad.setAttribute('y1', '0%');
        grad.setAttribute('x2', '100%');
        grad.setAttribute('y2', '100%');
        const stop1 = document.createElementNS(ns, 'stop');
        stop1.setAttribute('offset', '0%');
        stop1.setAttribute('stop-color', '#8b5cf6');
        const stop2 = document.createElementNS(ns, 'stop');
        stop2.setAttribute('offset', '100%');
        stop2.setAttribute('stop-color', '#a78bfa');
        grad.appendChild(stop1);
        grad.appendChild(stop2);
        defs.appendChild(grad);
        svg.insertBefore(defs, svg.firstChild);

        const fg = ring.querySelector('.ring-fg');
        fg.style.stroke = 'url(#' + id + ')';
        fg.style.strokeDasharray = C;
    });

    const animate = (ring) => {
        const pct = parseInt(ring.dataset.percent, 10) || 0;
        const fg = ring.querySelector('.ring-fg');
        const pctEl = ring.querySelector('.ring-pct');
        fg.style.strokeDashoffset = C * (1 - pct / 100);

        // Compteur animé 0 → n%
        const dur = 1700;
        const start = performance.now();
        const tick = (now) => {
            const p = Math.min((now - start) / dur, 1);
            const eased = 1 - Math.pow(1 - p, 3);
            pctEl.textContent = Math.round(eased * pct) + '%';
            if (p < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
    };

    const target = document.querySelector('.skills-rings');
    if (!target) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            rings.forEach(animate);
            observer.disconnect();
        });
    }, { threshold: 0.25 });
    observer.observe(target);
}

function setupScrollAnimations() {
    const elements = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });
    elements.forEach(el => observer.observe(el));
}

function setupCardGlow() {
    document.querySelectorAll('.service-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const r = card.getBoundingClientRect();
            card.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100) + '%');
            card.style.setProperty('--my', ((e.clientY - r.top) / r.height * 100) + '%');
        });
    });
}

// =============================================
// TILT 3D DES CARTES (suit la souris)
// =============================================

function setupTilt() {
    if (window.matchMedia('(pointer: coarse)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    document.querySelectorAll('.service-card, .certification-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const r = card.getBoundingClientRect();
            const x = (e.clientX - r.left) / r.width - 0.5;
            const y = (e.clientY - r.top) / r.height - 0.5;
            card.style.transform =
                'perspective(900px) rotateY(' + (x * 10).toFixed(2) + 'deg) rotateX(' + (-y * 10).toFixed(2) + 'deg) translateY(-6px)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });
}

// =============================================
// BOUTONS MAGNÉTIQUES (hero)
// =============================================

function setupMagneticButtons() {
    if (window.matchMedia('(pointer: coarse)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    document.querySelectorAll('.hero-btns .btn').forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const r = btn.getBoundingClientRect();
            const x = (e.clientX - r.left - r.width / 2) * 0.25;
            const y = (e.clientY - r.top - r.height / 2) * 0.25;
            btn.style.transform = 'translate(' + x.toFixed(1) + 'px, ' + y.toFixed(1) + 'px)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = '';
        });
    });
}

// =============================================
// NAVIGATION & UI
// =============================================

function setupMobileMenu() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    if (!menuToggle || !navLinks) return;

    menuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        menuToggle.classList.toggle('active');
        const icon = menuToggle.querySelector('i');
        icon.className = navLinks.classList.contains('active') ? 'fas fa-times' : 'fas fa-bars';
    });

    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
            menuToggle.classList.remove('active');
            menuToggle.querySelector('i').className = 'fas fa-bars';
        });
    });
}

function setupPortfolioFilters() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    if (filterBtns.length === 0 || portfolioItems.length === 0) return;

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');

            portfolioItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.85)';
                    setTimeout(() => { item.style.display = 'none'; }, 300);
                }
            });
        });
    });
}

function setupTestimonialsSlider() {
    const container = document.querySelector('.testimonials-container');
    const btns = document.querySelectorAll('.slider-btn');
    const slides = document.querySelectorAll('.testimonial');
    if (!container || btns.length === 0) return;

    let currentSlide = 0;
    let autoSlide;

    function updateSlider() {
        container.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';
        btns.forEach((btn, index) => btn.classList.toggle('active', index === currentSlide));
    }

    function startAuto() {
        autoSlide = setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlider();
        }, 5000);
    }

    btns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            currentSlide = index;
            updateSlider();
            clearInterval(autoSlide);
            startAuto();
        });
    });

    container.addEventListener('mouseenter', () => clearInterval(autoSlide));
    container.addEventListener('mouseleave', startAuto);
    startAuto();
}

function setupCursorGlow() {
    const glow = document.querySelector('.cursor-glow');
    if (!glow || window.matchMedia('(pointer: coarse)').matches) return;

    let x = window.innerWidth / 2, y = window.innerHeight / 3;
    let tx = x, ty = y;

    document.addEventListener('mousemove', (e) => {
        tx = e.clientX;
        ty = e.clientY;
    });

    (function loop() {
        x += (tx - x) * 0.07;
        y += (ty - y) * 0.07;
        glow.style.transform = 'translate(' + (x - 300) + 'px, ' + (y - 300) + 'px)';
        requestAnimationFrame(loop);
    })();
}

// =============================================
// NAV ACTIVE + TOP BTN (scroll vertical)
// =============================================

function setupNavActive() {
    const sections = document.querySelectorAll('section[id], .hscroll[id]');
    const navLinks = document.querySelectorAll('.nav-links a:not(.nav-cta)');
    if (sections.length === 0 || navLinks.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.id;
                navLinks.forEach(link => {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                });
            }
        });
    }, { threshold: 0.3 });

    sections.forEach(section => observer.observe(section));
}

function setupTopBtn() {
    const topBtn = document.querySelector('.top-btn');
    if (!topBtn) return;

    window.addEventListener('scroll', () => {
        topBtn.classList.toggle('show', window.scrollY > 400);
    }, { passive: true });

    topBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Barre de progression du scroll
    const progressBar = document.querySelector('.scroll-progress');
    if (progressBar) {
        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            progressBar.style.width = (docHeight > 0 ? (scrollTop / docHeight) * 100 : 0) + '%';
        }, { passive: true });
    }
}

// =============================================
// INITIALISATION
// =============================================

document.addEventListener('DOMContentLoaded', function() {
    initHeroObject();
    setupHscroll();
    setupNavActive();
    setupTopBtn();
    setupTilt();
    setupMagneticButtons();
    setupContactForm();
    setupTypingAnimation();
    setupStatsAnimation();
    setupSkillsAnimation();
    setupScrollAnimations();
    setupCardGlow();
    setupMobileMenu();
    setupPortfolioFilters();
    setupTestimonialsSlider();
    setupCursorGlow();
});
</script>

</body>
</html>
