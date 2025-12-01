<?php

namespace AEV2\Views;

class ListView
{
    public function renderProducts(array $products)
    {
        $template = __DIR__ . "/../../public/assets/ProductList.html";
        include_once $template;
    }

    public function renderOrder(array $orders)
    {
        $template = __DIR__ . "/../../public/assets/OrderList.html";
        include_once $template;
    }

    public function renderClient(array $clients)
    {
        $template = __DIR__ . "/../../public/assets/ClientList.html";
        include_once $template;
    }

    public function renderEmployee(array $employees)
    {
        $template = __DIR__ . "/../../public/assets/EmployeeList.html";
        include_once $template;
    }

    public function renderDepartment(array $departments)
    {
        $template = __DIR__ . "/../../public/assets/DepartmentList.html";
        include_once $template;
    }


}
