<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'NovaLabz - Solutions Web Innovantes'; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22 fill=%22%237B54F7%22>🪐</text></svg>">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Canvas des étoiles -->
    <canvas id="starsCanvas"></canvas>
    
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php?page=accueil" class="logo">
                <!--
                <svg width="40" height="40" viewBox="0 0 200 200">
                    <circle cx="100" cy="100" r="50" fill="url(#planetGradient)" class="planet-core"/>
                    <ellipse cx="100" cy="100" rx="75" ry="18" fill="none" stroke="url(#ringGradient)" 
                             stroke-width="3" transform="rotate(25 100 100)" class="planet-ring"/>
                    <defs>
                        <linearGradient id="planetGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#3A2DCE"/>
                            <stop offset="100%" stop-color="#7B54F7"/>
                        </linearGradient>
                        <linearGradient id="ringGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#7B54F7" stop-opacity="0.8"/>
                            <stop offset="100%" stop-color="#3A2DCE" stop-opacity="0.6"/>
                        </linearGradient>
                    </defs>
                </svg>
                <span class="logo-text">NOVALABZ</span>
                -->
                <img src="<?php echo $base; ?>img/logo_novalabz_blanc_long.png" alt="Logo NovaLabz" class="logo-image">
            </a>
            <ul class="nav-links">
                <li><a href="index.php?page=accueil" class="<?php echo ($page ?? 'accueil') === 'accueil' ? 'active' : ''; ?>">Accueil</a></li>
                <li><a href="index.php?page=tarifs" class="<?php echo ($page ?? '') === 'tarifs' ? 'active' : ''; ?>">Tarifs</a></li>
                <!--
                <li><a href="index.php?page=portfolio" class="<?php echo ($page ?? '') === 'portfolio' ? 'active' : ''; ?>">Portfolio</a></li>
                -->
                <li><a href="index.php?page=apropos" class="<?php echo ($page ?? '') === 'apropos' ? 'active' : ''; ?>">À Propos</a></li>
                <li><a href="index.php?page=contact" class="<?php echo ($page ?? '') === 'contact' ? 'active' : ''; ?>">Contact</a></li>
            </ul>
            <button class="mobile-menu-btn" aria-label="Menu mobile">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    
    <main class="content">