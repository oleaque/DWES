<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Client;
use AEV2\Entity\Employee;
use AEV2\Repository\ClientRepository;
use AEV2\Views\FormView;
use AEV2\Views\ListView;
use Exception;


class ClientController
{
    private EntityManager $entityManager;
    private ClientRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Client::class);
    }


    public function list(): void
    {
        $clients = $this->repository->findAll();
        $view = new ListView();
        $view->renderClient($clients);
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

        $clientsAll = $this->repository->findAll();

        if (isset($_POST['submit'])) {
            $clients = new Client();
            $clients->setClientCode($_POST['id']);
            $clients->setName($_POST['name']);
            $clients->setAddress($_POST['adress']);
            $clients->setCity($_POST['city']);
            $clients->setStatus($_POST['status']);
            $clients->setPostalCode($_POST['postal_code']);
            $clients->setArea($_POST['area']);
            $clients->setPhone($_POST['phone']);
            $clients->setCredit($_POST['credit_limit']);
            $clients->setObservations($_POST['observations']);
            $employeesRepository = $this->entityManager->getEntityManager()->getRepository(Employee::class);
            $employees = $employeesRepository->find($_POST['representant']);
            $clients->setRepresentant($employees);


            try {
                $em = $this->entityManager->getEntityManager();
                $em->persist($clients);
                $em->flush();
                $this->list();
                }catch (Exception $e){
                die('Error al crear cliente <br> <a href="/clientes">Volver a clientes</a>');
            }

        } else {
            $view = new FormView();
            $view->renderCreateCliForm($clientsAll);
        }
    }


    private function update(?string $id): void
    {
        $clientID = intval($id);
        $clients = $this->repository->find($clientID);
        $clientsAll = $this->repository->findAll();

        if (!$clients) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {

            if (isset($_POST['name']) ){
                $clients->setName($_POST['name']);;
            }
            if (isset($_POST['adress']) ){
                $clients->setAddress($_POST['adress']);
            }
            if (isset($_POST['city']) ){
                $clients->setCity($_POST['city']);
            }
            if (isset($_POST['status']) ){
                $clients->setStatus($_POST['status']);
            }
            if (isset($_POST['postal_code']) ){
                $clients->setPostalCode($_POST['postal_code']);
            }
            if (isset($_POST['area']) ){
                $clients->setArea($_POST['area']);
            }
            if (isset($_POST['phone']) ){
                $clients->setPhone($_POST['phone']);
            }
            if (isset($_POST['credit_limit']) ){
                $clients->setCredit($_POST['credit_limit']);
            }
            if (isset($_POST['observations']) ){
                $clients->setObservations($_POST['observations']);
            }
            if (isset($_POST['representant']) ){
                $employeesRepository = $this->entityManager->getEntityManager()->getRepository(Employee::class);
                $employees = $employeesRepository->find($_POST['representant']);
                $clients->setRepresentant($employees);
            }


            try{
                $em = $this->entityManager->getEntityManager();
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die("Error al actualizar el cliente<br> <a href='/clientes'>Volver a clientes</a>");
            }
        } else {
            $view = new FormView();
            $view->renderUpdateCliForm($clients, $clientsAll);
        }
    }


    private function delete(?string $id): void
    {
        $clientId = intval($id);
        $client = $this->repository->find($clientId);

        if (!$client) {
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
                $em->remove($client);
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die("Error al eliminar el cliente<br> <a href='/clientes'>Volver a clientes</a>");

            }

        }else{
            $view = new FormView();
            $view->renderDeleteCliForm($client);
        }

    }


    private function read(): void
    {
        $clients = $this->repository->findAll();
        $view = new ListView();
        $view->renderClient($clients);
    }

    private function noRuta()
    {
        (new MainController)->noRuta();
    }
}
