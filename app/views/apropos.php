<?php 
$title = "À Propos - NovaLabz";
include "app/views/header.php"; 
?>

<!-- Section À Propos -->
<section class="about-page">
    <div class="container">

        <!-- En-tête -->
        <div class="about-header">
            <h1>À propos de NovaLabz</h1>
            <p>Un projet indépendant, pensé pour créer des solutions web simples, efficaces et accessibles</p>
        </div>

        <!-- Notre histoire -->
        <div class="about-story">
            <div class="story-content">
                <h2>L’histoire de NovaLabz</h2>

                <p>
                    NovaLabz est né de la volonté de proposer une approche plus humaine et plus claire
                    du développement web. Derrière NovaLabz, il n’y a pas une grande agence,
                    mais un développeur indépendant passionné par le web et la création digitale.
                </p>

                <p>
                    Après plusieurs projets personnels et professionnels, l’objectif est devenu évident :
                    accompagner indépendants, associations et petites entreprises dans la création
                    de sites web fiables, évolutifs et adaptés à leurs besoins réels.
                </p>

                <p>
                    Pas de solutions toutes faites ni de discours marketing inutile.
                    Chaque projet est conçu sur-mesure, avec une attention particulière portée
                    à la clarté, à la performance et à la simplicité d’utilisation.
                </p>
            </div>

            <div class="story-image">
                <img src="<?php echo $base; ?>img/logo_novalabz_blanc.png" alt="NovaLabz" class="story-image-img">
            </div>
        </div>

        <!-- Vision -->
        <div class="vision-section">
            <h2 class="section-title">La vision NovaLabz</h2>

            <div class="vision-cards">

                <div class="vision-card">
                    <div class="vision-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3>Proximité</h3>
                    <p>
                        Vous échangez directement avec la personne qui développe votre site.
                        Cela permet une communication simple, fluide et sans intermédiaire.
                    </p>
                </div>

                <div class="vision-card">
                    <div class="vision-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Transparence</h3>
                    <p>
                        Des prestations claires, des tarifs annoncés à l’avance
                        et une vision précise de ce qui est réalisé à chaque étape.
                    </p>
                </div>

                <div class="vision-card">
                    <div class="vision-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3>Évolution</h3>
                    <p>
                        Les sites sont pensés pour évoluer avec votre activité,
                        sans repartir de zéro à chaque changement.
                    </p>
                </div>

            </div>
        </div>

        <!-- Fondateur -->
        <div class="team-section">
            <h2 class="section-title">Le fondateur</h2>

            <div class="team-member">
                <div class="member-photo">
                    <div class="photo-placeholder">
                        <i class="fas fa-user-astronaut"></i>
                    </div>
                </div>

                <div class="member-info">
                    <h3>Ewen Evin</h3>
                    <p class="member-role">Fondateur & Développeur Web</p>

                    <p class="member-bio">
                        Passionné par le développement web, je conçois et développe 
                        des sites internet sur-mesure, en mettant l’accent sur la performance, 
                        la clarté et l’expérience utilisateur.
                    </p>

                    <p class="member-bio">
                        J’accompagne chaque projet de A à Z : réflexion, conception, 
                        développement et mise en ligne, avec un suivi personnalisé.
                    </p>

                    <div class="member-skills">
                        <span>PHP</span>
                        <span>JavaScript</span>
                        <span>HTML / CSS</span>
                        <span>SEO</span>
                        <span>UI / UX</span>
                    </div>

                    <div class="member-social">
                        <a href="https://github.com/Ewen-Evin" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="http://linkedin.com/in/ewen-evin/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.tiktok.com/@novalabz.fr" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <a href="https://www.instagram.com/novalabz.fr" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pourquoi NovaLabz -->
        <div class="why-choose">
            <h2 class="section-title">Pourquoi choisir NovaLabz ?</h2>

            <div class="reasons-grid">

                <div class="reason-card">
                    <div class="reason-number">01</div>
                    <h3>Interlocuteur unique</h3>
                    <p>
                        Une seule personne pour votre projet, du premier échange
                        jusqu’à la mise en ligne.
                    </p>
                </div>

                <div class="reason-card">
                    <div class="reason-number">02</div>
                    <h3>Solutions adaptées</h3>
                    <p>
                        Pas de fonctionnalités inutiles :
                        uniquement ce dont votre projet a réellement besoin.
                    </p>
                </div>

                <div class="reason-card">
                    <div class="reason-number">03</div>
                    <h3>Tarifs clairs</h3>
                    <p>
                        Des prix transparents, sans coûts cachés ni engagement inutile.
                    </p>
                </div>

                <div class="reason-card">
                    <div class="reason-number">04</div>
                    <h3>Accompagnement humain</h3>
                    <p>
                        Un vrai suivi, des explications compréhensibles
                        et une disponibilité réelle.
                    </p>
                </div>

            </div>
        </div>

        <!-- CTA -->
        <div class="about-cta">
            <h2>Un projet en tête ?</h2>
            <p>
                Discutons-en simplement et voyons ensemble
                comment donner vie à votre idée.
            </p>

            <a href="index.php?page=contact" class="cta-button-large">
                <span>Me contacter</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>

<?php include "app/views/footer.php"; ?>
