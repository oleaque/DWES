<?php

namespace AP41\Controllers;

class MainController
{
    public function noRuta(): void
    {
        $vista = new MainView();
        $vista->error();
    }
}