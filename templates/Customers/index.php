<div class="background main-wrapper customers_wrapper">
    <h3 class="main-heading"> Clienți recenţi</h3>
    <div class="customers_interior">

     <?php if($customers -> count() < 1) : ?>
        <p class="no-data"> Nu sunt clienţi în prezent</p>
    <?php else : ?>
        <?php foreach($customers as $c) : ?>
            <?php if($c ->  status == "u" || "a"): ?>
               <p class="customers_list" ><a href = "<?= $this -> Url -> build ("/customers/view/" . $c -> id . "")?>"><?=  $c ->firstname?> <?= $c -> lastname ?> </a></p>
             <?php endif; ?>   
         <?php endforeach; ?>
    <?php endif; ?>
     </div>
     
</div>

