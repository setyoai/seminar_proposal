<?php

namespace App\Controllers;

class MainMenu extends BaseController
{
    public function index(): string
    {
        return view('main_menu/get');
    }
}
