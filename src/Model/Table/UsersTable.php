<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config):void
    {
        $this -> addBehavior("Timestamp");
        $this -> hasOne("Profiles");
        $this -> hasMany("Customers");
        $this -> hasMany("Notes");


    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator -> minLength("username",5,"Numele de utilizator nu poate sa contina mai putin de 5 caractere") -> maxLength("username",50,"Numele de utilizator nu poate sa contina mai mult de 50 de caractere")
      -> maxLength("password",150,"Parola nu poate sa contina mai mult de 100 de caractere")
            -> minLength("email",4,"Emailul nu poate sa contina mai putin de 4 caractere");
        return $validator;

    }
}
