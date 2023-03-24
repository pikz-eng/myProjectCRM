<?php

namespace App\Model\Table;

use Cake\ORM\Table;

use Cake\Validation\Validator;

class CustomersTable extends Table
{
    public function initialize(array $config):void
    {

        $this -> addBehavior("Timestamp");
        $this -> belongsTo("Users");
        $this -> hasOne("Details");
        $this -> hasMany("Notes");
    }
    public function validationDefault(Validator $validator): Validator
    {
       
        $validator -> notEmptyString("firstname", "Introdu numele") -> minLength("firstname",3,"Numele tau nu poate avea mai putin de 3 caractere") ->maxLength("firstname",50,"Numele nu poate sa contina mai mult de 50 de caractere")
       -> notEmptyString("firstname", "Introdu numele") -> minLength("lastname",2,"Numele tau nu poate avea mai putin de 2 caractere") ->maxLength("lastname",60,"Numele nu poate sa contina mai mult de 60 de caractere");
       return $validator;
    }
}