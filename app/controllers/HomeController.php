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
            'description' => 'Création de sites web innovants et solutions numériques premium',
            'base' => BASE
        ];
        $this->render('home', $data);
    }
    
    public function services() {
        if (!$this->isLaunched()) {
            header('Location: ' . BASE);
            exit;
        }
        
        $data = [
            'title' => 'Services - Novalabz',
            'base' => BASE
        ];
        $this->render('services', $data);
    }
    
    public function projects() {
        if (!$this->isLaunched()) {
            header('Location: ' . BASE);
            exit;
        }
        
        $data = [
            'title' => 'Projets - Novalabz',
            'base' => BASE
        ];
        $this->render('projects', $data);
    }
    
    public function contact() {
        if (!$this->isLaunched()) {
            header('Location: ' . BASE);
            exit;
        }
        
        $data = [
            'title' => 'Contact - Novalabz',
            'base' => BASE
        ];
        $this->render('contact', $data);
    }
    
    public function countdown() {
        $data = [
            'title' => 'Novalabz - Bientôt disponible',
            'base' => BASE
        ];
        
        // Toujours accessible
        require_once '../app/views/countdown.php';
        exit;
    }
    
    private function isLaunched() {
        $currentDate = new DateTime();
        $launchDate = new DateTime('2026-01-01');
        return $currentDate >= $launchDate;
    }
    
    private function render($view, $data = []) {
        extract($data);
        
        // Inclure les partials et la vue
        require_once '../app/views/partials/header.php';
        require_once "../app/views/{$view}.php";
        require_once '../app/views/partials/footer.php';
    }
}
?>