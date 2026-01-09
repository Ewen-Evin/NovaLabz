<?php 
$title = "Contact - NovaLabz";
include "app/views/header.php"; 
?>

<!-- Section Contact -->
<section class="contact-page">
    <div class="container">
        <div class="contact-header">
            <h1>Lancez votre projet avec NovaLabz</h1>
            <p>Vous avez un projet ambitieux ? Discutons de votre vision et transformons-la en réalité.</p>
        </div>
        
        <div class="contact-content">
            <div class="contact-info-section">
                <div class="contact-why">
                    <h3>Pourquoi nous contacter ?</h3>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Devis gratuit et sans engagement</li>
                        <li><i class="fas fa-check-circle"></i> Conseil personnalisé sur votre projet</li>
                        <li><i class="fas fa-check-circle"></i> Accompagnement de A à Z</li>
                        <li><i class="fas fa-check-circle"></i> Tarifs transparents et compétitifs</li>
                    </ul>
                </div>

                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <a href="mailto:contact@novalabz.fr">contact@novalabz.fr</a>
                    <p>Réponse sous 24h</p>
                </div>
                
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Téléphone</h3>
                    <p>+33 6 98 49 75 48</p>
                    <p>Lun-Ven : 9h-18h</p>
                </div>
            </div>
            
            <div class="contact-form-section">
                <form id="contact-form" method="POST" action="index.php?page=traiter-contact">
                    <input type="hidden" name="form_type" value="contact_novalabz">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">
                                <i class="fas fa-user"></i>
                                Nom complet <span class="required">*</span>
                            </label>
                            <input type="text" id="name" name="name" placeholder="Votre nom" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="company">
                                <i class="fas fa-building"></i>
                                Entreprise
                            </label>
                            <input type="text" id="company" name="company" placeholder="Nom de votre entreprise">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i>
                                Email professionnel <span class="required">*</span>
                            </label>
                            <input type="email" id="email" name="email" placeholder="contact@votresentreprise.com" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">
                                <i class="fas fa-phone"></i>
                                Téléphone
                            </label>
                            <input type="tel" id="phone" name="phone" placeholder="+33 1 23 45 67 89">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="project">
                            <i class="fas fa-lightbulb"></i>
                            Votre projet <span class="required">*</span>
                        </label>
                        <textarea id="project" name="project" placeholder="Décrivez votre projet, vos besoins et vos objectifs..." rows="5" required></textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="budget">
                                <i class="fas fa-euro-sign"></i>
                                Budget estimé
                            </label>
                            <select id="budget" name="budget">
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
                            <label for="deadline">
                                <i class="fas fa-calendar-alt"></i>
                                Délai souhaité
                            </label>
                            <select id="deadline" name="deadline">
                                <option value="">Sélectionnez un délai</option>
                                <option value="urgent">Urgent (moins d'1 mois)</option>
                                <option value="1-3months">1-3 mois</option>
                                <option value="3-6months">3-6 mois</option>
                                <option value="6months+">6 mois et plus</option>
                                <option value="flexible">Flexible</option>
                            </select>
                        </div>
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
        </div>
    </div>
</section>

<?php include "app/views/footer.php"; ?>