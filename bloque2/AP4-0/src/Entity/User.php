<?php

namespace AP40\Entity;

use AP40\Repository\UserRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: UserRepository::class)]
#[Table(name: 'users')]
class User
{
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'userId', type: 'integer')]
    private int $id;

    #[Column(name: 'userName', type: 'string', length: '255')]
    private string $name;

    #[Column(name: 'userPassword', type: 'string', length: '255')]
    private string $password;

    #[Column(name: 'securePassword', type: 'string', length: '60')]
    private string $securePassword;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getSecurePassword(): string
    {
        return $this->securePassword;
    }

    public function setSecurePassword(string $securePassword): void
    {
        $this->securePassword = $securePassword;
    }

}