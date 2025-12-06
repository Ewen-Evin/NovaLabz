<?php
class HomeController {
    public function index() {
        // Vérifier si la date de lancement est atteinte
        if (!$this->isLaunched()) {
            header('Location: ' . BASE);
            exit;
        }
        
        $data = [
            'title' => 'Novalabz - Exploring the Future of Web Creation',
            'description' => 'Création de sites web innovants et solutions numériques premium'
        ];
        $this->render('home', $data);
    }
    
    public function services() {
        if (!$this->isLaunched()) {
            header('Location: ' . BASE);
            exit;
        }
        
        $data = [
            'title' => 'Services - Novalabz'
        ];
        $this->render('services', $data);
    }
    
    public function projects() {
        if (!$this->isLaunched()) {
            header('Location: ' . BASE);
            exit;
        }
        
        $data = [
            'title' => 'Projets - Novalabz'
        ];
        $this->render('projects', $data);
    }
    
    public function contact() {
        if (!$this->isLaunched()) {
            header('Location: ' . BASE);
            exit;
        }
        
        $data = [
            'title' => 'Contact - Novalabz'
        ];
        $this->render('contact', $data);
    }
    
    public function countdown() {
        $data = [
            'title' => 'Novalabz - Bientôt disponible',
            'base' => rtrim(BASE, '/') . '/public/',
            'route_base' => BASE
        ];
        
        extract($data);
        
        require_once __DIR__ . '/../views/countdown.php';
        exit;
    }
    
    private function isLaunched() {
        $currentDate = new DateTime();
        $launchDate = new DateTime('2026-01-01');
        return $currentDate >= $launchDate;
    }
    
    private function render($view, $data = []) {
        // Préparer des variables utiles pour les vues :
        // - route_base : base pour la génération d'URLs côté routing (ex: '/mondossier/')
        // - base (assets) : base pour les assets (ex: '/mondossier/public/')
        $data['route_base'] = BASE;
        $data['base'] = rtrim(BASE, '/') . '/public/'; // assets sous /public/
        
        extract($data);
        
        // Inclure les partials et la vue (chemins basés sur __DIR__)
        require_once __DIR__ . '/../views/partials/header.php';
        require_once __DIR__ . "/../views/{$view}.php";
        require_once __DIR__ . '/../views/partials/footer.php';
    }
}
?>