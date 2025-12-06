<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Novalabz - Bientôt disponible'; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>css/countdown.css">

    <!-- Favicon emoji planète -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22 fill=%22%237B54F7%22>🪐</text></svg>">
    <!-- Version alternative avec une vraie planète SVG -->
    <link rel="alternate icon" href="<?php echo $base; ?>img/favicon.svg" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Canvas des étoiles -->
    <canvas id="starsCanvas"></canvas>
    
    <!-- Contenu principal -->
    <div class="countdown-container">
        <!-- Logo Novalabz avec particules autour -->
        <div class="countdown-logo">
            <div class="logo-frame">
                <!-- Particules orbitales autour du logo -->
                <div class="orbital-particles">
                    <!-- Particules qui tournent autour -->
                </div>
                
                <!-- Lueur derrière le logo -->
                <div class="logo-glow"></div>
                
                <svg width="150" height="150" viewBox="0 0 200 200">
                    <circle cx="100" cy="100" r="50" fill="url(#planetGradient)" class="planet-core"/>
                    <ellipse cx="100" cy="100" rx="75" ry="18" fill="none" stroke="url(#ringGradient)" 
                             stroke-width="3" transform="rotate(25 100 100)" class="planet-ring"/>
                    <circle cx="80" cy="80" r="10" fill="rgba(255,255,255,0.15)"/>
                    <circle cx="115" cy="115" r="6" fill="rgba(255,255,255,0.1)"/>
                    
                    <!-- Points de données animés -->
                    <circle cx="65" cy="100" r="2" fill="#00D4FF">
                        <animateTransform attributeName="transform" type="rotate" from="0 100 100" to="360 100 100" dur="20s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="100" cy="65" r="2" fill="#7B54F7">
                        <animateTransform attributeName="transform" type="rotate" from="90 100 100" to="450 100 100" dur="15s" repeatCount="indefinite"/>
                    </circle>
                    
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
            </div>
            <h1 class="logo-text">NovaLabz</h1>
        </div>
        
        <!-- Message principal -->
        <div class="launch-message">
            <h2>
                <span class="rocket-emoji" aria-label="Rocket">🚀</span>
                L'avenir du web est en approche
            </h2>
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
        
        <!-- Services -->
        <div class="services">
            <h3><i class="fas fa-cogs"></i> Nos Services</h3>
            <p>NovaLabz développe des solutions web innovantes pour propulser votre entreprise vers l'avenir.</p>
            
            <div class="service-list">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h4>Développement Web</h4>
                    <p>Applications sur mesure avec les dernières technologies</p>
                </div>
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h4>Design UI/UX</h4>
                    <p>Interfaces intuitives et expériences utilisateur optimisées</p>
                </div>
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Stratégie Digitale</h4>
                    <p>Solutions pour maximiser votre présence en ligne</p>
                </div>
            </div>
        </div>
        
        <!-- Formulaire de contact pour clients -->
        <div class="client-contact">
            <h3><i class="fas fa-handshake"></i>Réserver votre projet</h3>
            <p>Vous avez un projet ambitieux ? Discutons de votre vision.</p>
            
            <form id="client-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="client-name">
                            <i class="fas fa-user"></i>
                            Nom complet
                        </label>
                        <input type="text" id="client-name" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label for="client-company">
                            <i class="fas fa-building"></i>
                            Entreprise
                        </label>
                        <input type="text" id="client-company" placeholder="Nom de votre entreprise">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="client-email">
                            <i class="fas fa-envelope"></i>
                            Email professionnel
                        </label>
                        <input type="email" id="client-email" placeholder="contact@votresentreprise.com" required>
                    </div>
                    <div class="form-group">
                        <label for="client-phone">
                            <i class="fas fa-phone"></i>
                            Téléphone
                        </label>
                        <input type="tel" id="client-phone" placeholder="+33 1 23 45 67 89">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="client-project">
                        <i class="fas fa-lightbulb"></i>
                        Votre projet
                    </label>
                    <textarea id="client-project" placeholder="Décrivez votre projet, vos besoins et vos objectifs..." rows="4" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="client-budget">
                        <i class="fas fa-euro-sign"></i>
                        Budget estimé
                    </label>
                    <select id="client-budget">
                        <option value="">Sélectionnez une fourchette</option>
                        <option value="500-1k">500€ - 1 000€</option>
                        <option value="1-3k">1 000€ - 3 000€</option>
                        <option value="3-5k">3 000€ - 5 000€</option>
                        <option value="5-8k">5 000€ - 8 000€</option>
                        <option value="8-12k">8 000€ - 12 000€</option>
                        <option value="12-18k">12 000€ - 18 000€</option>
                        <option value="18-25k">18 000€ - 25 000€</option>
                        <option value="25-30k">25 000€ - 30 000€</option>
                        <option value="30k+">30 000€ et plus</option>
                        <option value="undefined">À définir</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="client-deadline">
                        <i class="fas fa-calendar-alt"></i>
                        Délai souhaité
                    </label>
                    <select id="client-deadline">
                        <option value="">Sélectionnez un délai</option>
                        <option value="urgent">Urgent (moins d'1 mois)</option>
                        <option value="1-3months">1-3 mois</option>
                        <option value="3-6months">3-6 mois</option>
                        <option value="6months+">6 mois et plus</option>
                        <option value="flexible">Flexible</option>
                    </select>
                </div>
                
                <button type="submit" class="submit-btn">
                    <span>Envoyer ma demande</span>
                    <i class="fas fa-paper-plane"></i>
                </button>
                
                <p class="form-note">
                    <i class="fas fa-lock"></i>
                    Vos informations sont traitées de manière confidentielle. Nous vous répondrons sous 24h.
                </p>
            </form>
        </div>
        
        <!-- Réseaux sociaux -->
        <div class="social-links">
            <p>Suivez notre progression :</p>
            <div class="social-icons">
                <a href="https://github.com/Ewen-Evin" target="_blank" class="social-icon" aria-label="GitHub">
                    <i class="fab fa-github"></i>
                </a>
                <a href="http://linkedin.com/in/ewen-evin/" target="_blank" class="social-icon" aria-label="LinkedIn">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://www.tiktok.com/@novalabz.fr" target="_blank" class="social-icon" aria-label="Tiktok">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://www.instagram.com/novalabz.fr" target="_blank" class="social-icon" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
        
        <!-- Copyright -->
        <footer class="countdown-footer">
            <p>&copy; 2026 NovaLabz. Tous droits réservés.</p>
        </footer>
    </div>
    
    <!-- Confetti animation -->
    <div id="confetti-container"></div>
    
    <!-- Particules flottantes globales -->
    <div id="floating-particles"></div>
    
    <!-- Injecter les bases pour les scripts JS -->
    <script>
        window.ASSETS_BASE = '<?php echo $base; ?>';
        window.ROUTE_BASE = '<?php echo $route_base; ?>';
    </script>
    
    <script src="<?php echo $base; ?>js/countdown.js"></script>
    <script src="<?php echo $base; ?>js/countdown-form.js"></script>
</body>
</html>