<?php

namespace AEV2\Views;

class DetailView
{
    public function renderDetail($order)
    {
        $template = __DIR__ . "/../../public/assets/DetailList.html";
        include_once $template;
    }
}
