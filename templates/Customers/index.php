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
      </table>
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