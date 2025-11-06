<?php

namespace AP51\Entity;



#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'DETALLE')]
class detail
{
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'PROD_NUM', type: 'integer')]
    private int $product;


    #[Column(name:'PRECIO_VENTA', type:'decimal')]
    private int $selling_price;

    #[Column(name:'CANTIDAD', type:'integer')]
    private int $quantity;

    #[Column(name:'importe', type:'decimal')]
    private int $import;



}














