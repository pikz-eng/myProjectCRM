<div class = "background wrapper register_wrapper">
    <h3 class = "main-heading"> Inregistrare </h3>
<div class = "register_form">

<?= $this -> Form -> create($user) ?>
<?= $this -> Form -> control("profile.initials",["type" => "hidden","id" => "registerInitials"]) ?>
       <?php echo $this -> Form -> control("profile.firstname",["placeholder" => "Nume","label" => false, "id" => "registerFirst", "onkeyup" =>"inputInitials();"])?>
       <?php echo $this -> Form -> control("profile.lastname",["placeholder" => "Prenume","label" => false, "id" => "registerLast", "onkeyup" =>"inputInitials();"])?>
       <?= $this -> Form -> control("email",["type" => "email" ,"placeholder" => "Adresa de email","label" =>"Email Address","label" => false])?>
       <?= $this -> Form -> control ("username",["placeholder" => "Utilizator","label"=> false])?>
       <?= $this -> Form -> control ("password",["type"=> "password", "placeholder"=> "Parolă", "label" => false])?>
       <?= $this -> Form -> control ("conf_password",["type"=> "password","placeholder"=>"Confirmă Parola", "label" => false])?>
       <?= $this -> Form -> button(__("Autentificare"))?>
       <?= $this -> Form -> end()?>


</div>
</div>