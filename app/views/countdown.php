<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novalabz - Lancement imminent</title>
    <link rel="stylesheet" href="/NovaLabz/public/css/countdown.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Canvas des étoiles -->
    <canvas id="starsCanvas"></canvas>
    
    <!-- Contenu principal -->
    <div class="countdown-container">
        <!-- Logo Novalabz -->
        <div class="countdown-logo">
            <svg width="150" height="150" viewBox="0 0 200 200">
                <circle cx="100" cy="100" r="50" fill="url(#planetGradient)" class="planet-core"/>
                <ellipse cx="100" cy="100" rx="75" ry="18" fill="none" stroke="url(#ringGradient)" 
                         stroke-width="3" transform="rotate(25 100 100)" class="planet-ring"/>
                <circle cx="80" cy="80" r="10" fill="rgba(255,255,255,0.15)"/>
                <circle cx="115" cy="115" r="6" fill="rgba(255,255,255,0.1)"/>
                
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
            <h1 class="logo-text">NOVALABZ</h1>
        </div>
        
        <!-- Message principal -->
        <div class="launch-message">
            <h2>🚀 L'avenir du web est en approche</h2>
            <p>Notre nouvelle plateforme innovante décolle bientôt</p>
        </div>
        
        <!-- Compte à rebours -->
        <div class="countdown">
            <h3>Lancement dans :</h3>
            <div class="countdown-grid">
                <div class="countdown-item">
                    <div class="countdown-number" id="days">00</div>
                    <div class="countdown-label">Jours</div>
                </div>
                <div class="countdown-separator">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="hours">00</div>
                    <div class="countdown-label">Heures</div>
                </div>
                <div class="countdown-separator">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="minutes">00</div>
                    <div class="countdown-label">Minutes</div>
                </div>
                <div class="countdown-separator">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="seconds">00</div>
                    <div class="countdown-label">Secondes</div>
                </div>
            </div>
        </div>
        
        <!-- Date de lancement -->
        <div class="launch-date">
            <i class="fas fa-rocket"></i>
            <span>1er Janvier 2026 - 00:00</span>
        </div>
        
        <!-- Description -->
        <div class="description">
            <p>Novalabz prépare une révolution dans la création web. Notre nouvelle plateforme combinera intelligence artificielle, outils automatisés et expériences immersives pour redéfinir la façon dont les projets numériques sont conçus.</p>
            
            <div class="features">
                <div class="feature">
                    <i class="fas fa-brain"></i>
                    <span>IA intégrée</span>
                </div>
                <div class="feature">
                    <i class="fas fa-bolt"></i>
                    <span>Création 10x plus rapide</span>
                </div>
                <div class="feature">
                    <i class="fas fa-cube"></i>
                    <span>Designs 3D interactifs</span>
                </div>
                <div class="feature">
                    <i class="fas fa-infinity"></i>
                    <span>Solutions infinies</span>
                </div>
            </div>
        </div>
        
        <!-- Newsletter -->
        <div class="newsletter">
            <h3><i class="fas fa-envelope"></i> Soyez les premiers informés</h3>
            <p>Recevez une notification exclusive lors du lancement et bénéficiez d'un accès prioritaire.</p>
            
            <form id="newsletter-form">
                <div class="form-group">
                    <input type="email" placeholder="Votre adresse email" required>
                    <button type="submit">
                        <span>S'inscrire</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
                <p class="form-note">Nous respectons votre vie privée. Aucun spam.</p>
            </form>
        </div>
        
        <!-- Réseaux sociaux -->
        <div class="social-links">
            <p>Suivez notre progression :</p>
            <div class="social-icons">
                <a href="#" class="social-icon" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon" aria-label="LinkedIn">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="#" class="social-icon" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-icon" aria-label="GitHub">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>
        
        <!-- Copyright -->
        <footer class="countdown-footer">
            <p>&copy; 2024 Novalabz. Tous droits réservés.</p>
            <p>Exploring the Future of Web Creation</p>
        </footer>
    </div>
    
    <!-- Confetti animation -->
    <div id="confetti-container"></div>
    
    <script src="/NovaLabz/public/js/countdown.js"></script>
</body>
</html>