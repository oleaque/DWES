<?php

namespace AP51\Entity;


use AP51\repository\TaskRepository;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'PEDIDO')]
class Order
{

    #[column(name: 'PEDIDO_FECHA', type: 'date')]
    private DateTime $date;

    #[column(name: 'PEDIDO_TIPO', type: 'string')]
    private string $type;

    #[column(name: 'CLIENTE_COD', type: 'integer')]
    private int $client_code;

    #[column(name: 'FECHA_ENVIO', type: 'date')]
    private DateTime $date_shipping;

    #[column(name: 'TOTAL', type: 'decimal')]
    private int $total;
    #[ManyToOne(targetEntity: Client::class, inversedBy: 'Order')]
    #[JoinColumn(name: 'CLIENTE_COD', referencedColumnName: 'CLIENTE_COD', nullable: false)]
    private Client $client;


    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getClientCode(): int
    {
        return $this->client_code;
    }

    public function setClientCode(int $client_code): void
    {
        $this->client_code = $client_code;
    }

    public function getDateShipping(): DateTime
    {
        return $this->date_shipping;
    }

    public function setDateShipping(DateTime $date_shipping): void
    {
        $this->date_shipping = $date_shipping;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

}

