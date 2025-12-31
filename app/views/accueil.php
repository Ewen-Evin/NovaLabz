<?php 
$title = "NovaLabz - Solutions Web Sur-Mesure";
include "app/views/header.php"; 
?>

<!-- Section Hero -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-logo-animated">
            <div class="orbital-particles"></div>
            <div class="logo-glow"></div>
            
            <svg width="200" height="200" viewBox="0 0 200 200">
                <circle cx="100" cy="100" r="50" fill="url(#heroGradient)" class="planet-core"/>
                <ellipse cx="100" cy="100" rx="75" ry="18" fill="none" stroke="url(#heroRing)" 
                         stroke-width="3" transform="rotate(25 100 100)" class="planet-ring"/>
                <circle cx="80" cy="80" r="10" fill="rgba(255,255,255,0.15)"/>
                <circle cx="115" cy="115" r="6" fill="rgba(255,255,255,0.1)"/>
                <defs>
                    <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#3A2DCE"/>
                        <stop offset="100%" stop-color="#7B54F7"/>
                    </linearGradient>
                    <linearGradient id="heroRing" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#7B54F7" stop-opacity="0.8"/>
                        <stop offset="100%" stop-color="#3A2DCE" stop-opacity="0.6"/>
                    </linearGradient>
                </defs>
            </svg>
            <!---
            <img src="<?php echo $base; ?>img/logo_novalabz_blanc.png" alt="Logo NovaLabz" class="logo-image">
            --->
        </div>
        
        <h1 class="hero-title">Des solutions web adaptées à chaque ambition</h1>
        <p class="hero-subtitle">Nous créons des expériences web sur-mesure qui propulsent votre entreprise vers l'avenir</p>
        <a href="index.php?page=contact" class="cta-button">
            <span>Démarrer votre projet</span>
            <i class="fas fa-rocket"></i>
        </a>
    </div>
</section>

<!-- Section Valeurs -->
<section class="valeurs">
    <div class="container">
        <h2 class="section-title">Les valeurs de NovaLabz</h2>
        <div class="valeurs-grid">

            <div class="valeur-card">
                <div class="valeur-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <h3>Proximité</h3>
                <p>
                    Chez NovaLabz, vous échangez directement avec la personne qui conçoit votre projet.
                    Pas d’intermédiaire, pas de discours flou : une relation simple et humaine.
                </p>
            </div>

            <div class="valeur-card">
                <div class="valeur-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Transparence</h3>
                <p>
                    Des offres claires, des tarifs annoncés à l’avance et aucune surprise.
                    Vous savez exactement ce qui est fait, pourquoi et à quel prix.
                </p>
            </div>

            <div class="valeur-card">
                <div class="valeur-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h3>Accessibilité</h3>
                <p>
                    Des solutions web pensées pour les indépendants, associations et petites structures,
                    avec un excellent rapport qualité-prix.
                </p>
            </div>

            <div class="valeur-card">
                <div class="valeur-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <h3>Évolution</h3>
                <p>
                    Votre site est conçu pour évoluer avec votre activité.
                    Vous commencez simplement, et vous améliorez au rythme de vos besoins.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- Section Services -->
<section class="services">
    <div class="container">
        <h2 class="section-title">Nos Services</h2>
        <p class="section-subtitle">Des solutions complètes pour donner vie à vos projets web</p>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-browser"></i>
                </div>
                <h3>Sites Vitrines</h3>
                <p>Présentez votre entreprise avec un site élégant et professionnel. Optimisé pour le SEO et les conversions.</p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Design responsive</li>
                    <li><i class="fas fa-check"></i> Optimisation SEO</li>
                    <li><i class="fas fa-check"></i> Formulaire de contact</li>
                </ul>
            </div>
            
            <div class="service-card featured">
                <div class="featured-badge">Populaire</div>
                <div class="service-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>E-commerce</h3>
                <p>Vendez en ligne avec une boutique performante et sécurisée. Gestion complète des produits et commandes.</p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Catalogue produits</li>
                    <li><i class="fas fa-check"></i> Paiement sécurisé</li>
                    <li><i class="fas fa-check"></i> Gestion des stocks</li>
                </ul>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Refonte de Sites</h3>
                <p>Modernisez votre présence en ligne avec un design actuel et des performances optimisées.</p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Analyse de l'existant</li>
                    <li><i class="fas fa-check"></i> Nouveau design</li>
                    <li><i class="fas fa-check"></i> Migration de données</li>
                </ul>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3>Maintenance & Support</h3>
                <p>Gardez votre site à jour et sécurisé avec notre service de maintenance proactive.</p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Mises à jour régulières</li>
                    <li><i class="fas fa-check"></i> Sauvegardes automatiques</li>
                    <li><i class="fas fa-check"></i> Support technique</li>
                </ul>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>SEO & Marketing</h3>
                <p>Augmentez votre visibilité en ligne et attirez plus de clients qualifiés.</p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Audit SEO complet</li>
                    <li><i class="fas fa-check"></i> Optimisation contenu</li>
                    <li><i class="fas fa-check"></i> Stratégie digitale</li>
                </ul>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-code"></i>
                </div>
                <h3>Développement Sur-Mesure</h3>
                <p>Des fonctionnalités uniques développées spécifiquement pour votre activité.</p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Applications web</li>
                    <li><i class="fas fa-check"></i> Intégrations API</li>
                    <li><i class="fas fa-check"></i> Automatisations</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA Final -->
<section class="cta-final">
    <div class="container">
        <h2>Prêt à transformer votre vision en réalité ?</h2>
        <p>Discutons de votre projet et découvrons comment nous pouvons vous aider à atteindre vos objectifs.</p>
        <a href="index.php?page=contact" class="cta-button-large">
            <span>Contactez-nous</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<?php include "app/views/footer.php"; ?>