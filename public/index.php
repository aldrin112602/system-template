<?php
require_once '../vendor/autoload.php';
$rootDirectory = dirname(__DIR__);

$loader = new \Twig\Loader\FilesystemLoader([$rootDirectory.'/App', $rootDirectory.'/src/View']);
$twig = new \Twig\Environment($loader);

function Route($path, $method, $callback = null) {
    global $twig;
    $requestUri = trim($_SERVER['REQUEST_URI'], '/');
    $route = ($requestUri !== '') ? $requestUri : '/';
    
    if ($route !== $path) {
        return;
    }

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
                # code...
                break;
            case 'post':
                # code...
                break;
            case 'delete':
                # code...
                break;
            case 'put':
                # code...
                break;
            default:
                # code...
                break;
        }
        $callback();
    }
}
require_once './Routes.php';
?>