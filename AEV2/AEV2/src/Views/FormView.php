<?php

namespace AEV2\Views;

class FormView
{
    public function renderCreateProdForm()
    {
        $template = __DIR__ . "/../../public/assets/ProductCRUD/Createform.html";
        include_once $template;
    }

    public function renderUpdateProdForm($products)
    {
        $template = __DIR__ . "/../../public/assets/ProductCRUD/Updateform.html";
        include_once $template;
    }

    public function renderDeleteProdForm($product)
    {
        $template = __DIR__ . "/../../public/assets/ProductCRUD/Deleteform.html";
        include_once $template;
    }

    public function renderCreateEmpForm($employees)
    {
        $template = __DIR__ . "/../../public/assets/EmployeeCRUD/Createform.html";
        include_once $template;
    }

    public function renderUpdateEmpForm($employees, $employeesAll)
    {
        $template = __DIR__ . "/../../public/assets/EmployeeCRUD/Updateform.html";
        include_once $template;
    }

    public function renderDeleteEmpForm($employee)
    {
        $template = __DIR__ . "/../../public/assets/EmployeeCRUD/Deleteform.html";
        include_once $template;
    }
    public function renderCreateDepForm()
    {
        $template = __DIR__ . "/../../public/assets/DepartmentCRUD/Createform.html";
        include_once $template;
    }

    public function renderUpdateDepForm($departments)
    {
        $template = __DIR__ . "/../../public/assets/DepartmentCRUD/Updateform.html";
        include_once $template;
    }

    public function renderDeleteDepForm($department)
    {
        $template = __DIR__ . "/../../public/assets/DepartmentCRUD/Deleteform.html";
        include_once $template;
    }
    public function renderCreateCliForm($clients)
    {
        $template = __DIR__ . "/../../public/assets/ClientCRUD/Createform.html";
        include_once $template;
    }

    public function renderUpdateCliForm($clients, $clientsAll)
    {
        $template = __DIR__ . "/../../public/assets/ClientCRUD/Updateform.html";
        include_once $template;
    }

    public function renderDeleteCliForm($client)
    {
        $template = __DIR__ . "/../../public/assets/ClientCRUD/Deleteform.html";
        include_once $template;
    }

    public function renderCreateOrdForm($orders)
    {
        $template = __DIR__ . "/../../public/assets/OrderCRUD/Createform.html";
        include_once $template;
    }

    public function renderUpdateOrdForm($orders, $ordersAll)
    {
        $template = __DIR__ . "/../../public/assets/OrderCRUD/Updateform.html";
        include_once $template;
    }

    public function renderDeleteOrdForm($order)
    {
        $template = __DIR__ . "/../../public/assets/OrderCRUD/Deleteform.html";
        include_once $template;
    }
}
