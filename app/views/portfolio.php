<?php 
$title = "Portfolio - NovaLabz";
include "app/views/header.php"; 
?>

<!-- Section Portfolio -->
<section class="portfolio-page">
    <div class="container">
        <div class="portfolio-header">
            <h1>Nos Réalisations</h1>
            <p>Découvrez les projets sur lesquels nous avons travaillé et les entreprises qui nous font confiance</p>
        </div>

        <!-- Filtres -->
        <div class="portfolio-filters">
            <button class="filter-btn active" data-filter="all">Tous</button>
            <button class="filter-btn" data-filter="ecommerce">E-commerce</button>
            <button class="filter-btn" data-filter="vitrine">Sites Vitrines</button>
            <button class="filter-btn" data-filter="refonte">Refontes</button>
            <button class="filter-btn" data-filter="hebergement">Hébergement</button>
        </div>

        <!-- Projets -->
        <div class="portfolio-grid">
            <!-- Projet 1 -->
            <div class="portfolio-item" data-category="ecommerce">
                <div class="portfolio-image">
                    <img src="<?php echo $base; ?>images/projects/boutique-mode.jpg" alt="Boutique de mode en ligne">
                    <div class="portfolio-overlay">
                        <div class="portfolio-tech">
                            <span>WordPress</span>
                            <span>WooCommerce</span>
                            <span>Stripe</span>
                        </div>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Boutique de Mode Élégante</h3>
                    <p>Création d'une boutique e-commerce de vêtements haut de gamme avec catalogue de 200+ produits, système de recommandations et paiement sécurisé.</p>
                    <div class="portfolio-stats">
                        <span><i class="fas fa-chart-line"></i> +40% de ventes</span>
                        <span><i class="fas fa-bolt"></i> 2s de chargement</span>
                    </div>
                </div>
            </div>

            <!-- Projet 2 -->
            <div class="portfolio-item" data-category="vitrine">
                <div class="portfolio-image">
                    <img src="<?php echo $base; ?>images/projects/cabinet-avocats.jpg" alt="Cabinet d'avocats">
                    <div class="portfolio-overlay">
                        <div class="portfolio-tech">
                            <span>HTML/CSS</span>
                            <span>JavaScript</span>
                            <span>PHP</span>
                        </div>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Cabinet d'Avocats Prestige</h3>
                    <p>Site vitrine professionnel avec prise de rendez-vous en ligne, présentation de l'équipe et blog juridique. Design sobre et élégant.</p>
                    <div class="portfolio-stats">
                        <span><i class="fas fa-search"></i> Top 3 Google</span>
                        <span><i class="fas fa-mobile-alt"></i> 100% mobile</span>
                    </div>
                </div>
            </div>

            <!-- Projet 3 -->
            <div class="portfolio-item" data-category="refonte">
                <div class="portfolio-image">
                    <img src="<?php echo $base; ?>images/projects/restaurant-gastronomique.jpg" alt="Restaurant gastronomique">
                    <div class="portfolio-overlay">
                        <div class="portfolio-tech">
                            <span>Refonte</span>
                            <span>Mobile First</span>
                            <span>SEO</span>
                        </div>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Restaurant Gastronomique</h3>
                    <p>Refonte complète du site avec système de réservation en ligne, galerie photo dynamique et carte interactive des plats. Passage de 5s à 1.5s de chargement.</p>
                    <div class="portfolio-stats">
                        <span><i class="fas fa-rocket"></i> +300% vitesse</span>
                        <span><i class="fas fa-calendar-check"></i> +50% réservations</span>
                    </div>
                </div>
            </div>

            <!-- Projet 4 -->
            <div class="portfolio-item" data-category="ecommerce">
                <div class="portfolio-image">
                    <img src="<?php echo $base; ?>images/projects/boutique-artisanat.jpg" alt="Boutique d'artisanat">
                    <div class="portfolio-overlay">
                        <div class="portfolio-tech">
                            <span>PrestaShop</span>
                            <span>PayPal</span>
                            <span>API Colissimo</span>
                        </div>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Boutique d'Artisanat Local</h3>
                    <p>Plateforme e-commerce avec intégration d'un système de gestion des stocks et synchronisation automatique avec les réseaux sociaux.</p>
                    <div class="portfolio-stats">
                        <span><i class="fas fa-users"></i> 500 clients/mois</span>
                        <span><i class="fas fa-sync-alt"></i> Automatisé</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Clients -->
        <div class="clients-section">
            <h2 class="section-title">Ils nous font confiance</h2>
            <p class="section-subtitle">Des entreprises de toutes tailles qui nous ont choisi pour leurs projets web</p>
            
            <div class="clients-grid">
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>LuxeParis</h3>
                    <p>Bijouterie haut de gamme</p>
                    <span class="client-service">E-commerce + Hébergement</span>
                </div>
                
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>BioNature</h3>
                    <p>Produits biologiques</p>
                    <span class="client-service">Site vitrine + SEO</span>
                </div>
                
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>ImmoPro</h3>
                    <p>Agence immobilière</p>
                    <span class="client-service">Refonte + Hébergement</span>
                </div>
                
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>École Tech</h3>
                    <p>Centre de formation</p>
                    <span class="client-service">Site institutionnel</span>
                </div>
            </div>
        </div>

        <!-- Hébergement Clients -->
        <div class="hosting-clients">
            <h2 class="section-title">🛡️ Clients en Hébergement</h2>
            <p class="section-subtitle">Des sites que nous hébergeons et maintenons au quotidien</p>
            
            <div class="hosting-stats">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <h3>25+</h3>
                    <p>Sites hébergés</p>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>99.9%</h3>
                    <p>Disponibilité</p>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>&lt; 2s</h3>
                    <p>Temps de chargement moyen</p>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>24/7</h3>
                    <p>Support technique</p>
                </div>
            </div>
            
            <div class="hosting-testimonials">
                <div class="testimonial">
                    <p>"NovaLabz gère notre hébergement depuis 2 ans. Aucun souci, toujours réactifs et professionnels."</p>
                    <div class="testimonial-author">
                        <strong>Marie L.</strong>
                        <span>Directrice Marketing, LuxeParis</span>
                    </div>
                </div>
                
                <div class="testimonial">
                    <p>"Le passage en hébergement Pro a considérablement amélioré les performances de notre boutique."</p>
                    <div class="testimonial-author">
                        <strong>Thomas B.</strong>
                        <span>Gérant, BioNature</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="portfolio-cta">
            <h2>Votre projet sera le prochain</h2>
            <p>Contactez-nous pour discuter de votre projet et voir comment nous pouvons vous aider à le réaliser.</p>
            <a href="index.php?page=contact" class="cta-button-large">
                <span>Parler de mon projet</span>
                <i class="fas fa-comments"></i>
            </a>
        </div>
    </div>
</section>

<script>
// Filtrage du portfolio
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Retirer la classe active de tous les boutons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Ajouter la classe active au bouton cliqué
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            portfolioItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
});
</script>

<?php include "app/views/footer.php"; ?>