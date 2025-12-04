<?php
class Router {
    private $routes = [];
    
    public function add($route, $controllerAction) {
        $this->routes[$route] = $controllerAction;
    }
    
    public function dispatch($uri) {
        // Pour Laragon, enlever le base path
        $basePath = '/NovaLabz/public';
        $uri = str_replace($basePath, '', $uri);
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/');
        if (empty($uri)) $uri = '/';
        
        error_log("URI traitée: " . $uri); // Debug
        
        // Trouver la route correspondante
        if (isset($this->routes[$uri])) {
            list($controller, $action) = explode('@', $this->routes[$uri]);
            
            // Inclure et instancier le contrôleur
            $controllerFile = "../app/controllers/{$controller}.php";
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
        echo "<h1>Page non trouvée</h1>";
        echo "<p>La page que vous recherchez n'existe pas.</p>";
        echo "<a href='".BASE."'>Retour à l'accueil</a>";
        exit;
    }
}
?>