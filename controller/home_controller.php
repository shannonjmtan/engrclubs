<?php

class Home_Controller extends Controller
{
    public function home()
    {
        $view = new View('home/home');
        echo $view->render();
    }
}