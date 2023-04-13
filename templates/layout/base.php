<!DOCTYPE html>
<html lang="en">

<head charset="UTF-8">
    
    <meta name="viewport" content="width-device-width,initial-scale=1">
    <?= $this->fetch("meta") ?>
    <?= $this->fetch("css") ?>
    <?= $this ->fetch("script") ?>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <title> CRM | <?= $title ?> </title>
    <?= $this->Html->css(["main", "milligram.min", "normalize.min", "pages", "base", "cake","index"]) ?>
    <?= $this->Html->script(["base", "page"]) ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js"></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

</head>

<body>
    <nav class="main_header">
        <div class = "main_logo">
            <a href = "<?= $this -> Url -> build("/dashboard" . $this->request -> getSession() -> read("id")) ?>" class="logo">CRM</a>
        </div>
        <div class="main_customers">
            <a   href="javascript:;" onclick="showCustomers();">Clienţi</a>
            <div id="customers_list">
                <ul>
                    <li> <a href="<?= $this->Url->build("/customers/") ?>">Toţi</a></li>
                    <li> <a href=" <?= $this->Url->build("/customers/add") ?>">Adaugă</a></li>
                    

                </ul>
            </div>
        </div>
        <div class="main_user">
            <div class="main_user_show"><a href ="javascript:;" onclick ="showUser();"><?=  $initials ?></a></div>
            <div id="users_list">
                <ul>
                    <li> <a href="<?= $this->Url->build("/users/view/" . $this->request->getSession()->read("id")) ?>"> Profil</a> </li>
                    <li> <a href="<?= $this->Url->build("/users/edit/" . $this->request->getSession()->read("id")) ?>">Editează profil </a> </li>
                    <li>
                        <a href="<?= $this->Url->build("/logout") ?>">Delogare</a>
                        
                    </li>
                </ul>

            </div>
        </div>

        
    </nav>
    <div class="main_wrapper">
        <?= $this-> Flash-> render() ?>
        <?= $this-> fetch("content") ?>
    </div>


 
</body>

</html>
