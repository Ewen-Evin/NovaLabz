</main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <div class="footer-logo">
                    <!---
                    <svg width="50" height="50" viewBox="0 0 200 200">
                        <circle cx="100" cy="100" r="50" fill="url(#planetGradientFooter)" class="planet-core"/>
                        <ellipse cx="100" cy="100" rx="75" ry="18" fill="none" stroke="url(#ringGradientFooter)" 
                                 stroke-width="3" transform="rotate(25 100 100)" class="planet-ring"/>
                        <defs>
                            <linearGradient id="planetGradientFooter" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#3A2DCE"/>
                                <stop offset="100%" stop-color="#7B54F7"/>
                            </linearGradient>
                            <linearGradient id="ringGradientFooter" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#7B54F7" stop-opacity="0.8"/>
                                <stop offset="100%" stop-color="#3A2DCE" stop-opacity="0.6"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <span>NOVALABZ</span>
                    --->
                    <img src="<?php echo $base; ?>img/logo_novalabz_blanc_long.png" alt="Logo NovaLabz" class="logo-image">
                </div>

                <p class="footer-tagline">Exploring the Future of Web Creation</p>
            </div>
            
            <div class="footer-section">
                <h3>Navigation</h3>
                <ul class="footer-links">
                    <li><a href="index.php?page=accueil">Accueil</a></li>
                    <li><a href="index.php?page=tarifs">Tarifs</a></li>
                    <!-- <li><a href="index.php?page=portfolio">Portfolio</a></li> -->
                    <li><a href="index.php?page=apropos">À Propos</a></li>
                    <li><a href="index.php?page=contact">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Légal</h3>
                <ul class="footer-links">
                    <li><a href="index.php?page=mentions">Mentions légales</a></li>
                    <li><a href="index.php?page=privacy">Politique de confidentialité</a></li>
                    <li><a href="index.php?page=cgv">CGV</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Suivez-nous</h3>
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
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> NovaLabz. Tous droits réservés.</p>
        </div>
    </footer>
    
    <!-- Particules flottantes -->
    <div id="floating-particles"></div>
    
    <script src="<?php echo $base; ?>js/script.js"></script>
</body>
</html>