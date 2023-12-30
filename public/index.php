<?php
require_once '../vendor/autoload.php';
$rootDirectory = dirname(__DIR__);

$loader = new \Twig\Loader\FilesystemLoader([$rootDirectory.'/App', $rootDirectory.'/src/View']);
$twig = new \Twig\Environment($loader);

function render404Page() {
    global $twig;
    echo $twig->render('PageNotFound/index.twig');
}

function Route($path, $method, $callback = null) {
    global $twig;
    $requestUri = trim($_SERVER['REQUEST_URI'], '/');
    $route = ($requestUri !== '') ? $requestUri : '/';

    if ($route === $path) {
        $viewFile = "{$path}/index.twig";
        echo $twig->render('index.twig', [
            'title' => ucfirst($route),
            'content' => file_exists("../src/View/{$viewFile}") ? $twig->render($viewFile) : (
                file_exists("../src/View/LandingPage/index.twig") ? $twig->render('LandingPage/index.twig') : 'Page not found'
            ),
        ]);

        if ($callback && is_callable($callback)) {
            switch ($method) {
                case 'get':
                    // Your additional logic for 'get' method
                    break;
                case 'post':
                    // Your additional logic for 'post' method
                    break;
                case 'delete':
                    // Your additional logic for 'delete' method
                    break;
                case 'put':
                    // Your additional logic for 'put' method
                    break;
                default:
                    // Your default logic
                    break;
            }
            $callback();
        }

        // Exit the function after rendering the matched route
        return;
    }

    // No matching route, display the default 404 page
    
}

require_once './Routes.php';
?>
