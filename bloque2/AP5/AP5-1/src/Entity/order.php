<?php

namespace AP51\Entity;



use DateTime;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'PEDIDO')]

class order{

    #[column(name:'pedido_fecha', type: 'date')]
private DateTime $date;

    #[column(name:'pedido_tipo', type:'string')]
private string $type;

    #[column(name:'cliente_cod', type:'integer')]
private int $client_code;

    #[column(name:'fecha_envio', type:'date')]
private DateTime $date_shipping;

    #[column(name:'total', type:'decimal')]
private int $total;

}

