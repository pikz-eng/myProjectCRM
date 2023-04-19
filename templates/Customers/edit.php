<?php

/**
 * @var AppView $this
 * @var Customer $customer
 * @var string[]|CollectionInterface $users
 */

use App\Model\Entity\Customer;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js"></script>

</head>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>

            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>

        </div>
    </aside>
    <div class="column-responsive column-80">

        <div class="background wrapper customer_wrapper">
            <div class="edit_customers">
                <h3 class="main-heading"> Editeaza client</h3>

                <?= $this->Form->create($customer) ?>


                <?php

                echo $this->Form->control('firstname', ["placeholder" => "Nume", "label" => false]);
                echo $this->Form->control('lastname', ["placeholder" => "prenume", "label" => false]);
                echo $this->Form->control('address', ["placeholder" => "adresa", "label" => false]);
                echo $this->Form->control('state', ["placeholder" => "stat", "label" => false]);
                echo $this->Form->control('zipcode', ["placeholder" => "Cod postal", "label" => false]);
                echo $this->Form->control('birthdate', ['empty' => true]);
                echo $this->Form->control('age', ["placeholder" => "Varsta", "label" => false]);

                ?>

                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <style>
        .edit_customers {
            width: 600px;
            margin: 0 auto;
.edit-customers input{
    margin-bottom: 10px;
}
        }

    </style>
</div>
