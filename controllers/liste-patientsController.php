<?php include 'models/patients.php' ;
$getPatientsList = new patients;
$patientsList=$getPatientsList->getPatientList();