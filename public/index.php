<?php

require '../vendor/autoload.php';

$rootDirectory = dirname(__DIR__); // Get the root directory of your project

$loader = new \Twig\Loader\FilesystemLoader([$rootDirectory.'/App', $rootDirectory.'/src/View']);
$twig = new \Twig\Environment($loader);

// Get the requested route from the URL
$requestUri = trim($_SERVER['REQUEST_URI'], '/');
$route = ($requestUri !== '') ? $requestUri : 'home';

// Use the route to determine the view file
$viewFile = "{$route}/index.twig";

// Output some debugging information
echo "Requested Route: $route<br>";
echo "Template Path: ../src/View/{$viewFile}<br>";

// Render the main template, passing the title and including the dynamic content
echo $twig->render('index.twig', [
    'title' => ucfirst($route), // You can customize the title based on the route
    'content' => file_exists("../src/View/{$viewFile}") ? $twig->render($viewFile) : 'Page not found',
]);
