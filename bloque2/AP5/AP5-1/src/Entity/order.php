<?php

namespace AP51\Entity;


use AP4_1\repository\TaskRepository;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'PEDIDO')]
class order
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

}

