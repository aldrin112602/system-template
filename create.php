<?php

if ($argc < 3) {
    echo "Usage: php create.php <type> <name>\n";
    exit(1);
}

$type = strtolower($argv[1]);
$name = ucfirst($argv[2]);

switch ($type) {
    case 'controller':
        createController($name);
        break;

    case 'model':
        createModel($name);
        break;

    case 'view':
        createView($name);
        break;

    default:
        echo "Invalid type. Supported types: controller, model\n";
        exit(1);
}

function createController($name) {
    $controllerContent = "<?php

class {$name} {
    // Controller logic goes here
}
";

    $filename = "src/Controller/{$name}.php";

    if (file_exists($filename)) {
        echo "Controller file already exists at $filename\n";
    } else {
        file_put_contents($filename, $controllerContent);
        echo "Controller file created at $filename\n";
    }
}

function createModel($name) {
    $modelContent = "<?php

class {$name} {
    // Model logic goes here
}
";

    $filename = "src/Model/{$name}.php";

    if (file_exists($filename)) {
        echo "Model file already exists: $filename\n";
    } else {
        file_put_contents($filename, $modelContent);
        echo "Model file created: $filename\n";
    }
}

function createView($name) {
    $viewContent = "<?php
    
";

    $filename = "src/View/{$name}.php";

    if (file_exists($filename)) {
        echo "View file already exists: $filename\n";
    } else {
        file_put_contents($filename, $viewContent);
        echo "View file created: $filename\n";
    }
}
