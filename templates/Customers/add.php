<div class="background wrapper add_wrapper">
    <h3 class="main-heading"> Adaugă clienţi</h3>
    <div class="add_form">
        <?= $this->Form->create($customer) ?>
        <?= $this->Form->control("firstname", ["placeholder" => "Nume", "label" => false]) ?>
        <?= $this->Form->control("lastname", ["placeholder" => "prenume", "label" => false]) ?>
        <?= $this->Form->control("details.address", ["placeholder" => "Adresă", "label" => false]) ?>
        <?= $this->Form->control("details.state", ["placeholder" => "Ţară", "label" => false]) ?>
        <?= $this->Form->control("details.zipcode", ["placeholder" => "Cod Poştal", "label" => false]) ?>
        <?= $this->Form->control("details.dataNaşterii", ["type" => "date", "onchange" => "getAge();", "id" => "custBirth"]) ?>
        <?= $this->Form->control("details.age", ["placeholder" => "vârstă", "readonly", "label" => false, "id" => "custAge"]) ?>
        <?= $this->Form->button(("Trimite")) ?>
        <?= $this->Form->end(); ?>
    </div>
</div>