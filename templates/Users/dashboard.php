<div class="dashboard_main_wrapper">

<div class = "background dashboard_wrapper">
    <h5 class = "main-heading">Clienți disponibili</h5>
    <div class="dashboard_interior">
        <?php if ($customers -> count() < 1): ?>
        <p class="no-data"> Nu sunt clienţi disponibili</p>
        <?php else : ?>
            <?php foreach ($customers as $cu): ?>
        <?php if($customers -> status == "u" || "a"): ?>
            <p class="dashboard_list"> <a href="<?= $this -> Url -> build("/customers/view/*" . $cu -> id . "") ?>"><?= $cu ->firstname ?> <?= $cu -> lastname ?></a></p> 
            
        
            <?php endif; ?>
            <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
    <div class="background dashboard_wrapper">
        <h5 class="main-heading">Clienţii tai</h5>
        <div class="dashboard_interior">

        <?php if ($customers -> count() < 1): ?>
        <p class = "no-data"> Nu ți-au fost alocați clienți</p>
        <?php else: ?>
            <?php foreach ($customers as $ca): ?>
            <?php if($customers  -> status == "a"  && $ca -> detail -> assigned_id == $this -> request -> getSession() -> read("id")): ?>
               <p class="dashboard_list"> <a href="<?= $this -> Url -> build("/customers/view/" . $ca -> id / "") ?>"> <?= $ca -> firstname ?> <?= $ca ->lastname ?></a></p>  
                <?php endif; ?>
            <?php endforeach; ?>
        
        <?php endif; ?>

        </div>
     </div>

</div>
