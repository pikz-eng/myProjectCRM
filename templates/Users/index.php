<div class = "wrapper background login_wrapper">
    <div class = "login-form"> 
        <h3 class = "main-heading">Autentificare</h3>
        <?= $this -> Form -> create() ?>
        <?= $this -> Form -> control("username",["placeholder" => "Utilizator","label" => false]) ?>
        <?= $this -> Form -> control("password", ["type" => "password","placeholder" => "Parolă","label" => false]) ?>
        <?= $this -> Form -> button (("Autentificare")) ?>
        <?= $this -> Form -> end() ?>
        <?= $this -> Html -> link(" Nu eşti utilizator? Inregistrează-te aici" , "/register") ?>
    </div>
</div>