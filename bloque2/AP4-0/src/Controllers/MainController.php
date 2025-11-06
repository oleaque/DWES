<?php

namespace AP40\Controllers;

use AP40\Core\EntityManager;
use AP40\Entity\User;
use AP40\Views\MainView;

/**
 * Controlador para la ruta /detalle
 */
class MainController
{

    public function main()
    {
        $entityManager = new EntityManager();
        $userRepository = $entityManager->getEntityManager()->getRepository(User::class);
        $user = $userRepository->find(1);
//        $user = $userRepository->findOneBy(['name' => 'david']);
        //Ahora recibimos todos los datos que existan en la tabla.
        $view = new MainView();
        $view->render($user);
    }
}