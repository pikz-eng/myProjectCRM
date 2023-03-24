<?php 

namespace App\Controller;

use Cake\Controller\Controller;

class CustomersController extends AppController
{
    public function index()
    {
 $customers = $this -> Customers ->  find() -> contain("Details") ->  limit(15);
 $user = $this -> getTableLocator() -> get("Users");
 $current_user = $user -> findById($this -> request -> getSession()-> read("id")) -> contain("Profiles") -> first();
 $this -> set("title","Customers");
 $this -> set("initials", $current_user  -> profile -> initials);
 $this -> viewBuilder() -> setLayout("base");
 $this -> set("customers",$customers);

    }

    public function view($id)
    {

    }


    public function edt($id)
    {

    }

    public function add()
    {
        $customer = $this -> Customers -> newEmptyEntity();
        $user = $this -> getTableLocator() -> get("Users");
        $current_user = $user -> findById($this -> request ->  getSession() -> read("id"))-> contain("Profiles") -> first();
        if($this -> request ->is("post"))
        {
            $this -> Customers -> patchEntity($customer,$this -> request ->getData());
            $customer -> user_id = $this -> request -> getSession() -> read("id");
            if($this -> Customers -> save($customer))
            {
                $customer_id = $this -> Customers -> save($customer)->id;
                $this -> Flash -> success(("Clientul s-a adaugat cu succes"));
                return $this -> redirect(["action" => "/view/$customer_id"]);
            }

            $this -> Flash -> error ((" Ohh ceva nu e bine :("));
        }
        $this -> set("title","Add Customer");
        $this -> set("initials",$current_user -> profile -> initials);
        $this -> viewBuilder() -> setLayout("base");
        $this -> set ("customer",$customer);
        
    }

}