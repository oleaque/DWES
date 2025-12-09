<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Client;
use AEV2\Entity\Order;
use AEV2\Repository\OrderRepository;
use AEV2\Views\DetailView;
use AEV2\Views\FormView;
use AEV2\Views\ListView;
use Exception;



class OrderController
{
    private EntityManager $entityManager;
    private OrderRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Order::class);
    }


    public function list(): void
    {
        $orders = $this->repository->findAll();
        $view = new ListView();
        $view->renderOrder($orders);
    }
    public function crud(...$params): void
    {
        $action = $params[0] ?? null;
        $id = $params[1] ?? null;

        switch ($action) {
            case 'create':
                $this->create();
                break;
            case '':
                $this->read();
                break;
            case 'read':
                $this->readDetail($id);
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
            default:
                $this->noRuta();
        }
    }


    private function create(): void
    {
        $ordersAll = $this->repository->findAll();

        if (isset($_POST['submit'])) {
            $orders = new Order();
            $orders->setOrderNum($_POST['id']);
            $orders->setOrderDate(new \DateTime($_POST['order_date']));
            $orders->setOrderType($_POST['type']);
            $orders->setSendingDate(new \DateTime($_POST['sending_date']));
            $orders->setTotal($_POST['total']);
            $clientRepository = $this->entityManager->getEntityManager()->getRepository(Client::class);
            $clients = $clientRepository->find($_POST['client']);
            $orders->setClientCode($clients);

            try{
                $em = $this->entityManager->getEntityManager();
                $em->persist($orders);
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die("Error al crear el pedido <br> <a href='/pedidos'>Volver a pedidos</a>");
            }
        } else {
            $view = new FormView();
            $view->renderCreateOrdForm($ordersAll);
        }
    }


    private function update(?string $id): void
    {
        $orderId = intval($id);
        $orders = $this->repository->find($orderId);
        $ordersAll = $this->repository->findAll();

        if (!$orders) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {
            if (isset($_POST['order_date']) ){
                $orders->setOrderDate(new \DateTime($_POST['order_date']));
            }
            if (isset($_POST['type']) ){
                $orders->setOrderType($_POST['type']);
            }
            if (isset($_POST['sending_date']) ){
                $orders->setSendingDate(new \DateTime($_POST['sending_date']));
            }
            if (isset($_POST['total']) ){
                $orders->setTotal($_POST['total']);
            }

            if (isset($_POST['client']) ){
                $clientRepository = $this->entityManager->getEntityManager()->getRepository(Client::class);
                $clients = $clientRepository->find($_POST['client']);
                $orders->setClientCode($clients);
            }

            try {
                $em = $this->entityManager->getEntityManager();
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die("Error al actualizar el pedido<br> <a href='/pedidos'>Volver a pedidos</a>");
            }
        } else {
            $view = new FormView();
            $view->renderUpdateordForm($orders, $ordersAll);
        }
    }


    private function delete(?string $id): void
    {
        $orderId = intval($id);
        $orders = $this->repository->find($orderId);

        if (!$orders) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {
            if (!isset($_POST['id']) ) {
                $this->noRuta();
                return;
            }
            $em = $this->entityManager->getEntityManager();
            try {
                $em->remove($orders);
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die("Error al eliminar el pedido<br> <a href='/pedidos'>Volver a pedidos</a>");
            }

        }else{
            $view = new FormView();
            $view->renderDeleteOrdForm($orders);
        }

    }
    private function read(): void
    {
        $orders = $this->repository->findAll();
        $view = new ListView();
        $view->renderOrder($orders);
    }

    private function readDetail(?string $id): void
    {
        $detailId = intval($id);
        $order = $this->repository->find($detailId);

        if (!$order) {
            (new MainController)->noRuta();
            return;
        }

        $view = new DetailView();
        $view->renderDetail($order);
    }

    private function noRuta()
    {
        (new MainController)->noRuta();
    }

}

