<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Product;
use AEV2\Repository\ProductRepository;
use AEV2\Views\ListView;
use AEV2\Views\FormView;
use Exception;

class ProductController
{
    private EntityManager $entityManager;
    private ProductRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Product::class);
    }

    public function list(): void
    {
        $products = $this->repository->findAll();
        $view = new ListView();
        $view->renderProducts($products);
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

        if (isset($_POST['submit'])) {
            $products = new Product();
            $products->setProductNumber($_POST['id']);
            $products->setDescription($_POST['description']);

            try{
            $em = $this->entityManager->getEntityManager();
            $em->persist($products);
            $em->flush();
            $this->list();
        }catch (Exception $e){
                die("Error al crear el producto <br> <a href='/productos'>Volver a productos</a>");
            }
        } else {
            $view = new FormView();
            $view->renderCreateProdForm();
        }
    }


    private function update(?string $id): void
    {
        $productId = intval($id);
        $products = $this->repository->find($productId);

        if (!$products) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {
            if (!isset($_POST['id']) || !isset($_POST['description'])) {
                $this->noRuta();
                return;
            }
            $products->setDescription($_POST['description']);

        try {
            $em = $this->entityManager->getEntityManager();
            $em->flush();
            $this->list();
        }catch (Exception $e){
                die("Error al actualizar el producto<br> <a href='/productos'>Volver a productos</a>");
            }
        } else {
            $view = new FormView();
            $view->renderUpdateProdForm($products);
        }
    }


    private function delete(?string $id): void
    {
        $productId = intval($id);
        $products = $this->repository->find($productId);

        if (!$products) {
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
                $em->remove($products);
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die("Error al eliminar el producto (Pedidos relacionados)<br> <a href='/productos'>Volver a productos</a>");
            }

        }else{
            $view = new FormView();
            $view->renderDeleteProdForm($products);
        }

    }


    private function read(): void
    {
        $products = $this->repository->findAll();
        $view = new ListView();
        $view->renderProducts($products);
    }

    private function noRuta()
    {
        (new MainController)->noRuta();
    }
}
