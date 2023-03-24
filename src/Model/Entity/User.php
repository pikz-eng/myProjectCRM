<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
   protected $_accesible = [
    "*" => true,
    "profile" => true,
    "customer" => true,
    "id" => false
   ];
}
