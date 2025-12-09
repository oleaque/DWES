<?php

namespace AP51\Views;

class DetailTaskView
{
    public function render($task)
    {
        $template = __DIR__ . "/../../public/assets/detail.html";
        include_once $template;
    }
}
