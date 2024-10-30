<?php

declare(strict_types=1);

/**
 * @var \App\Core\Application
 */
$app = require '../start/app.php';

$view = $app->view('layouts/main.php')->start(); ?>
Hello, again.
<?php $view->end();
