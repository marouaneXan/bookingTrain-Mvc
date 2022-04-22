
<p class="font-monospace text-center fw-bolder fs-1"> Mes reservations : </p>

  <?php if($msgError==0) :?> 
  <div class="alert alert-danger" role="alert">
      impossible d'annuler  date expiré
  </div>
    <?php endif?>
    <?php if($msgError==1) :?> 
  <div class="alert alert-success" role="alert">
      Bien annuler
</div>
    <?php endif?>
    
    
    <div id="table1">


<table class="table mx-auto ">
  <thead>
    <tr>
      <th scope="col">nom et prenom</th>
      <th scope="col">gare depart</th>
      <th scope="col">gare d'arriver</th>
      <th scope="col">prix</th>
      <th scope="col">heure de depart</th>
      <th scope="col">heure d'arriver</th>
      <th scope="col">date Voyage</th>
      
      <th scope="col">Annuler </th>
    </tr>
  </thead>
  <tbody>

           <?php foreach($reservation as $row): ?>
                        <tr>
                            <td><?php echo $row['nom']." ".$row['prenom']; ?></td>                                  

                            <td><?php echo $row['gare_depart']; ?> <b class="float-right">  </b></td>
                            <td class="text-center"><?php echo $row['gare_arriver']; ?></td>
                            <td><?php echo $row['prix']; ?> <b class="float-right"> $ </b></td>
                         
                            <td><?php echo $row['heure_depart']; ?></td>
                            <td><?php echo $row['heure_arriver']; ?></td>
                            <td><?php echo $row['date_voyage']; ?></td>
                             <td>
                             <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="window.location.href='<?php  echo BURL?>reservation/annulerReservation/ <?php  echo $row['id_reservation']  ;?>/<?php  echo $row['date_voyage']  ;?>/<?php  echo$row['heure_depart'] ;?>';">Annuler</button>         
                            </td>
                        </tr>
                <?php endforeach ?>    
    
                </tbody>
      </table>
      </div>
