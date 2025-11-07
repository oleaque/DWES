<?php

namespace AP51\Entity;


use AP4_1\repository\TaskRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'DETALLE')]
class detail
{
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'PROD_NUM', type: 'integer')]
    private int $product;


    #[Column(name: 'PRECIO_VENTA', type: 'decimal')]
    private int $selling_price;

    #[Column(name: 'CANTIDAD', type: 'integer')]
    private int $quantity;

    #[Column(name: 'IMPORTE', type: 'decimal')]
    private int $import;


}














