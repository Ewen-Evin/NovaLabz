<?php
class HomeController {
    public function index() {
        $data = [
            'title' => 'Novalabz - Exploring the Future of Web Creation',
            'description' => 'Création de sites web innovants et solutions numériques premium',
            'base' => '/NovaLabz/public/'
        ];
        $this->render('home', $data);
    }
    
    public function services() {
        $data = [
            'title' => 'Services - Novalabz',
            'base' => '/NovaLabz/public/'
        ];
        $this->render('services', $data);
    }
    
    public function projects() {
        $data = [
            'title' => 'Projets - Novalabz',
            'base' => '/NovaLabz/public/'
        ];
        $this->render('projects', $data);
    }
    
    public function contact() {
        $data = [
            'title' => 'Contact - Novalabz',
            'base' => '/NovaLabz/public/'
        ];
        $this->render('contact', $data);
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