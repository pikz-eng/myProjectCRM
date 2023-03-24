<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Customer extends Entity
{
    protected $_accesible =[
        "*" => true,
        "user" => true,
        "detail" => true,
        "note" => true,
        "id" => false

    ];
}