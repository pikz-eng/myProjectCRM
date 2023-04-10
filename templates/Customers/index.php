<div class="row">
  <div class="col-sm-8">
    <?php echo $deleteMsg ?? ''; ?>
    <div class="table-responsive" style="width:1500px">
      <table class="table table-bordered" style="width:1200px" style="height:1200">

        <thead>
          <tr>
            <th>Numar</th>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Adresa</th>
            <th>Tara</th>
            <th>Cod Postal</th>
            <th>Data Nasterii</th>
            <th>Varsta</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (is_array($customers)) {
            $sn = 1;
            foreach ($customers as $data) {
          ?>
              <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $data['firstname']; ?> </td>
                <td><?php echo $data['lastname']; ?></td>
                <td><?php echo $data['address']; ?></td>
                <td><?php echo $data['state']; ?></td>
                <td><?php echo $data['zipcode']; ?></td>
                <td><?php echo $data['birthdate']; ?></td>
                <td><?php echo $data['age']; ?></td>
                <td>
                  <a href="edit/<?php echo $data['id']; ?>" class="edit-link">Edit</a>
                </td>

                <td><a href="delete/<?php echo $data['id']; ?>" class="delete-link">Delete</a></td>


              </tr>
            <?php
              $sn++;
            }
          } else { ?>

            <tr>
            <?php
          } ?>

        </tbody>


        <style>
  a.edit-link {
    background-color: rgba(0, 95, 158, 0.8);
    color: white;
    text-decoration: none;

    cursor: pointer;
    box-shadow: 0 0.4rem 1.4rem 0 rgba(86, 185, 235, 0.8);
    transform: translateY(-0.1rem);

    transition: transform 0.3s ease-in-out;
    transition: transform 150ms;

  }

  th {
    background-color: #4285f4;
    color: white;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    border: 1px solid #ccc;
    transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
  }

  th:hover {

    transform: scale(0.95);
  }

  a.edit-link:hover {
    transform: scale(1.1);
  }

  a.edit-link:active {
    transform: scale(0.95);
  }

  a.delete-link:hover {
    transform: scale(1.1);
  }

  a.delete-link:active {
    transform: scale(0.95);
  }

  a.delete-link {
    cursor: pointer;
    box-shadow: 0 0.4rem 1.4rem 0 rgba(255, 0, 0, 0.7);
    transform: translateY(-0.1rem);
    transition: transform 150ms;
  }
</style>
      </table>

     
    </div>
  </div>
  <div class="customers index content">
    <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Customers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('firstname') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('zipcode') ?></th>
                    <th><?= $this->Paginator->sort('birthdate') ?></th>
                    <th><?= $this->Paginator->sort('age') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $this->Number->format($customer->id) ?></td>
                    <td><?= isset($customer->user_id) ? $customer->user_id : '' ?></td>
                    <td><?= h($customer->firstname) ?></td>
                    <td><?= h($customer->lastname) ?></td>
                    <td><?= h($customer->address) ?></td>
                    <td><?= h($customer->state) ?></td>
                    <td><?= h($customer->zipcode) ?></td>
                    <td><?= h($customer->birthdate) ?></td>
                    <td><?= $customer->age === null ? '' : $this->Number->format($customer->age) ?></td>
                    <td><?= h($customer->status) ?></td>
                    <td><?= h($customer->created) ?></td>
                    <td><?= h($customer->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

</div>

<script type="text/javascript">
  $('.delete-link').on('click', function(e) {
    e.preventDefault();
    href = $(this).attr('href');
    return bootbox.confirm({

      message: "Esti sigur?",
      buttons: {
        confirm: {
          label: 'Da',
          className: 'btn-primary'
        },
        cancel: {
          label: 'Nu',
          className: 'btn-secondary'
        }
      },
      callback: function(result) {

        if (result) {
          window.location = href;
        }
      }
    });
  })
</script>