<div class="profile_wrapper wrapper background">
    <h4 class="main-heading">

        <?php if ($user->id == $this->request->getSession()->read("id")): ?>
            Profilul tău
        <?php else: ?>
            <?= $user->username ?> s Profil
        <?php endif; ?>
    </h4>
    <div class="profile_interior">
        <div class="profile_pic">
        <?php if($user -> profile -> image == ""): ?>
            <div class = "profile_pic_initials">
               <div class="profile_initials"> <?= $user -> profile -> initials ?></div>

            </div>
            <php else: ?>
                <div class="profile_pic_interior">
                <?= $this -> Html -> image("/users/*" . $user -> profile -> image . "") ?>
            </div>
        <?php endif; ?>
        </div>
        <div class="profile_information">
            <p class="profile_name"><?= $user -> profile -> firstname . " " . $user -> profile -> lastname?></p>
            <p class="profile_info" ><?= $user -> email ?></p>
            <p class="profile_info">Angajat la data: <span class="profile_date"><?= date("d/m/Y g:i A",strtotime($user -> created)) ?></span></p>
        </div>
    </div>

</div>
