<?php

namespace AP50\Views;

class FormTaskView
{
    public function render($update = false, $task = null)
    {
        $template = __DIR__ . "/../../public/assets/form.html";
        include_once $template;
    }
}
