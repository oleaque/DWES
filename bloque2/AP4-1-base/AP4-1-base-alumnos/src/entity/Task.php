<?php

namespace AP4_1\entity;

use AP4_1\repository\TaskRepository;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: TaskRepository::class)]
#[table(name: 'tareas')]
class Task
{
    #[id]
    #[GeneratedValue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;
    #[Column(name: 'titulo', type: 'integer')]
    private string $titulo;
    #[Column(name: 'fechaCreacion', type: 'date')]
    private DateTime $fechaCreacion;
    #[Column(name: 'fechaVencimiento', type: 'date')]
    private DateTime $fechaVencimiento;
    #[Column(name: 'descripcion', type: 'text')]
    private string $descripcion;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getFechaVencimiento(): date
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento(date $fechaVencimiento): void
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function getFechaCreacion(): date
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(date $fechaCreacion): void
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function getDescripcion(): description
    {
        return $this->descripcion;
    }

    public function setDescripcion(description $descripcion): void
    {
        $this->descripcion = $descripcion;
    }


}