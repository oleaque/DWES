<?php

namespace AP40\Views;

use AP40\Entity\User;

class MainView
{
    const HTML = __DIR__ . '/../../public/assets/main.html';

    /**
     * Renderiza la vista de listado de tareas.
     * @param User|null $user
     * @return void
     */
    public function render(User $user = null): void
    {
        require_once self::HTML;
    }

}