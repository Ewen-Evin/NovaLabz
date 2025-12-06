// Gestion du formulaire de contact pour countdown.php
document.addEventListener('DOMContentLoaded', function() {
    const clientForm = document.getElementById('client-form');
    
    if (clientForm) {
        clientForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('.submit-btn');
            const formMessage = this.querySelector('.form-message') || createFormMessage();
            
            // Sauvegarde du texte original
            const originalText = submitBtn.innerHTML;
            const originalBtnText = submitBtn.querySelector('span')?.textContent || 'Envoyer ma demande';
            
            // Change le texte du bouton pendant l'envoi
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
            submitBtn.disabled = true;
            
            // Affiche le message
            formMessage.style.display = 'block';
            formMessage.className = 'form-message';
            formMessage.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
            
            // Récupération des données du formulaire
            const formData = new FormData();
            
            // Ajoute les champs du formulaire
            formData.append('name', document.getElementById('client-name').value);
            formData.append('company', document.getElementById('client-company').value || '');
            formData.append('email', document.getElementById('client-email').value);
            formData.append('phone', document.getElementById('client-phone').value || '');
            formData.append('project', document.getElementById('client-project').value);
            formData.append('budget', document.getElementById('client-budget').value);
            formData.append('deadline', document.getElementById('client-deadline').value);
            formData.append('form_type', 'countdown_partner');
            
            // Envoi des données via fetch
            const assetsBase = (window.ASSETS_BASE !== undefined) ? window.ASSETS_BASE : '/public/';
            fetch(assetsBase + 'php/send_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.includes('Succès')) {
                    formMessage.innerHTML = '<i class="fas fa-check-circle"></i> Demande envoyée avec succès ! Nous vous répondrons sous 24h.';
                    formMessage.classList.add('success');
                    clientForm.reset();
                    
                    // Animation de succès
                    triggerConfetti();
                    
                    // Message spécial pour les partenaires
                    setTimeout(() => {
                        formMessage.innerHTML += '<br><br><small><i class="fas fa-rocket"></i> Merci pour votre intérêt pour NovaLabz !</small>';
                    }, 1000);
                } else {
                    throw new Error(data);
                }
            })
            .catch(error => {
                formMessage.innerHTML = '<i class="fas fa-exclamation-circle"></i> Une erreur s\'est produite. Veuillez réessayer ou nous contacter directement à contact@novalabz.fr';
                formMessage.classList.add('error');
                console.error('Erreur:', error);
            })
            .finally(() => {
                // Réinitialise le bouton
                submitBtn.innerHTML = `<span>${originalBtnText}</span><i class="fas fa-paper-plane"></i>`;
                submitBtn.disabled = false;
                
                // Cache le message après 10 secondes
                setTimeout(function() {
                    formMessage.style.display = 'none';
                }, 10000);
            });
        });
    }
    
    // Crée un élément message s'il n'existe pas
    function createFormMessage() {
        const formMessage = document.createElement('div');
        formMessage.className = 'form-message';
        formMessage.style.display = 'none';
        formMessage.style.marginTop = '1rem';
        formMessage.style.padding = '1rem';
        formMessage.style.borderRadius = '8px';
        formMessage.style.textAlign = 'center';
        formMessage.style.fontWeight = '500';
        
        // Insère après le formulaire
        const formNote = clientForm.querySelector('.form-note');
        if (formNote) {
            formNote.parentNode.insertBefore(formMessage, formNote);
        } else {
            clientForm.appendChild(formMessage);
        }
        
        return formMessage;
    }
    
    // Animation de confetti pour succès
    function triggerConfetti() {
        const confettiContainer = document.getElementById('confetti-container');
        if (!confettiContainer) return;
        
        // Crée des confettis
        for (let i = 0; i < 150; i++) {
            const confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.position = 'absolute';
            confetti.style.width = '10px';
            confetti.style.height = '10px';
            confetti.style.background = getRandomColor();
            confetti.style.borderRadius = '50%';
            confetti.style.left = Math.random() * 100 + 'vw';
            confetti.style.top = '-20px';
            confetti.style.zIndex = '9999';
            
            confettiContainer.appendChild(confetti);
            
            // Animation
            const animation = confetti.animate([
                { transform: 'translateY(0) rotate(0deg)', opacity: 1 },
                { transform: `translateY(${window.innerHeight}px) rotate(${360 * Math.random()}deg)`, opacity: 0 }
            ], {
                duration: 2000 + Math.random() * 3000,
                easing: 'cubic-bezier(0.215, 0.610, 0.355, 1)'
            });
            
            // Supprime après animation
            animation.onfinish = () => confetti.remove();
        }
    }
    
    function getRandomColor() {
        const colors = [
            'linear-gradient(135deg, #00D4FF 0%, #7B54F7 100%)',
            '#00D4FF',
            '#7B54F7',
            '#3A2DCE',
            '#FF00FF',
            '#00FF41'
        ];
        return colors[Math.floor(Math.random() * colors.length)];
    }
});