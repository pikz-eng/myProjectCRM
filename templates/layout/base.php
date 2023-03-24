<!DOCTYPE html>
<html lang="en">

<head charset="UTF-8">
    <meta name="viewport" content="width-device-width,initial-scale=1">
    <?= $this->fetch("meta") ?>
    <?= $this->fetch("css") ?>
    <?= $this ->fetch("script") ?>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <title> CRM | <?= $title ?> </title>
    <?= $this->Html->css(["main", "milligram.min", "normalize.min", "pages", "base", "cake"]) ?>
    <?= $this->Html->script(["base", "pages"]) ?>
</head>

<body>
    <nav class="main_header">
        <div class = "main_logo">
            <a href = "<?= $this -> Url -> build("/dashboard" . $this->request -> getSession() -> read("id")) ?>" class="logo">CRM</a>
        </div>
        <div class="main_customers">
            <a href="javascript:;" onclick="showCustomers();">Clienţi</a>
            <div id="customers_list">
                <ul>
                    <li> <a href="<?= $this->Url->build("/customers") ?>">Toţi</a></li>
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
