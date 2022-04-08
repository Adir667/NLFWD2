<?php

class HomeController {


    public function home() {
        require_once (__DIR__ . '/../view/homepage.php');
    }

    public function about () {
        echo "This is a about page";
    }

    public function login () {
        require_once (__DIR__ . '/../view/login.php');
    }

    public function confirm () {
        require_once (__DIR__ . '/../view/confirm.html');
    }

}