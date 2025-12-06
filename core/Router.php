<?php
class Router {
    private $routes = [];
    
    public function add($route, $controllerAction) {
        $this->routes[$route] = $controllerAction;
    }
    
    public function dispatch($uri) {
        $uri = parse_url($uri, PHP_URL_PATH);
        // Retirer éventuel suffixe '/' sauf pour la racine
        $uri = rtrim($uri, '/');
        if (empty($uri)) $uri = '/';
        
        // Si une constante BASE est définie (ex: '/mondossier/'), enlever ce préfixe de l'URI
        if (defined('BASE')) {
            $basePath = rtrim(BASE, '/'); // '/dossier' ou ''
            if ($basePath !== '' && strpos($uri, $basePath) === 0) {
                $uri = substr($uri, strlen($basePath));
                if ($uri === '') $uri = '/';
            }
        }
        
        error_log("🔍 Routeur - URI traitée: '$uri'");
        
        // Trouver la route correspondante
        if (isset($this->routes[$uri])) {
            list($controller, $action) = explode('@', $this->routes[$uri]);
            
            error_log("🔍 Routeur - Contrôleur: $controller, Action: $action");
            
            // Inclure et instancier le contrôleur (chemin absolu basé sur ce fichier)
            $controllerFile = __DIR__ . '/../app/controllers/' . $controller . '.php';
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controllerInstance = new $controller();
                if (method_exists($controllerInstance, $action)) {
                    $controllerInstance->$action();
                } else {
                    $this->notFound();
                }
            } else {
                $this->notFound();
            }
        } else {
            $this->notFound();
        }
    }
    
    private function notFound() {
        http_response_code(404);
        
        // Afficher une vue 404 (chemin basé sur __DIR__)
        $viewFile = __DIR__ . '/../app/views/404.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            // Page 404 par défaut
            echo '<h1>404 - Page non trouvée</h1>';
            echo '<p>La page que vous recherchez n\'existe pas.</p>';
            echo '<a href="' . (defined('BASE') ? BASE : '/') . '">Retour à l\'accueil</a>';
        }
        exit;
    }
}
?>