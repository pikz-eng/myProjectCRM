 <div class="edit_user_wrapper background wrapper">

 <h3 class="main-heading"> Editează-ţi profilul</h3>
 <div class="edit_user_form">
    <?= $this -> Form -> create($user, ["enctype" => "multipart/form-data"]) ?>
    <?= $this -> Form -> control("profile.initials",["type" => "hidden", "id" => "editInit"]) ?>
    <?= $this -> Form -> control("profile.firstname", ["label" => false,"id" => "editFirst", "onkeyup"=> "editInitials();"])?>
    <?= $this -> Form -> control("profile.lastname", ["label" => false,"editLast", "onkeyup"=> "editInitials();"])?>
    <?= $this -> Form -> control("profile.email", ["label" => false,"type" => "email"])?>
    <?= $this -> Form -> control("edit_image", ["type" => "file", "label" => false,"required" =>false]) ?>
    <?= $this -> Form -> button("Actualizează") ?>

    <?= $this -> Form -> end(); ?>
 </div>
 </div>