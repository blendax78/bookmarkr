<?php

namespace Airwatch\Controllers;

class IndexController extends Controller
{
    public function __construct()
    {
        // Basic controller for index view.
        $indexView = new \Airwatch\Views\IndexView();
        $indexView->render();
    }
}