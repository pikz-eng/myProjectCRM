<?php



 namespace App\Model\Table;
 use Cake\ORM\Table;
 use Cake\Validation\Validator;
 class  DetailsTable extends Table
 {
     public  function initialize(array $config): void
     {
         $this -> addBehavior("Timestamp");
         $this -> belongsTo("Customers");

     }



     public function validationDefault(Validator $validator): validator 
     {
         $validator -> notEmptyString("address","Introdu adresa") -> minLength("address",5,"Adresa nu poate sa contina  mai putin de 5 caractere") -> maxLength("firstname",150,"Adresa  nu poate sa contina mai mult de 150 de caracatere")
        ->  notEmptyString("state","Introdu stat/tara") -> maxLength("state",150,"Tara  nu poate sa contina mai mult de 150 de caracatere")
        ->  notEmptyString("zipcode","Introdu codul postal")  -> maxLength("state",10,"Codul  nu poate sa contina mai mult de 10  caracatere")  -> minLength("zipcode", 5, "Codul postal nu poate sa contina mai putin de 5 caractere")
        -> notEmptyDate("birthdate","Introdu data nasterii")
        -> notEmptyString("age","Introdu varsta") -> nonNegativeInteger("age", "Varsta nu este valida,trebuie nr pozitiv");
         return $validator;

 }

}
 