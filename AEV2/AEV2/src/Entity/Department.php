<?php

namespace AEV2\Entity;


use AEV2\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: DepartmentRepository::class)]
#[Table(name:'DEPT')]
class Department{

    #[Id]
    #[GeneratedValue(strategy:'NONE')]
    #[Column(name:'DEPT_NO', type: 'integer', length:2, nullable:false)]
    private int $id;

    #[Column(name:'DNOMBRE', type: 'string', length:14)]
    private string $department_name;

    #[Column(name:'LOC', type: 'string', length:14)]
    private string $location;

    #[Column(name:'color', type: 'string', length:20)]
    private string $color;

    #[OneToMany(mappedBy: "id", targetEntity: Employee::Class)]
    private Collection $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function setEmployees(Collection $employees): void
    {
        $this->employees = $employees;
    }


    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getDepartmentName(): string
    {
        return $this->department_name;
    }

    public function setDepartmentName(string $department_name): void
    {
        $this->department_name = $department_name;
    }

    public function getDepartmentNumber(): int
    {
        return $this->id;
    }

    public function setDepartmentNumber(int $id): void
    {
        $this->id = $id;
    }



}