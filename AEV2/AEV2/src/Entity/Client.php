<?php

namespace AEV2\Entity;


use AEV2\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;


#[Entity(repositoryClass: ClientRepository::class)]
#[Table(name: 'CLIENTE')]
class Client
{

    #[Id]
    #[GeneratedValue(strategy: 'NONE')]
    #[Column(name: 'CLIENTE_COD', type: 'integer', nullable: false)]
    private int $id;

    #[Column(name: 'NOMBRE', type: 'string', length: 45)]
    private string $name;

    #[Column(name: 'DIREC', type: 'string', length: 40)]
    private string $address;

    #[Column(name: 'CIUDAD', type: 'string', length: 30)]
    private string $city;

    #[Column(name: 'ESTADO', type: 'string', length: 2)]
    private string $status;

    #[Column(name: 'COD_POSTAL', type: 'string', length: 9)]
    private string $postal_code;

    #[Column(name: 'AREA', type: 'smallint')]
    private int $area;

    #[Column(name: 'TELEFONO', type: 'string', length: 9)]
    private string $phone;

    #[ManyToOne(inversedBy: "client", targetEntity: Employee::class)]
    #[JoinColumn(name: "REPR_COD", referencedColumnName: "EMP_NO" )]
        private ?Employee $representant;

    #[Column(name: 'LIMITE_CREDITO', type: 'decimal', precision: 9, scale: 2)]
    private float $credit;

    #[Column(name: 'OBSERVACIONES', type: 'text')]
    private string $observations;

    #[OneToMany(mappedBy: "client_code", targetEntity: Order::Class)]
    private Collection $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getClientCode(): int
    {
        return $this->id;
    }

    public function setClientCode(int $id): void
    {
        $this->id = $id;
    }



    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getArea(): int
    {
        return $this->area;
    }

    public function setArea(int $area): void
    {
        $this->area = $area;
    }

    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getRepresentant(): ?Employee
    {
        return $this->representant;
    }

    public function setRepresentant(?Employee $representant): void
    {
        $this->representant = $representant;
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }


    public function getCredit(): float
    {
        return $this->credit;
    }

    public function setCredit(float $credit): void
    {
        $this->credit = $credit;
    }

    public function getObservations(): string
    {
        return $this->observations;
    }

    public function setObservations(string $observations): void
    {
        $this->observations = $observations;
    }


}
