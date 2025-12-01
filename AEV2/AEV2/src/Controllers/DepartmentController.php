<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Department;
use AEV2\Repository\DepartmentRepository;
use AEV2\Views\FormView;
use AEV2\Views\ListView;
use Exception;


class DepartmentController
{
    private EntityManager $entityManager;
    private DepartmentRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Department::class);
    }


    public function list(): void
    {
        $departments = $this->repository->findAll();
        $view = new ListView();
        $view->renderDepartment($departments);
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
            $departments = new Department();
            $departments->setDepartmentNumber($_POST['id']);
            $departments->setDepartmentName($_POST['name']);
            $departments->setLocation($_POST['location']);
            $departments->setColor($_POST['color']);

            try {
                $em = $this->entityManager->getEntityManager();
                $em->persist($departments);
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die('Error al crear Departamento <br> <a href="/departamentos">Volver a departamentos</a>');
            }

        } else {
            $view = new FormView();
            $view->renderCreateDepForm();
        }
    }


    private function update(?string $id): void
    {
        $departmentId = intval($id);
        $departments = $this->repository->find($departmentId);

        if (!$departments) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {
            if (isset($_POST['name']) ){
                $departments->setDepartmentName($_POST['name']);
            }

            if (isset($_POST['location']) ){
                $departments->setLocation($_POST['location']);
            }
            if (isset($_POST['color']) ){
                $departments->setColor($_POST['color']);
            }


            try {
            $em = $this->entityManager->getEntityManager();
            $em->flush();
            $this->list();
            }catch (Exception $e){
                die("Error al actualizar el departamento<br> <a href='/departamentos'>Volver a departamentos</a>");

            }
        } else {
            $view = new FormView();
            $view->renderUpdateDepForm($departments);
        }
    }


    private function delete(?string $id): void
    {
        $departmentId = intval($id);
        $department = $this->repository->find($departmentId);

        if (!$department) {
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
                $em->remove($department);
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die("Error al eliminar el departamento<br> <a href='/departamentos'>Volver a departamentos</a>");

            }

        }else{
            $view = new FormView();
            $view->renderDeleteDepForm($department);
        }

    }


    private function read(): void
    {
        $departments = $this->repository->findAll();
        $view = new ListView();
        $view->renderDepartment($departments);
    }

    private function noRuta()
    {
        (new MainController)->noRuta();
    }
}
