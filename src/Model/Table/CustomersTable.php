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
        $this -> hasMany("Notes");
    }
    public function validationDefault(Validator $validator): Validator
    {
       
        $validator -> notEmptyString("firstname", "Introdu numele") -> minLength("firstname",3,"Numele tau nu poate avea mai putin de 3 caractere") ->maxLength("firstname",50,"Numele nu poate sa contina mai mult de 50 de caractere")
       -> notEmptyString("firstname", "Introdu numele") -> minLength("lastname",2,"Numele tau nu poate avea mai putin de 2 caractere") ->maxLength("lastname",60,"Numele nu poate sa contina mai mult de 60 de caractere")
       -> notEmptyString("address","Introdu adresa") -> minLength("address",5,"Adresa nu poate sa contina  mai putin de 5 caractere") -> maxLength("firstname",150,"Adresa  nu poate sa contina mai mult de 150 de caracatere")
        ->  notEmptyString("state","Introdu stat/tara") -> maxLength("state",150,"Tara  nu poate sa contina mai mult de 150 de caracatere")
        ->  notEmptyString("zipcode","Introdu codul postal")  -> maxLength("state",10,"Codul  nu poate sa contina mai mult de 10  caracatere")  -> minLength("zipcode", 5, "Codul postal nu poate sa contina mai putin de 5 caractere")
        -> notEmptyDate("birthdate","Introdu data nasterii")
        -> notEmptyString("age","Introdu varsta") -> minlength("age",1,"Varsta nu poate fi mai mica de unu");
       return $validator;
    }
}