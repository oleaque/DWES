<?php

namespace AP51\Entity;

use AP4_1\repository\TaskRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'CLIENTE')]
class Client
{
    #[Column(name: 'NOMBRE', type: 'varchar')]
    private string $name;

    #[Column(name: 'DIREC', type: 'varchar')]
    private string $direc;

    #[column(name: 'CIUDAD', type: 'varchar')]
    private string $city;

    #[Column(name: 'ESTADO', type: 'varchar')]
    private string $status;

    #[column(name: 'COD_POSTAL', type: 'varchar')]
    private string $postal_code;

    #[column(name: 'AREA', type: 'smallint')]
    private int $area;

    #[Column(name: 'TELEFONO', type: 'varchar')]
    private string $phone;

    #[Column(name: 'REPR_COD', type: 'smallint')]
    private int $repr;

    #[column(name: 'LIMIT_CREDITO', type: 'decimal')]
    private int $credit_limit;

    #[column(name: 'OBSERVACIONES', type: 'text')]
    private string $observations;
    #[OneToMany(targetEntity: Order::class, mappedBy: 'client')]
    private Collection $orders;
    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDirec(): string
    {
        return $this->direc;
    }

    public function setDirec(string $direc): void
    {
        $this->direc = $direc;
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

    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    public function getArea(): int
    {
        return $this->area;
    }

    public function setArea(int $area): void
    {
        $this->area = $area;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getRepr(): int
    {
        return $this->repr;
    }

    public function setRepr(int $repr): void
    {
        $this->repr = $repr;
    }

    public function getCreditLimit(): int
    {
        return $this->credit_limit;
    }

    public function setCreditLimit(int $credit_limit): void
    {
        $this->credit_limit = $credit_limit;
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

