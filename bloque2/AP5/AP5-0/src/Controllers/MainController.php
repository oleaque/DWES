<?php
declare(strict_types=1);

namespace AP50\Controllers;

use AP50\Views\MainView;

class MainController
{

    public function main(): void
    {
        $view = new MainView();
        $view->render();
    }

    public function noRuta(): void
    {
        $view = new MainView();
        $view->error();
    }
}
