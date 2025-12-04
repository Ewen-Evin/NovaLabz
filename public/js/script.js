// Animation des étoiles
class StarsAnimation {
    constructor() {
        this.canvas = document.getElementById('starsCanvas');
        this.ctx = this.canvas.getContext('2d');
        this.stars = [];
        this.numberOfStars = 150;
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
            this.stars.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                radius: Math.random() * 1.5 + 0.5,
                speed: Math.random() * this.speed + 0.1,
                opacity: Math.random() * 0.8 + 0.2
            });
        }
    }
    
    animate() {
        requestAnimationFrame(() => this.animate());
        
        this.ctx.fillStyle = 'rgba(10, 26, 74, 0.1)';
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
        
        this.stars.forEach(star => {
            star.y += star.speed;
            
            if (star.y > this.canvas.height) {
                star.y = 0;
                star.x = Math.random() * this.canvas.width;
            }
            
            this.ctx.beginPath();
            this.ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
            this.ctx.fillStyle = `rgba(255, 255, 255, ${star.opacity})`;
            this.ctx.fill();
        });
    }
}

// Gestion de la navbar au scroll
class NavbarManager {
    constructor() {
        this.navbar = document.getElementById('navbar');
        this.lastScrollY = window.scrollY;
        this.ticking = false;
        
        this.init();
    }
    
    init() {
        window.addEventListener('scroll', () => this.onScroll());
    }
    
    onScroll() {
        this.lastScrollY = window.scrollY;
        
        if (!this.ticking) {
            requestAnimationFrame(() => {
                this.updateNavbar();
                this.ticking = false;
            });
            this.ticking = true;
        }
    }
    
    updateNavbar() {
        if (this.lastScrollY > 50) {
            this.navbar.classList.add('scrolled');
        } else {
            this.navbar.classList.remove('scrolled');
        }
    }
}

// Animation des compteurs
class CounterAnimation {
    constructor() {
        this.counters = document.querySelectorAll('.stat-number');
        this.observer = null;
        
        this.init();
    }
    
    init() {
        this.setupObserver();
    }
    
    setupObserver() {
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateCounter(entry.target);
                    this.observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        this.counters.forEach(counter => this.observer.observe(counter));
    }
    
    animateCounter(counter) {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counter.textContent = Math.floor(current);
        }, 16);
    }
}

// Menu mobile
class MobileMenu {
    constructor() {
        this.toggle = document.querySelector('.nav-toggle');
        this.menu = document.querySelector('.nav-menu');
        
        this.init();
    }
    
    init() {
        if (this.toggle) {
            this.toggle.addEventListener('click', () => this.toggleMenu());
        }
    }
    
    toggleMenu() {
        this.menu.classList.toggle('active');
        this.toggle.classList.toggle('active');
    }
}

// Initialisation au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    new StarsAnimation();
    new NavbarManager();
    new CounterAnimation();
    new MobileMenu();
    
    // Smooth scroll pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Gestion du responsive menu
document.querySelector('.nav-toggle')?.addEventListener('click', function() {
    this.classList.toggle('active');
    document.querySelector('.nav-menu').classList.toggle('active');
});