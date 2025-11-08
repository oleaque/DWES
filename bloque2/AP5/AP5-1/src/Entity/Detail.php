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
    public function getSellingPrice(): int
    {
        return $this->selling_price;
    }

    public function setSellingPrice(int $selling_price): void
    {
        $this->selling_price = $selling_price;
    }

    public function getProduct(): int
    {
        return $this->product;
    }

    public function setProduct(int $product): void
    {
        $this->product = $product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getImport(): int
    {
        return $this->import;
    }

    public function setImport(int $import): void
    {
        $this->import = $import;
    }





}














