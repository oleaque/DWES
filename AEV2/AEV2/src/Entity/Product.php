<?php

namespace AEV2\Entity;


use AEV2\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: ProductRepository::class)]
#[Table(name: 'PRODUCTO')]
class Product
{

    #[Id]
    #[GeneratedValue (strategy: 'NONE')]
    #[Column(name: 'PROD_NUM', type: 'integer', nullable: false)]
    private int $id;

    #[Column(name: 'DESCRIPCION', type: 'string', length: 30)]
    private string $description;

    #[OneToMany(mappedBy: 'product_number', targetEntity: Detail::class)]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getProductNumber(): int
    {
        return $this->id;
    }

    public function setProductNumber(int $product_number): void
    {
        $this->id = $product_number;
    }

    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function setDetails(Collection $details): void
    {
        $this->details = $details;
    }



    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


}
