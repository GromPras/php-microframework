<?php

namespace App\controllers;

class PagesController
{
    public function __construct() {}

    public function home()
    {
        loadView('pages/home');
    }
}
