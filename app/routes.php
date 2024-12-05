<?php
require_once __DIR__ . './core/controller.php';
require_once __DIR__ . './core/router.php';

Router::get('/test', [HomeController::class, 'test']);
Router::get('/home', [HomeController::class, 'home']);
?>