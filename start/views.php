<?php

$config = require BASE_DIR . '/etc/config/views.php';

$views = new App\Views\ViewFactory($config['baseDir']);

return $views;
