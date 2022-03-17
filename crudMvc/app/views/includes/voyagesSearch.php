<p class="font-monospace text-center fw-bolder fs-6"> <?php echo $title ?></p>
  <div id="table1">
    <div class="mx-auto col-12 col-lg-9 col-xl-7">
<table class="table mx-auto ">
  <thead>
    <tr>
      <th scope="col">gare depart</th>
      <th scope="col">gare d'arriver</th>
      <th scope="col">prix</th>
      <th scope="col">heure de depart</th>
      <th scope="col">heure d'arriver</th>
      <th scope="col">nom du train</th>
      <th scope="col">Reserver </th>
    </tr>
  </thead>
  <tbody>

           <?php foreach($voyages as $row): ?>
                        <tr>
                            <td><?php echo $row['gare_depart']; ?> <b class="float-right">  </b></td>
                            <td class="text-center"><?php echo $row['gare_arriver']; ?></td>
                            <td><?php echo $row['prix']; ?> <b class="float-right"> $ </b></td>
                         
                            <td><?php echo $row['heure_depart']; ?></td>
                            <td><?php echo $row['heure_arriver']; ?></td>
                            <td><?php echo $row['nom_train']; ?></td>
                                  
                             <td>
                             <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="window.location.href='<?php  echo BURL?>reservation/index/ <?php  echo $row['id_voyage']  ;?>/<?php  echo $date_voyage  ;?>/<?php  echo $nbrPlaces ;?>';">Reserver</button>         
                            </td>
                        </tr>
                <?php endforeach ?>    
    
                </tbody>
      </table>
      </div>
      </div>