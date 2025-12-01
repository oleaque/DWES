<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Detail;
use AEV2\Entity\Order;
use AEV2\Repository\DetailRepository;
use AEV2\Repository\OrderRepository;
use AEV2\Views\DetailView;


class DetailController
{
    private EntityManager $entityManager;
    private OrderRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Order::class);
    }


    public function read(...$params): void
    {
        $id = $params[1];
        $detailId = intval($id);
        $order = $this->repository->find($detailId);

        if (!$order) {
            (new MainController)->noRuta();
            return;
        }

        $view = new DetailView();
        $view->renderDetail($order);
    }
}


