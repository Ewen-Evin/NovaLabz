// ==================== ANIMATION DES ÉTOILES ====================
class StarsAnimation {
    constructor() {
        this.canvas = document.getElementById('starsCanvas');
        if (!this.canvas) return;
        
        this.ctx = this.canvas.getContext('2d');
        this.stars = [];
        this.numberOfStars = 300;
        this.speed = 0.5;
        this.isMobile = window.innerWidth <= 768;
        
        this.init();
        if (!this.isMobile) {
            this.animate();
        } else {
            this.drawStaticStars();
        }
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
        const wasMobile = this.isMobile;
        this.isMobile = window.innerWidth <= 768;
        
        this.resizeCanvas();
        this.createStars();
        
        if (wasMobile !== this.isMobile) {
            if (this.isMobile) {
                this.drawStaticStars();
            } else {
                this.animate();
            }
        } else if (this.isMobile) {
            this.drawStaticStars();
        }
    }
    
    createStars() {
        this.stars = [];
        const starCount = this.isMobile ? 150 : this.numberOfStars;
        
        for (let i = 0; i < starCount; i++) {
            const size = Math.random();
            this.stars.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                radius: size * 2 + 0.5,
                speed: Math.random() * this.speed + 0.1,
                opacity: size * 0.6 + 0.3,
                twinkleSpeed: Math.random() * 0.05 + 0.01,
                twinkleOffset: Math.random() * Math.PI * 2,
                color: Math.random() > 0.8 ? '#00D4FF' : '#FFFFFF',
                trail: [],
                maxTrailLength: Math.floor(Math.random() * 5) + 3
            });
        }
    }
    
    animate() {
        if (this.isMobile) return;
        
        requestAnimationFrame(() => this.animate());
        
        const gradient = this.ctx.createLinearGradient(0, 0, 0, this.canvas.height);
        gradient.addColorStop(0, 'rgba(10, 10, 21, 0.25)');
        gradient.addColorStop(1, 'rgba(10, 26, 74, 0.15)');
        
        this.ctx.fillStyle = gradient;
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
        
        const time = Date.now() * 0.001;
        
        this.stars.forEach(star => {
            star.trail.push({x: star.x, y: star.y, opacity: star.opacity});
            
            if (star.trail.length > star.maxTrailLength) {
                star.trail.shift();
            }
            
            star.y += star.speed;
            
            if (star.y > this.canvas.height) {
                star.y = 0;
                star.x = Math.random() * this.canvas.width;
                star.trail = [];
            }
            
            const twinkle = Math.sin(time * star.twinkleSpeed + star.twinkleOffset) * 0.4 + 0.6;
            const currentOpacity = star.opacity * twinkle;
            
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
    
    drawStaticStars() {
        const gradient = this.ctx.createLinearGradient(0, 0, 0, this.canvas.height);
        gradient.addColorStop(0, '#0A0A15');
        gradient.addColorStop(1, '#0A1A4A');
        
        this.ctx.fillStyle = gradient;
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
        
        this.stars.forEach(star => {
            this.ctx.beginPath();
            this.ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
            
            const starGradient = this.ctx.createRadialGradient(
                star.x, star.y, 0,
                star.x, star.y, star.radius * 2
            );
            
            if (star.color === '#00D4FF') {
                starGradient.addColorStop(0, `rgba(0, 212, 255, ${star.opacity})`);
                starGradient.addColorStop(0.7, `rgba(0, 212, 255, ${star.opacity * 0.3})`);
                starGradient.addColorStop(1, 'rgba(0, 212, 255, 0)');
            } else {
                starGradient.addColorStop(0, `rgba(255, 255, 255, ${star.opacity})`);
                starGradient.addColorStop(0.7, `rgba(255, 255, 255, ${star.opacity * 0.3})`);
                starGradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
            }
            
            this.ctx.fillStyle = starGradient;
            this.ctx.fill();
        });
    }
}

// ==================== PARTICULES FLOTTANTES ====================
function createFloatingParticles() {
    const container = document.getElementById('floating-particles');
    if (!container || window.innerWidth <= 768) return;
    
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

// ==================== PARTICULES ORBITALES ====================
function createOrbitalParticles() {
    const orbitalContainer = document.querySelector('.orbital-particles');
    if (!orbitalContainer || window.innerWidth <= 768) return;
    
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

// ==================== GESTION DU FORMULAIRE DE CONTACT ====================
class ContactForm {
    constructor() {
        this.form = document.getElementById('contact-form');
        
        if (this.form) {
            this.form.addEventListener('submit', (e) => this.handleSubmit(e));
        }
    }
    
    handleSubmit(e) {
        e.preventDefault();
        
        const submitBtn = this.form.querySelector('.submit-btn');
        const formMessage = this.form.querySelector('.form-message');
        const originalBtnText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
        submitBtn.disabled = true;
        
        if (formMessage) {
            formMessage.style.display = 'none';
            formMessage.className = 'form-message';
            formMessage.innerHTML = '';
        }
        
        const formData = new FormData(this.form);
        
        fetch(this.form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Réponse serveur:", data);
            
            if (formMessage) {
                if (data.includes('Succès')) {
                    formMessage.innerHTML = '<i class="fas fa-check-circle"></i> Votre demande a été envoyée avec succès ! Nous vous contacterons sous 24h.';
                    formMessage.classList.add('success');
                    this.form.reset();
                } else {
                    formMessage.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + data;
                    formMessage.classList.add('error');
                }
                formMessage.style.display = 'block';
            }
        })
        .catch(error => {
            if (formMessage) {
                formMessage.innerHTML = '<i class="fas fa-exclamation-circle"></i> Une erreur s\'est produite. Veuillez réessayer ou nous contacter directement à contact@novalabz.fr';
                formMessage.classList.add('error');
                formMessage.style.display = 'block';
            }
            console.error('Erreur:', error);
        })
        .finally(() => {
            submitBtn.innerHTML = originalBtnText;
            submitBtn.disabled = false;
            
            if (formMessage) {
                setTimeout(() => {
                    formMessage.style.display = 'none';
                }, 10000);
            }
        });
    }
}

// ==================== NAVBAR SCROLL EFFECT ====================
function initNavbarScroll() {
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
}

// ==================== MENU MOBILE ====================
function initMobileMenu() {
    const mobileBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    
    if (mobileBtn && navLinks) {
        mobileBtn.addEventListener('click', () => {
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            navLinks.style.flexDirection = 'column';
            navLinks.style.position = 'absolute';
            navLinks.style.top = '100%';
            navLinks.style.left = '0';
            navLinks.style.right = '0';
            navLinks.style.background = 'rgba(10, 10, 21, 0.95)';
            navLinks.style.padding = '1rem';
            navLinks.style.borderTop = '1px solid rgba(123, 84, 247, 0.2)';
        });
    }
}

// ==================== ANIMATIONS AU SCROLL ====================
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    const animatedElements = document.querySelectorAll('.valeur-card, .service-card, .process-step, .contact-card');
    animatedElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(element);
    });
}

// ==================== INITIALISATION ====================
document.addEventListener('DOMContentLoaded', () => {
    new StarsAnimation();
    new ContactForm();
    
    if (window.innerWidth > 768) {
        createFloatingParticles();
        createOrbitalParticles();
    }
    
    initNavbarScroll();
    initMobileMenu();
    initScrollAnimations();
});