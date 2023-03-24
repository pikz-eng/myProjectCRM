<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProfilesTable extends Table
{
    public function initialize(array $config): void
    {
        $this -> addBehavior("Timestamp");
        $this -> belongsTo("Users");
    }
    public function validationDefault(Validator $validator): validator
    {
        $validator -> notEmptyString("firstname","Introdu numele") -> minLength("firstname",3,"Numele nu poate sa contina  mai putin de 3 caractere") -> maxLength("firstname",50,"Numele tau nu poate sa contina mai mult de 50 de caracatere")
        ->notEmptyString("lastname","Introdu numele") -> minLength("lastName",2,"Numele tau nu poate sa contina mai putin de 2 caractere")->maxLength("lastname",70,"Numele tau nu poate sa fie mai lung de 70 de caractere");
      /* ->notEmptyString("email","Introdu email")-> minLength("email",4,"Emailul tau nu poate avea mai putin de 2 caractere")->maxLength("email",100,"Emailul nu poate avea mai mult de 50 de caractere")*/

        return $validator;
    
    }
}