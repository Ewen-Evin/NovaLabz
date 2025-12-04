<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <!-- Logo planète animé -->
        <div class="planet-logo">
            <svg width="200" height="200" viewBox="0 0 200 200" class="planet">
                <!-- Planète -->
                <circle cx="100" cy="100" r="40" fill="url(#planetGradient)" class="planet-core"/>
                <!-- Anneau -->
                <ellipse cx="100" cy="100" rx="60" ry="15" fill="none" stroke="url(#ringGradient)" 
                         stroke-width="3" transform="rotate(25 100 100)" class="planet-ring"/>
                <!-- Détails -->
                <circle cx="85" cy="85" r="8" fill="rgba(255,255,255,0.1)"/>
                <circle cx="110" cy="110" r="5" fill="rgba(255,255,255,0.08)"/>
                
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
        
        <h1 class="hero-title">Novalabz</h1>
        <p class="hero-subtitle">Exploring the Future of Web Creation</p>
        <button class="cta-button" onclick="location.href='/NovaLabz/public/services'">
            <span>Découvrir Novalabz</span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
    
    <div class="scroll-indicator">
        <div class="scroll-arrow"></div>
    </div>
</section>

<!-- Services Section -->
<section class="services">
    <div class="container">
        <h2 class="section-title">Nos Services</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
                        <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2"/>
                        <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Développement Web</h3>
                <p>Création de sites web modernes et performants avec les dernières technologies.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
                        <rect x="2" y="12" width="20" height="8" rx="1" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Applications Web</h3>
                <p>Applications sur mesure pour automatiser et optimiser vos processus métier.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
                        <path d="M6.5 16.5L12 12L17.5 16.5" stroke="currentColor" stroke-width="2"/>
                        <path d="M12 22V12" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Solutions Innovantes</h3>
                <p>Outils numériques innovants pour accélérer la création de projets web.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about">
    <div class="container">
        <div class="about-content">
            <h2 class="section-title">L'avenir du développement web</h2>
            <p class="about-text">
                Novalabz repousse les limites de la création numérique en combinant expertise technique 
                et vision innovante. Notre approche unique nous permet de développer des solutions 
                web qui anticipent les besoins de demain.
            </p>
            <div class="stats-grid">
                <div class="stat">
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label">Projets livrés</div>
                </div>
                <div class="stat">
                    <div class="stat-number" data-count="3">0</div>
                    <div class="stat-label">Ans d'expérience</div>
                </div>
                <div class="stat">
                    <div class="stat-number" data-count="100">0</div>
                    <div class="stat-label">Solutions innovantes</div>
                </div>
            </div>
        </div>
    </div>
</section>