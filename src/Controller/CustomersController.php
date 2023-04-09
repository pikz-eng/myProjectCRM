<?php 

namespace App\Controller;

use Cake\Controller\Controller;
class CustomersController extends AppController
{
    public function index()
    {

 $customers = $this -> Customers ->  find()->toArray();
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
    public function delete($id)
    {
        $entity = $this-> Customers->get($id);
        $result = $this->Customers->delete($entity);
        return $this -> redirect(["action" => "/index/"]);
    
    }
    
    public function edit($id)
    {  
         $customer = $this->Customers->get($id);
        if ($this->request->is('put','post')) { 
            
            $data = $this->request->getData();
            
            $customer = $this->Customers->patchEntity($customer, $data);
            if ($this->Customers->save($customer)) {
                
                $this->Flash->success('Clientul a fost actualizat.');
                return $this->redirect(['action' => '/index/']);
            } else {
                
                $this->Flash->error('A apărut o eroare la actualizarea clientului.');
            }
        }
      
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
                
                $this -> Flash -> success(("Clientul s-a adaugat cu succes"));
                return $this -> redirect(["action" => "/view/" . $customer->id]);
            }

            $this -> Flash -> error (("Ohh ceva nu e bine :("));

            
        }
        $this -> set("title","Add Customer");
        $this -> set("initials",$current_user -> profile -> initials);
        $this -> viewBuilder() -> setLayout("base");
        $this -> set ("customer",$customer);
        
    }

}
