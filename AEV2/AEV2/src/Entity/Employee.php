<?php
namespace AEV2\Entity;

use AEV2\Repository\EmployeeRepository;
use DateTime;
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

#[Entity(repositoryClass: EmployeeRepository::Class)]
#[Table(name: 'EMP')]
class Employee{
    #[Id]
    #[GeneratedValue(strategy:'NONE')]
    #[Column(name:'EMP_NO',type: 'smallint', nullable: false)]
    private int $id;

    #[Column(name:'APELLIDOS',type: 'string', length: 10)]
    private string $surname;

    #[Column(name:'OFICIO',type: 'string', length: 10)]
    private string $office;


    #[ManyToOne(inversedBy: 'employee',targetEntity:Employee::Class)]
    #[JoinColumn(name:'JEFE', referencedColumnName:'EMP_NO')]
    private ?employee $boss;

    #[Column(name:'FECHA_ALTA',type: 'date')]
    private DateTime $start_date;

    #[Column(name:'SALARIO',type: 'integer')]
    private int $salary;

    #[Column(name:'COMISION',type: 'integer', nullable: true)]
    private ?int $comission;

    #[ManyToOne(inversedBy: 'employee',targetEntity:Department::Class)]
    #[JoinColumn(name:'DEPT_NO', referencedColumnName:'DEPT_NO')]
    private ?department $department;

    #[OneToMany(mappedBy: "id", targetEntity: Client::Class)]
    private Collection $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function setClients(Collection $clients): void
    {
        $this->clients = $clients;
    }


    public function getEmployeeNumber(): int
    {
        return $this->id;
    }

    public function setEmployeeNumber(int $id): void
    {
        $this->id = $id;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getBoss(): ?Employee
    {
        return $this->boss;
    }

    public function setBoss(?Employee $boss): void
    {
        $this->boss = $boss;
    }

    public function getOffice(): string
    {
        return $this->office;
    }

    public function setOffice(string $office): void
    {
        $this->office = $office;
    }

    public function getStartDate(): DateTime
    {
        return $this->start_date;
    }

    public function setStartDate(DateTime $start_date): void
    {
        $this->start_date = $start_date;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function getComission(): ?int
    {
        return $this->comission;
    }

    public function setComission(?int $comission): void
    {
        $this->comission = $comission;
    }

    public function getDepartment(): ?department
    {
        return $this->department;
    }

    public function setDepartment(?department $department): void
    {
        $this->department = $department;
    }



}