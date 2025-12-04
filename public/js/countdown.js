// Animation des étoiles pour la page de compte à rebours
class StarsAnimation {
    constructor() {
        this.canvas = document.getElementById('starsCanvas');
        this.ctx = this.canvas.getContext('2d');
        this.stars = [];
        this.numberOfStars = 200;
        this.speed = 0.3;
        
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
            this.stars.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                radius: Math.random() * 2 + 0.5,
                speed: Math.random() * this.speed + 0.1,
                opacity: Math.random() * 0.8 + 0.2,
                twinkleSpeed: Math.random() * 0.05 + 0.01,
                twinkleOffset: Math.random() * Math.PI * 2
            });
        }
    }
    
    animate() {
        requestAnimationFrame(() => this.animate());
        
        this.ctx.fillStyle = 'rgba(10, 26, 74, 0.1)';
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
        
        const time = Date.now() * 0.001;
        
        this.stars.forEach(star => {
            star.y += star.speed;
            
            if (star.y > this.canvas.height) {
                star.y = 0;
                star.x = Math.random() * this.canvas.width;
            }
            
            const twinkle = Math.sin(time * star.twinkleSpeed + star.twinkleOffset) * 0.3 + 0.7;
            const currentOpacity = star.opacity * twinkle;
            
            this.ctx.beginPath();
            this.ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
            
            const gradient = this.ctx.createRadialGradient(
                star.x, star.y, 0,
                star.x, star.y, star.radius * 2
            );
            gradient.addColorStop(0, `rgba(255, 255, 255, ${currentOpacity})`);
            gradient.addColorStop(1, `rgba(255, 255, 255, 0)`);
            
            this.ctx.fillStyle = gradient;
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
        
        this.updateCountdown();
        setInterval(() => this.updateCountdown(), 1000);
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
        
        this.animateNumber(this.daysElement, days.toString().padStart(2, '0'));
        this.animateNumber(this.hoursElement, hours.toString().padStart(2, '0'));
        this.animateNumber(this.minutesElement, minutes.toString().padStart(2, '0'));
        this.animateNumber(this.secondsElement, seconds.toString().padStart(2, '0'));
        
        // Effet spécial quand on approche de zéro
        if (days === 0 && hours < 24) {
            document.querySelector('.countdown').style.boxShadow = '0 0 40px rgba(255, 0, 255, 0.5)';
        }
    }
    
    animateNumber(element, newValue) {
        if (element.textContent !== newValue) {
            element.style.transform = 'scale(1.1)';
            element.style.color = '#FF00FF';
            
            setTimeout(() => {
                element.textContent = newValue;
                element.style.transform = 'scale(1)';
                element.style.color = '';
            }, 150);
        }
    }
    
    displayLaunch() {
        this.daysElement.textContent = '00';
        this.hoursElement.textContent = '00';
        this.minutesElement.textContent = '00';
        this.secondsElement.textContent = '00';
        
        document.querySelector('.countdown h3').textContent = '🚀 C\'EST PARTI ! 🚀';
        document.querySelector('.countdown').style.animation = 'pulse 0.5s infinite';
        
        // Lancer les confettis
        this.launchConfetti();
    }
    
    launchConfetti() {
        // Animation de confettis simple
        const confettiContainer = document.getElementById('confetti-container');
        
        for (let i = 0; i < 150; i++) {
            setTimeout(() => {
                const confetti = document.createElement('div');
                confetti.style.position = 'absolute';
                confetti.style.width = '10px';
                confetti.style.height = '10px';
                confetti.style.backgroundColor = this.getRandomColor();
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '-10px';
                confetti.style.opacity = '0.8';
                
                confettiContainer.appendChild(confetti);
                
                // Animation
                const animation = confetti.animate([
                    { transform: 'translateY(0) rotate(0deg)', opacity: 1 },
                    { transform: `translateY(${window.innerHeight}px) rotate(${Math.random() * 360}deg)`, opacity: 0 }
                ], {
                    duration: Math.random() * 3000 + 2000,
                    easing: 'cubic-bezier(0.215, 0.610, 0.355, 1)'
                });
                
                animation.onfinish = () => confetti.remove();
            }, i * 20);
        }
    }
    
    getRandomColor() {
        const colors = ['#FF00FF', '#00D4FF', '#7B54F7', '#3A2DCE', '#FFFFFF'];
        return colors[Math.floor(Math.random() * colors.length)];
    }
}

// Gestion du formulaire
class NewsletterForm {
    constructor() {
        this.form = document.getElementById('newsletter-form');
        this.emailInput = this.form.querySelector('input[type="email"]');
        
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
    }
    
    handleSubmit(e) {
        e.preventDefault();
        
        const email = this.emailInput.value.trim();
        
        if (!this.validateEmail(email)) {
            this.showMessage('Veuillez entrer une adresse email valide.', 'error');
            return;
        }
        
        // Simulation d'envoi
        this.showMessage('🎉 Super ! Vous serez notifié en priorité !', 'success');
        this.emailInput.value = '';
        
        // Animation de confirmation
        const button = this.form.querySelector('button');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check"></i> Inscrit !';
        button.style.background = 'linear-gradient(135deg, #00FF88 0%, #00CC66 100%)';
        
        setTimeout(() => {
            button.innerHTML = originalText;
            button.style.background = '';
        }, 3000);
    }
    
    validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    showMessage(text, type) {
        // Supprimer les messages existants
        const existingMessage = this.form.querySelector('.form-message');
        if (existingMessage) existingMessage.remove();
        
        const message = document.createElement('div');
        message.className = `form-message ${type}`;
        message.textContent = text;
        message.style.cssText = `
            margin-top: 1rem;
            padding: 0.8rem;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            background: ${type === 'success' ? 'rgba(0, 255, 136, 0.1)' : 'rgba(255, 0, 68, 0.1)'};
            color: ${type === 'success' ? '#00FF88' : '#FF0044'};
            border: 1px solid ${type === 'success' ? 'rgba(0, 255, 136, 0.3)' : 'rgba(255, 0, 68, 0.3)'};
        `;
        
        this.form.appendChild(message);
        
        setTimeout(() => message.remove(), 5000);
    }
}

// Initialisation au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    new StarsAnimation();
    new CountdownTimer();
    new NewsletterForm();
    
    // Effet de particules supplémentaires
    createFloatingParticles();
});

// Particules flottantes supplémentaires
function createFloatingParticles() {
    const container = document.querySelector('.countdown-container');
    
    for (let i = 0; i < 20; i++) {
        const particle = document.createElement('div');
        particle.style.position = 'absolute';
        particle.style.width = Math.random() * 4 + 1 + 'px';
        particle.style.height = particle.style.width;
        particle.style.backgroundColor = 'rgba(0, 212, 255, 0.3)';
        particle.style.borderRadius = '50%';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.zIndex = '0';
        particle.style.pointerEvents = 'none';
        
        container.appendChild(particle);
        
        // Animation
        particle.animate([
            { transform: 'translateY(0) translateX(0)', opacity: 0 },
            { transform: `translateY(${Math.random() * 100 - 50}px) translateX(${Math.random() * 100 - 50}px)`, opacity: 0.5 },
            { transform: `translateY(${Math.random() * 200 - 100}px) translateX(${Math.random() * 200 - 100}px)`, opacity: 0 }
        ], {
            duration: Math.random() * 10000 + 5000,
            iterations: Infinity,
            direction: 'alternate'
        });
    }
}