<?php

namespace AP50\Views;

class ListTasksView
{
    public function render(array $tasks)
    {
        $template = __DIR__ . "/../../public/assets/list.html";
        include_once $template;
    }
}
