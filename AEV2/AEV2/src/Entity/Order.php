<?php

namespace AEV2\Entity;


use AEV2\Repository\OrderRepository;
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

#[Entity(repositoryClass: OrderRepository::class)]
#[Table(name: 'PEDIDO')]
class Order
{
    #[Id]
    #[GeneratedValue(strategy: 'NONE')]
    #[Column(name: 'PEDIDO_NUM', type: 'integer', nullable: false)]
    private int $id;

    #[Column(name: 'PEDIDO_FECHA', type: 'date')]
    private DateTime $order_date;

    #[Column(name: 'PEDIDO_TIPO', type: 'string', length: 1, nullable: true)]
    private ?string $order_type;

    #[ManyToOne(inversedBy: "orders", targetEntity: Client::class)]
    #[JoinColumn(name: "CLIENTE_COD", referencedColumnName: "CLIENTE_COD")]
    private ?Client $client_code ;

    #[Column(name: 'FECHA_ENVIO', type: 'date')]
    private DateTime $sending_date;

    #[Column(name: 'TOTAL', type: 'decimal', precision: 8, scale: 2)]
    private float $total;

    #[OneToMany(mappedBy: 'id2', targetEntity: Detail::class)]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function setDetails(Collection $details): void
    {
        $this->details = $details;
    }

    public function getOrderDate(): DateTime
    {
        return $this->order_date;
    }

    public function setOrderDate(DateTime $order_date): void
    {
        $this->order_date = $order_date;
    }

    public function getOrderNum(): int
    {
        return $this->id;
    }


    public function setOrderNum(int $id): void
    {
        $this->id = $id;
    }


    public function getOrderType(): ?string
    {
        return $this->order_type;
    }

    public function setOrderType(string $order_type): void
    {
        $this->order_type = $order_type;
    }

    public function getClientCode(): ?Client
    {
        return $this->client_code;
    }

    public function setClientCode(?Client $client_code): void
    {
        $this->client_code = $client_code;
    }

    public function getSendingDate(): DateTime
    {
        return $this->sending_date;
    }

    public function setSendingDate(DateTime $sending_date): void
    {
        $this->sending_date = $sending_date;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }


}