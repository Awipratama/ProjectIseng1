<?php
require_once __DIR__ . './controller.php';
class HomeController extends Constroller
{
    public function test()
    {
        echo 'From test';
    }

    public function home()
    {
        require_once __DIR__ . './../views/home.html';
    }
}
?>