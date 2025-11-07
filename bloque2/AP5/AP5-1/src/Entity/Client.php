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
}
