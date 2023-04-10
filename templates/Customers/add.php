<div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>


<div class="background wrapper add_wrapper">


    <h3 class="main-heading"> Adaugă clienţi</h3>
    <div class="add_form">
        <?= $this->Form->create($customer) ?>
        <?= $this->Form->control("firstname", ["placeholder" => "Nume", "label" => false]) ?>
        <?= $this->Form->control("lastname", ["placeholder" => "prenume", "label" => false]) ?>
        <?= $this->Form->control("address", ["placeholder" => "Adresă", "label" => false]) ?>
        <?= $this->Form->control("state", ["placeholder" => "Ţară", "label" => false]) ?>
        <?= $this->Form->control("zipcode", ["placeholder" => "Cod Poştal", "label" => false]) ?>
        <?= $this->Form->control("birthdate", ["type" => "date", "onchange" => "getAge();", "id" => "Birth"]) ?>
        <?= $this->Form->control("age", ["placeholder" => "vârstă", "readonly", "label" => false, "id" => "Age"]) ?>
        <?= $this->Form->button(("Trimite")) ?>
        <?= $this->Form->end(); ?>
    </div>
</div>