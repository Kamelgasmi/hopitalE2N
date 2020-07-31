<?php include 'controllers/liste-patientsController.php' ?>

   
<!-- Start your project here-->
<table class="table table-striped text-center container">
   <thead>
       <tr>
           <th scope="col">Nom :</th>
           <th scope="col">Prénom :</th>
           <th scope="col">Date de naissance</th>
       </tr>
   </thead>
   <tbody><?php 
    foreach($patientsList as $patient){ ?>
       <tr>
           <td><?= $patient->lastname ?></td>
           <td><?= $patient->firstname ?></td>
           <td><?= $patient->birthdate ?></td>
       </tr><?php
    } ?>
   </tbody>
</table>