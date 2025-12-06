<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page introuvable - NovaLabz</title>
    <link rel="stylesheet" href="/NovaLabz/public/css/countdown.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Styles spécifiques 404 */
        .error-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .error-content {
            background: rgba(26, 26, 46, 0.7);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(123, 84, 247, 0.3);
            border-radius: 25px;
            padding: 4rem 3rem;
            max-width: 800px;
            width: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .error-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 25px;
            background: linear-gradient(90deg, transparent, var(--cyan), transparent);
            background-size: 400% 400%;
            z-index: 1;
            animation: border-scan 10s linear infinite;
            pointer-events: none;
        }

        .error-content::after {
            content: '';
            position: absolute;
            top: 1px;
            left: 1px;
            right: 1px;
            bottom: 1px;
            background: rgba(26, 26, 46, 0.7);
            border-radius: 24px;
            z-index: 1;
            pointer-events: none;
        }

        .error-number {
            font-size: 8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--cyan) 0%, var(--violet) 50%, var(--magenta) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 0 0 30px rgba(123, 84, 247, 0.5);
            position: relative;
            z-index: 2;
        }

        .error-title {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--white);
            position: relative;
            z-index: 2;
        }

        .error-message {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 3rem;
            line-height: 1.6;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
        }

        .error-actions {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 3rem;
            position: relative;
            z-index: 2;
        }

        .error-btn {
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--cyan) 0%, var(--violet) 100%);
            border: none;
            border-radius: 10px;
            color: var(--white);
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            transition: all 0.3s ease;
            text-decoration: none;
            min-width: 200px;
        }

        .error-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(123, 84, 247, 0.4);
            background: linear-gradient(135deg, var(--violet) 0%, var(--cyan) 100%);
        }

        .error-btn-outline {
            background: transparent;
            border: 1px solid var(--cyan);
            color: var(--cyan);
        }

        .error-btn-outline:hover {
            background: rgba(0, 212, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 212, 255, 0.2);
        }

        .error-astronaut {
            position: relative;
            margin: 2rem 0;
            z-index: 2;
        }

        .floating-astronaut {
            font-size: 4rem;
            animation: float 6s ease-in-out infinite;
            filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.5));
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            25% {
                transform: translateY(-20px) rotate(-5deg);
            }
            75% {
                transform: translateY(10px) rotate(5deg);
            }
        }

        .error-planets {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .planet {
            position: absolute;
            border-radius: 50%;
            opacity: 0.3;
        }

        .planet-1 {
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, var(--violet) 0%, transparent 70%);
            top: 10%;
            left: 10%;
            animation: orbit-1 20s linear infinite;
        }

        .planet-2 {
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, var(--cyan) 0%, transparent 70%);
            bottom: 20%;
            right: 15%;
            animation: orbit-2 15s linear infinite reverse;
        }

        @keyframes orbit-1 {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            100% {
                transform: translate(50px, 50px) rotate(360deg);
            }
        }

        @keyframes orbit-2 {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            100% {
                transform: translate(-30px, -30px) rotate(-360deg);
            }
        }

        .error-search {
            margin-top: 2rem;
            position: relative;
            z-index: 2;
        }

        .search-box {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(123, 84, 247, 0.3);
            border-radius: 50px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            border-color: var(--cyan);
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.2);
        }

        .search-input {
            flex: 1;
            padding: 1rem 1.5rem;
            background: transparent;
            border: none;
            color: var(--white);
            font-size: 1rem;
            outline: none;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-btn {
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, var(--cyan) 0%, var(--violet) 100%);
            border: none;
            color: var(--white);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: linear-gradient(135deg, var(--violet) 0%, var(--cyan) 100%);
        }

        @media (max-width: 768px) {
            .error-number {
                font-size: 6rem;
            }
            
            .error-title {
                font-size: 2rem;
            }
            
            .error-content {
                padding: 3rem 1.5rem;
            }
            
            .error-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .error-btn {
                width: 100%;
                max-width: 300px;
            }
        }

        @media (max-width: 480px) {
            .error-number {
                font-size: 4rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .error-message {
                font-size: 1rem;
            }
            
            .floating-astronaut {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Canvas des étoiles -->
    <canvas id="starsCanvas"></canvas>
    
    <!-- Conteneur principal 404 -->
    <div class="error-container">
        <!-- Planètes flottantes -->
        <div class="error-planets">
            <div class="planet planet-1"></div>
            <div class="planet planet-2"></div>
        </div>
        
        <div class="error-content">
            <!-- Astronaute flottant -->
            <div class="error-astronaut">
                <div class="floating-astronaut">👨‍🚀</div>
            </div>
            
            <!-- Numéro 404 -->
            <div class="error-number">404</div>
            
            <!-- Titre -->
            <h1 class="error-title">Houston, nous avons un problème !</h1>
            
            <!-- Message -->
            <p class="error-message">
                La page que vous recherchez s'est égarée dans l'espace numérique.
                Elle a peut-être été déplacée, supprimée ou n'a jamais existé dans cette galaxie.
            </p>
            
            <!-- Actions -->
            <div class="error-actions">
                <a href="/NovaLabz/" class="error-btn">
                    <i class="fas fa-rocket"></i>
                    Retour à l'accueil
                </a>
                <a href="/NovaLabz/countdown" class="error-btn error-btn-outline">
                    <i class="fas fa-globe"></i>
                    Voir le compte à rebours
                </a>
                <a href="javascript:history.back()" class="error-btn error-btn-outline">
                    <i class="fas fa-arrow-left"></i>
                    Page précédente
                </a>
            </div>
            
            <!-- Barre de recherche -->
            <div class="error-search">
                <p style="color: rgba(255, 255, 255, 0.7); margin-bottom: 1rem;">Recherchez quelque chose ?</p>
                <form action="/NovaLabz/search" method="GET" class="search-box">
                    <input type="text" name="q" class="search-input" placeholder="Rechercher sur NovaLabz...">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            
            <!-- Lien vers contact -->
            <div style="margin-top: 3rem; position: relative; z-index: 2;">
                <p style="color: rgba(255, 255, 255, 0.6);">
                    Vous ne trouvez toujours pas ce que vous cherchez ? 
                    <a href="/NovaLabz/contact" style="color: var(--cyan); text-decoration: none;">
                        Contactez-nous
                    </a>
                </p>
            </div>
        </div>
        
        <!-- Logo NovaLabz -->
        <div style="margin-top: 3rem; position: relative; z-index: 2;">
            <h2 style="color: var(--white); opacity: 0.8; font-size: 1.5rem; letter-spacing: 3px;">
                NOVALABZ
            </h2>
            <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.9rem; margin-top: 0.5rem;">
                Exploring the Future of Web Creation
            </p>
        </div>
    </div>
    
    <!-- Script du canvas d'étoiles -->
    <script src="<?php echo $base; ?>js/countdown.js"></script>
    
    <script>
        // Initialiser le canvas des étoiles
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('starsCanvas');
            const ctx = canvas.getContext('2d');
            
            // Ajuster la taille du canvas
            function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
                drawStars();
            }
            
            // Créer les étoiles
            let stars = [];
            
            function createStars() {
                stars = [];
                const starCount = Math.floor((window.innerWidth * window.innerHeight) / 8000);
                
                for (let i = 0; i < starCount; i++) {
                    stars.push({
                        x: Math.random() * canvas.width,
                        y: Math.random() * canvas.height,
                        size: Math.random() * 1.5 + 0.5,
                        speed: Math.random() * 0.3 + 0.1,
                        opacity: Math.random() * 0.8 + 0.2
                    });
                }
            }
            
            // Dessiner les étoiles
            function drawStars() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                // Fond spatial
                const gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
                gradient.addColorStop(0, '#0A0A15');
                gradient.addColorStop(0.5, '#0A1A4A');
                gradient.addColorStop(1, '#1a1a2e');
                ctx.fillStyle = gradient;
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                
                // Dessiner les étoiles
                stars.forEach(star => {
                    ctx.beginPath();
                    ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(255, 255, 255, ${star.opacity})`;
                    ctx.fill();
                    
                    // Animation twinkle
                    star.opacity += star.speed * 0.02;
                    if (star.opacity > 1 || star.opacity < 0.2) {
                        star.speed = -star.speed;
                    }
                });
                
                requestAnimationFrame(drawStars);
            }
            
            // Gestionnaires d'événements
            window.addEventListener('resize', resizeCanvas);
            
            // Initialiser
            resizeCanvas();
            createStars();
            drawStars();
            
            // Animation de la souris (étoiles filantes)
            let mouseX = 0;
            let mouseY = 0;
            const shootingStars = [];
            
            canvas.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                
                // Chance de créer une étoile filante
                if (Math.random() > 0.98) {
                    shootingStars.push({
                        x: mouseX,
                        y: mouseY,
                        length: Math.random() * 50 + 30,
                        speed: Math.random() * 5 + 3,
                        angle: Math.random() * Math.PI * 2
                    });
                }
            });
            
            // Animation des étoiles filantes
            function animateShootingStars() {
                shootingStars.forEach((star, index) => {
                    ctx.beginPath();
                    ctx.moveTo(star.x, star.y);
                    ctx.lineTo(
                        star.x + Math.cos(star.angle) * star.length,
                        star.y + Math.sin(star.angle) * star.length
                    );
                    ctx.strokeStyle = `rgba(0, 212, 255, ${star.opacity || 0.7})`;
                    ctx.lineWidth = 2;
                    ctx.stroke();
                    
                    star.x += Math.cos(star.angle) * star.speed;
                    star.y += Math.sin(star.angle) * star.speed;
                    star.length -= star.speed * 0.5;
                    
                    if (star.length <= 0) {
                        shootingStars.splice(index, 1);
                    }
                });
            }
            
            // Intégrer dans l'animation principale
            const originalDrawStars = drawStars;
            drawStars = function() {
                originalDrawStars.call(this);
                animateShootingStars();
            };
        });
        
        // Animation pour la recherche
        document.querySelector('.search-input').addEventListener('focus', function() {
            document.querySelector('.search-box').style.transform = 'scale(1.02)';
        });
        
        document.querySelector('.search-input').addEventListener('blur', function() {
            document.querySelector('.search-box').style.transform = 'scale(1)';
        });
    </script>
</body>
</html>
