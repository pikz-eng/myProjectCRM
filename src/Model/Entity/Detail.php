<?php

namespace App\Model\Entity;
use Cake\ORM\Entity;

class Detail extends  Entity

{
    protected  $_accesible = [
        "*" => true,
        "customer" => true,
        "id" => false
    ];
}
