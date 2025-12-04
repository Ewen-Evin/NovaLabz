<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Novalabz - Exploring the Future of Web Creation' ?></title>
    <meta name="description" content="<?= $description ?? 'Création de sites web innovants et solutions numériques premium' ?>">
    
    <!-- CHEMINS ABSOLUS POUR LARAGON -->
    <link rel="stylesheet" href="/NovaLabz/public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Définir BASE pour JavaScript -->
    <script>
        const BASE_URL = '/NovaLabz/public/';
    </script>
</head>
<body>
    <!-- Canvas pour l'animation des étoiles -->
    <canvas id="starsCanvas"></canvas>
    
    <!-- Navbar -->
    <nav id="navbar" class="navbar">
        <div class="nav-container">
            <a href="/NovaLabz/public/" class="nav-logo">
                <svg width="40" height="40" viewBox="0 0 40 40">
                    <circle cx="20" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2"/>
                    <ellipse cx="20" cy="20" rx="12" ry="4" fill="none" stroke="currentColor" stroke-width="1.5" transform="rotate(45 20 20)"/>
                    <circle cx="20" cy="20" r="2" fill="currentColor"/>
                </svg>
                <span>Novalabz</span>
            </a>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="/NovaLabz/public/" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="/NovaLabz/public/services" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="/NovaLabz/public/projects" class="nav-link">Projets</a>
                </li>
                <li class="nav-item">
                    <a href="/NovaLabz/public/contact" class="nav-link">Contact</a>
                </li>
            </ul>
            
            <div class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
    
    <main>