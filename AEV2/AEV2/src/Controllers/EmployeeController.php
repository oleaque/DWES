<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Department;
use AEV2\Repository\DepartmentRepository;
use AEV2\Entity\Employee;
use AEV2\Repository\EmployeeRepository;
use AEV2\Views\FormView;
use AEV2\Views\ListView;
use Exception;


class EmployeeController
{
    private EntityManager $entityManager;
    private EmployeeRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Employee::class);
    }


    public function list(): void
    {
        $employees = $this->repository->findAll();
        $view = new ListView();
        $view->renderEmployee($employees);
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

        $employeesAll = $this->repository->findAll();

        if (isset($_POST['submit'])) {
            $employees = new Employee();
            $employees->setEmployeeNumber($_POST['id']);
            $employees->setSurname($_POST['surname']);
            $employees->setOffice($_POST['office']);
            $employees->setStartDate(new \DateTime($_POST['start_date']));
            $employees->setSalary($_POST['salary']);
            $employees->setComission($_POST['commision']);
            $departmentRepository = $this->entityManager->getEntityManager()->getRepository(Department::class);
            $department = $departmentRepository->find($_POST['department']);
            $employees->setDepartment($department);
            $boss = $_POST['boss'];
            if($boss == $_POST['id']) {

            }else{
                $employee = $this->repository->find($_POST['boss']);
                $employees->setBoss($employee);
            }

            try {
                $em = $this->entityManager->getEntityManager();
                $em->persist($employees);
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die('Error al crear empleado <br> <a href="/empleados">Volver a empleados</a>');
            }

        } else {
            $view = new FormView();
            $view->renderCreateEmpForm($employeesAll);
        }
    }


    private function update(?string $id): void
    {
        $employeeId = intval($id);
        $employees = $this->repository->find($employeeId);
        $employeesAll = $this->repository->findAll();

        if (!$employees) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {

            if (isset($_POST['surname']) ){
                $employees->setSurname($_POST['surname']);
            }

            if (isset($_POST['office']) ){
                $employees->setOffice($_POST['office']);
            }
            if (isset($_POST['start_date']) ){
                $employees->setStartDate(new \DateTime($_POST['start_date']));
            }
            if (isset($_POST['salary']) ){
                $salary = (int)$_POST['salary'];
                $employees->setSalary($salary);
            }
            if (isset($_POST['commision']) ){
                $employees->setComission($employees->getComission());
            }
            if (isset($_POST['department']) ){
                $departmentRepository = $this->entityManager->getEntityManager()->getRepository(Department::class);
                $department = $departmentRepository->find($_POST['department']);
                $employees->setDepartment($department);
            }
            if (isset($_POST['boss']) ){
                $employee = $this->repository->find($_POST['boss']);
                $employees->setBoss($employee);
            }

        try{
            $em = $this->entityManager->getEntityManager();
            $em->flush();
            $this->list();
        }catch (Exception $e){
        die("Error al actualizar el empleado<br> <a href='/empleados'>Volver a empleados</a>");
    }
        } else {
            $view = new FormView();
            $view->renderUpdateEmpForm($employees, $employeesAll);
        }
    }


    private function delete(?string $id): void
    {
        $employeeId = intval($id);
        $employee = $this->repository->find($employeeId);

        if (!$employee) {
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
                $em->remove($employee);
                $em->flush();
                $this->list();
            }catch (Exception $e){
                die("Error al eliminar el empleado<br> <a href='/empleados'>Volver a empleados</a>");

            }

        }else{
            $view = new FormView();
            $view->renderDeleteEmpForm($employee);
        }

    }


    private function read(): void
    {
        $employees = $this->repository->findAll();
        $view = new ListView();
        $view->renderEmployee($employees);
    }

    private function noRuta()
    {
        (new MainController)->noRuta();
    }
}
