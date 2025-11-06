<?php

namespace AP51\Entity;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'CLIENTE')]

class Client{
    #[Column(name:'nombre', type:'varchar')]
private string $name;

    #[Column(name:'direc', type:'varchar')]
private string $direc;

    #[column(name:'ciudad', type:'varchar')]
private string $city;

    #[Column(name:'estado', type:'varchar')]
private string $status;

    #[column(name:'cod_postal', type:'varchar')]
private string $postal_code;

    #[column(name:'area',type:'smallint')]
private int $area;

    #[Column(name:'telefono', type:'varchar')]
private string $phone;

    #[Column(name:'repr_cod', type:'smallint')]
private int $repr;

    #[column(name:'limite_credito',type:'decimal')]
private int $credit_limit;

    #[column(name:'observaciones', type:'text')]
private string $observations;
}
