<?php

class MainController extends Controller
{
    public function main()
    {
        $this->view('main');
    }

    public function notFound()
    {
        $this->view('404');
    }
}