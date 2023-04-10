<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Customer extends Entity
{
    protected $_accesible =[
        "*" => true,
        "user" => true,
        "id" => false

    ];
    
}