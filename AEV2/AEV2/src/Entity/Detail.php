<?php

namespace AEV2\Entity;


use AEV2\Repository\DetailRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;


#[Entity(repositoryClass: DetailRepository::class)]
#[Table(name: 'DETALLE')]
class Detail
{

    #[Id]
    #[GeneratedValue(strategy:'NONE')]
    #[Column(name: 'DETALLE_NUM', type: 'smallint', nullable: false)]
    private int $id;

    #[Id]
    #[ManyToOne(inversedBy: 'details', targetEntity: Order::class)]
    #[JoinColumn(name: 'PEDIDO_NUM', referencedColumnName: 'PEDIDO_NUM')]
    private ?Order $id2;

    #[ManyToOne(inversedBy: 'details', targetEntity: Product::class)]
    #[JoinColumn(name: 'PROD_NUM', referencedColumnName: 'PROD_NUM')]
    private ?Product $product_number;

    #[Column(name: 'PRECIO_VENTA', type: 'decimal', precision: 8, scale: 2)]
    private float $sale_price;

    #[Column(name: 'CANTIDAD', type: 'integer')]
    private int $quantity;

    #[Column(name: 'IMPORTE', type: 'decimal', precision: 8, scale: 2)]
    private float $price;

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getSalePrice(): float
    {
        return $this->sale_price;
    }

    public function setSalePrice(float $sale_price): void
    {
        $this->sale_price = $sale_price;
    }

    public function getProductNumber(): ?Product
    {
        return $this->product_number;
    }

    public function setProductNumber(?Product $product_number): void
    {
        $this->product_number = $product_number;
    }

    public function getOrderNumber(): ?Order
    {
        return $this->id2;
    }


    public function setOrderNumber(?Order $id2): void
    {
        $this->id2 = $id2;
    }


    public function getDetailNumber(): int
    {
        return $this->id;
    }


    public function setDetailNumber(int $id): void
    {
        $this->id = $id;
    }


}