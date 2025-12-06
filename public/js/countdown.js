// Animation des étoiles pour la page de compte à rebours
class StarsAnimation {
    constructor() {
        this.canvas = document.getElementById('starsCanvas');
        this.ctx = this.canvas.getContext('2d');
        this.stars = [];
        this.numberOfStars = 300;
        this.speed = 0.5;
        
        this.init();
        this.animate();
        this.handleResize();
    }
    
    init() {
        this.resizeCanvas();
        this.createStars();
        
        window.addEventListener('resize', () => this.handleResize());
    }
    
    resizeCanvas() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    }
    
    handleResize() {
        this.resizeCanvas();
        this.createStars();
    }
    
    createStars() {
        this.stars = [];
        for (let i = 0; i < this.numberOfStars; i++) {
            const size = Math.random();
            this.stars.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                radius: size * 2 + 0.5, // Réduit la taille max
                speed: Math.random() * this.speed + 0.1,
                opacity: size * 0.6 + 0.3, // Opacité réduite
                twinkleSpeed: Math.random() * 0.05 + 0.01,
                twinkleOffset: Math.random() * Math.PI * 2,
                color: Math.random() > 0.8 ? '#00D4FF' : '#FFFFFF', // Moins de bleu
                trail: [],
                maxTrailLength: Math.floor(Math.random() * 5) + 3 // Longueur de traînée limitée
            });
        }
    }
    
    animate() {
        requestAnimationFrame(() => this.animate());
        
        // Fond avec un léger dégradé pour effacer progressivement
        const gradient = this.ctx.createLinearGradient(0, 0, 0, this.canvas.height);
        gradient.addColorStop(0, 'rgba(10, 10, 21, 0.25)'); // Augmenté l'opacité pour effacer plus vite
        gradient.addColorStop(1, 'rgba(10, 26, 74, 0.15)');
        
        this.ctx.fillStyle = gradient;
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
        
        const time = Date.now() * 0.001;
        
        this.stars.forEach(star => {
            // Ajouter la position actuelle à la traînée
            star.trail.push({x: star.x, y: star.y, opacity: star.opacity});
            
            // Limiter la longueur de la traînée
            if (star.trail.length > star.maxTrailLength) {
                star.trail.shift();
            }
            
            // Mettre à jour la position
            star.y += star.speed;
            
            if (star.y > this.canvas.height) {
                star.y = 0;
                star.x = Math.random() * this.canvas.width;
                star.trail = []; // Réinitialiser la traînée
            }
            
            const twinkle = Math.sin(time * star.twinkleSpeed + star.twinkleOffset) * 0.4 + 0.6;
            const currentOpacity = star.opacity * twinkle;
            
            // Dessiner la traînée
            star.trail.forEach((point, index) => {
                const trailOpacity = currentOpacity * (index / star.trail.length) * 0.5;
                
                this.ctx.beginPath();
                this.ctx.arc(point.x, point.y, star.radius * 0.7, 0, Math.PI * 2);
                
                const gradient = this.ctx.createRadialGradient(
                    point.x, point.y, 0,
                    point.x, point.y, star.radius * 1.5
                );
                
                if (star.color === '#00D4FF') {
                    gradient.addColorStop(0, `rgba(0, 212, 255, ${trailOpacity})`);
                    gradient.addColorStop(1, 'rgba(0, 212, 255, 0)');
                } else {
                    gradient.addColorStop(0, `rgba(255, 255, 255, ${trailOpacity})`);
                    gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
                }
                
                this.ctx.fillStyle = gradient;
                this.ctx.fill();
            });
            
            // Dessiner l'étoile principale
            this.ctx.beginPath();
            this.ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
            
            const mainGradient = this.ctx.createRadialGradient(
                star.x, star.y, 0,
                star.x, star.y, star.radius * 2
            );
            
            if (star.color === '#00D4FF') {
                mainGradient.addColorStop(0, `rgba(0, 212, 255, ${currentOpacity})`);
                mainGradient.addColorStop(0.7, `rgba(0, 212, 255, ${currentOpacity * 0.3})`);
                mainGradient.addColorStop(1, 'rgba(0, 212, 255, 0)');
            } else {
                mainGradient.addColorStop(0, `rgba(255, 255, 255, ${currentOpacity})`);
                mainGradient.addColorStop(0.7, `rgba(255, 255, 255, ${currentOpacity * 0.3})`);
                mainGradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
            }
            
            this.ctx.fillStyle = mainGradient;
            this.ctx.fill();
        });
    }
}

// Compte à rebours
class CountdownTimer {
    constructor() {
        this.launchDate = new Date('January 1, 2026 00:00:00').getTime();
        this.daysElement = document.getElementById('days');
        this.hoursElement = document.getElementById('hours');
        this.minutesElement = document.getElementById('minutes');
        this.secondsElement = document.getElementById('seconds');
        
        // Ajouter les labels pour mobile
        this.addMobileLabels();
        
        this.updateCountdown();
        setInterval(() => this.updateCountdown(), 1000);
    }
    
    addMobileLabels() {
        const items = [
            this.daysElement.parentElement,
            this.hoursElement.parentElement,
            this.minutesElement.parentElement,
            this.secondsElement.parentElement
        ];
        
        const labels = ['Jours', 'Heures', 'Minutes', 'Secondes'];
        
        items.forEach((item, index) => {
            item.setAttribute('data-label', labels[index]);
        });
    }
    
    updateCountdown() {
        const now = new Date().getTime();
        const distance = this.launchDate - now;
        
        if (distance < 0) {
            this.displayLaunch();
            return;
        }
        
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        this.updateNumber(this.daysElement, days.toString().padStart(2, '0'), 'days');
        this.updateNumber(this.hoursElement, hours.toString().padStart(2, '0'), 'hours');
        this.updateNumber(this.minutesElement, minutes.toString().padStart(2, '0'), 'minutes');
        this.updateNumber(this.secondsElement, seconds.toString().padStart(2, '0'), 'seconds');
        
        // Effet spécial pour les dernières 24 heures
        if (days === 0 && hours < 24) {
            const countdown = document.querySelector('.countdown');
            countdown.style.boxShadow = 
                '0 0 40px rgba(0, 212, 255, 0.5), 0 0 80px rgba(123, 84, 247, 0.3)';
            
            // Effet de pulsation pour les dernières heures
            if (hours < 12) {
                countdown.style.animation = 'pulse 1s infinite alternate';
            }
            
            // Effet spécial pour la dernière heure
            if (hours === 0 && minutes < 60) {
                countdown.style.borderColor = 'rgba(255, 0, 100, 0.5)';
                countdown.style.background = 'rgba(255, 0, 100, 0.05)';
                
                // Effet pour les dernières minutes
                if (minutes < 10) {
                    countdown.style.animation = 'pulse 0.5s infinite alternate';
                }
            }
        }
    }
    
    updateNumber(element, newValue, type) {
        if (element.textContent !== newValue) {
            // Appliquer l'animation CSS
            element.classList.add('changing');
            
            // Mettre à jour la valeur après un court délai
            setTimeout(() => {
                element.textContent = newValue;
                
                // Retirer l'effet après l'animation
                setTimeout(() => {
                    element.classList.remove('changing');
                }, 600);
            }, 50);
        }
    }
    
    displayLaunch() {
        this.daysElement.textContent = '00';
        this.hoursElement.textContent = '00';
        this.minutesElement.textContent = '00';
        this.secondsElement.textContent = '00';
        
        const countdownTitle = document.querySelector('.countdown h3');
        countdownTitle.innerHTML = '🚀 C\'EST PARTI ! 🚀';
        countdownTitle.style.animation = 'pulse 0.5s infinite';
        
        const countdown = document.querySelector('.countdown');
        countdown.style.background = 'linear-gradient(135deg, rgba(0, 212, 255, 0.1) 0%, rgba(123, 84, 247, 0.1) 100%)';
        countdown.style.borderColor = 'rgba(0, 212, 255, 0.6)';
        
        this.launchConfetti();
    }
    
    launchConfetti() {
        const confettiContainer = document.getElementById('confetti-container');
        
        for (let i = 0; i < 200; i++) {
            setTimeout(() => {
                const confetti = document.createElement('div');
                confetti.style.position = 'absolute';
                confetti.style.width = Math.random() * 12 + 8 + 'px';
                confetti.style.height = confetti.style.width;
                confetti.style.backgroundColor = this.getRandomColor();
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '-20px';
                confetti.style.opacity = '0.9';
                confetti.style.boxShadow = '0 0 10px currentColor';
                confetti.style.zIndex = '100';
                
                confettiContainer.appendChild(confetti);
                
                const animation = confetti.animate([
                    { 
                        transform: 'translateY(0) rotate(0deg) scale(1)', 
                        opacity: 1 
                    },
                    { 
                        transform: `translateY(${window.innerHeight}px) rotate(${Math.random() * 720}deg) scale(0)`, 
                        opacity: 0 
                    }
                ], {
                    duration: Math.random() * 3000 + 2000,
                    easing: 'cubic-bezier(0.215, 0.610, 0.355, 1)'
                });
                
                animation.onfinish = () => confetti.remove();
            }, i * 15);
        }
    }
    
    getRandomColor() {
        const colors = ['#00D4FF', '#7B54F7', '#3A2DCE', '#00FF41', '#FFFFFF', '#FF00FF'];
        return colors[Math.floor(Math.random() * colors.length)];
    }
}

// Gestion du formulaire client
class ClientContactForm {
    constructor() {
        this.form = document.getElementById('client-form');
        
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
    }
    
    handleSubmit(e) {
        e.preventDefault();
        
        // Validation des champs
        const formData = {
            name: document.getElementById('client-name').value.trim(),
            company: document.getElementById('client-company').value.trim(),
            email: document.getElementById('client-email').value.trim(),
            phone: document.getElementById('client-phone').value.trim(),
            project: document.getElementById('client-project').value.trim(),
            budget: document.getElementById('client-budget').value,
            deadline: document.getElementById('client-deadline').value
        };
        
        // Validation basique
        if (!formData.name) {
            this.showMessage('Veuillez entrer votre nom complet.', 'error');
            return;
        }
        
        if (!this.validateEmail(formData.email)) {
            this.showMessage('Veuillez entrer une adresse email valide.', 'error');
            return;
        }
        
        if (!formData.project) {
            this.showMessage('Veuillez décrire votre projet.', 'error');
            return;
        }
        
        // Simulation d'envoi
        const button = this.form.querySelector('.submit-btn');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
        button.disabled = true;
        
        setTimeout(() => {
            this.showMessage('✅ Votre demande a été envoyée avec succès ! Nous vous contacterons dans les 24h.', 'success');
            
            button.innerHTML = '<i class="fas fa-check"></i> Demande envoyée';
            button.style.background = 'linear-gradient(135deg, #00FF41 0%, #00CC66 100%)';
            
            // Réinitialiser le formulaire après 3 secondes
            setTimeout(() => {
                this.form.reset();
                button.innerHTML = originalText;
                button.style.background = '';
                button.disabled = false;
            }, 3000);
        }, 2000);
    }
    
    validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    showMessage(text, type) {
        const existingMessage = this.form.querySelector('.form-message');
        if (existingMessage) existingMessage.remove();
        
        const message = document.createElement('div');
        message.className = `form-message ${type}`;
        message.textContent = text;
        
        const submitBtn = this.form.querySelector('.submit-btn');
        this.form.insertBefore(message, submitBtn);
        
        setTimeout(() => message.remove(), 5000);
    }
}

// Initialisation au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    new StarsAnimation();
    new CountdownTimer();
    new ClientContactForm();
    
    createFloatingParticles();
    createOrbitalParticles();
});

// Particules flottantes supplémentaires
function createFloatingParticles() {
    const container = document.getElementById('floating-particles');
    
    for (let i = 0; i < 40; i++) {
        const particle = document.createElement('div');
        particle.style.position = 'absolute';
        particle.style.width = Math.random() * 4 + 1 + 'px';
        particle.style.height = particle.style.width;
        particle.style.backgroundColor = Math.random() > 0.5 ? 'rgba(0, 212, 255, 0.4)' : 'rgba(123, 84, 247, 0.3)';
        particle.style.borderRadius = '50%';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.zIndex = '0';
        particle.style.pointerEvents = 'none';
        particle.style.boxShadow = '0 0 5px currentColor';
        
        container.appendChild(particle);
        
        particle.animate([
            { 
                transform: 'translateY(0) translateX(0)', 
                opacity: 0 
            },
            { 
                transform: `translateY(${Math.random() * 100 - 50}px) translateX(${Math.random() * 100 - 50}px)`, 
                opacity: 0.7 
            },
            { 
                transform: `translateY(${Math.random() * 200 - 100}px) translateX(${Math.random() * 200 - 100}px)`, 
                opacity: 0 
            }
        ], {
            duration: Math.random() * 15000 + 8000,
            iterations: Infinity,
            direction: 'alternate',
            easing: 'ease-in-out'
        });
    }
}

// Créer des particules orbitales autour du logo
function createOrbitalParticles() {
    const orbitalContainer = document.querySelector('.orbital-particles');
    if (!orbitalContainer) return;
    
    for (let orbit = 0; orbit < 2; orbit++) {
        const radius = orbit === 0 ? 125 : 100;
        const particleCount = orbit === 0 ? 12 : 8;
        const speed = orbit === 0 ? 20000 : 15000;
        const direction = orbit === 0 ? 1 : -1;
        
        for (let i = 0; i < particleCount; i++) {
            setTimeout(() => {
                const particle = document.createElement('div');
                particle.style.position = 'absolute';
                particle.style.width = Math.random() * 3 + (orbit === 0 ? 2 : 1) + 'px';
                particle.style.height = particle.style.width;
                particle.style.backgroundColor = orbit === 0 ? 'rgba(0, 212, 255, 0.7)' : 'rgba(123, 84, 247, 0.5)';
                particle.style.borderRadius = '50%';
                particle.style.left = '50%';
                particle.style.top = '50%';
                particle.style.transform = `rotate(${(i * (360 / particleCount))}deg) translateX(${radius}px)`;
                particle.style.boxShadow = '0 0 8px currentColor';
                particle.style.zIndex = '-1';
                
                orbitalContainer.appendChild(particle);
                
                particle.animate([
                    { 
                        transform: `rotate(${(i * (360 / particleCount))}deg) translateX(${radius}px) rotate(0deg)` 
                    },
                    { 
                        transform: `rotate(${(i * (360 / particleCount)) + (360 * direction)}deg) translateX(${radius}px) rotate(${-360 * direction}deg)` 
                    }
                ], {
                    duration: speed + Math.random() * 5000,
                    iterations: Infinity,
                    easing: 'linear'
                });
            }, i * 100);
        }
    }
}