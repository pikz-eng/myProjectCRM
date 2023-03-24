<?php


namespace App\Controller;

use Cake\Controller\Controller;

class UsersController extends AppController
{
    public function register()
    {
        $user = $this -> Users -> newEmptyEntity();
        if($this -> request -> is("post"))
        {
            if($this -> Users -> findByUsername($this -> request ->getData("username"))-> first())
            {
                $this -> Flash -> error(__("Acest username este luat"));

            }
            else if($this -> Users -> findAllByUsernameOrEmail($this -> request -> getData("username"),$this -> request -> getData("email")) -> first())
            {
                $this -> Flash -> error(__("Acest e-mail este luat"));

            }
            else if(strlen($this -> request ->getData("password")) < 8)
            {
                $this -> Flash -> error(__("Parola ar trebui sa contina cel putin 8 caractere"));
            }
            else if($this ->request ->getData("password") != $this -> request -> getData ("conf_password"))
            {
                $this -> Flash -> error(__("Parola ta nu se potriveste"));
            }
            else
            {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user-> password = password_hash($this -> request -> getData("password"), PASSWORD_BCRYPT);
                if ($this -> Users -> save($user))
                {
                    $new_user = $this -> Users-> save($user);
                    $user_id = $new_user -> id;
                    $session = $this -> request -> getSession();
                    $session -> write([
                        "id" => $user_id,
                        "username" => $this -> request -> getData("username")
                    ]);
                    $this -> Flash -> success(__("Bun venit"));

                    return $this -> redirect(["action" => "/dashboard/$user_id"]);

                }
                $this -> Flash -> error(("Ohh ceva nu merge"));
            }
        }
        $this -> set("user",$user);
        $this -> set("title","Register");
    }
    public function index()
    {

        if($this -> request -> is("post"))
        {
            if($this -> request -> getData("username") == "" && $this -> request -> getData("password") == "" )
            {
                $this -> Flash -> error((" Introdu informaţiile"));

            }

            else if($this -> Users -> findByUsername($this -> request -> getData("username")) -> count() < 1  )
            {
                $this -> Flash -> error(("Acest utilizator nu este valid"));
            }
            else{
                $search_user = $this -> Users -> findByUsername($this -> request -> getData("username")) -> first();
                if(!password_verify($this -> request ->getData("password"),$search_user['password']))
                {
                    $this -> Flash -> error(("Parola este greşita"));
                }
                else
                {
                    $this -> request -> getSession() -> write([
                        "id" => $search_user['id'],
                        "username" => $this -> request -> getData("username")
                    ]);

                    $send_id = $search_user['id'];
                    return $this -> redirect(["action" => "/dashboard/$send_id"]);
                }
            }
        }
        $this -> set("title", "Login");
    }
    
    public function dashboard($id)
    {

        $this -> loadComponent("Paginator");
        $customer_table = $this -> getTableLocator() -> get("Customers");
        $customers = $this -> Paginator -> paginate($customer_table -> find()-> contain("Details"));

        $user = $this -> Users -> findById($id) -> contain(["Profiles"]) -> first();
        if($user -> id != $this -> request -> getSession() -> read("id"))
        {
            return $this -> redirect(["action" => "/dashboard/" . $this -> request -> getSession() -> read("id")]);
        }
        $this -> viewBuilder() -> setLayout("base");
        $this -> set("title",$user -> username);
        $this -> set("initials", $user -> profile -> initials);
        $this -> set(compact("user","customers"));


    }
    
   

    public function view($id)
    {
        $user = $this -> Users -> findById($id) -> contain("Profiles") -> firstOrFail();
        $current_user = $this -> Users -> findById($this -> request -> getSession()->read("id") )-> contain("Profiles") -> first();
        $this -> viewBuilder() -> setLayout("base");
        $this -> set("title",$user -> username . " s profile" );
        $this -> set ("initials",$current_user -> profile -> initials );
        $this ->set("user",$user);

    }
    public function edit($id)
    {
        $user = $this -> Users -> findById($id) -> contain("Profiles") -> firstOrFail();

        if($user -> id != $this -> request -> getSession() -> read("id"))
        {
            return $this -> redirect(["action" => "/dashboard/" . $this -> request -> getSession() -> read("id")]);
        }
        if($this -> request -> is(["post","put"]))
        {
            $edit_user = $this -> request -> getData();
            $edit_img = $this -> request -> getData("edit_image");
            $img_name = $edit_img -> getClientFileName();
            $img_type = $edit_img -> getClientMediaType();

            if($img_name )
            {
                if($img_type == "image/jpg" || $img_type == "image/png" || $img_type == "image/jpeg")
                {
                    $img_path = WWW_ROOT . "img" . DS . "users" . DS . $img_name;
                    $edit_img -> moveTo($img_path);
                    $user -> profile -> image = "users/$img_name";
                    $edit_user["edit_image"] = $img_name;
                    $user -> profile -> image =$img_name;
                }
                else{
                    $this -> Flash -> error(("Aceasta imagine nu este valida"));
                }
            }
            $this -> Users -> patchEntity($user, $this -> request -> getData());
            if($this -> Users -> save($user))
            {
              $this -> Flash -> success(("Profilul tau a fost updatat"));
              return $this -> redirect(["action" => "/view/$id"]);  
            }
            $this -> Flash -> error(("Mai incearca"));
        }

       
 $this -> viewBuilder() -> setLayout("base");
 $this -> set("title", "Edit Profile");
 $this -> set("initials",$user -> profile -> initials);
 $this -> set("user", $user);
    }
 
    public function logout()
    {
        $this -> request -> getSession() -> destroy();
        $this -> Flash -> success(("Te-ai delogat cu succes"));
        return $this -> redirect(["action" => "/register"]);
    }
}
