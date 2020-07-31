<?php
$pageList = array('Accueil' => 'accueil'
                ,'liste-patients' => 'Liste des patients'
                ,'ajout-patient' =>  'Ajouter un patient'
                ,'liste-rendezvous' => 'Liste des rendez-vous'
                ,'ajout-rendezvous' => 'Ajouter un rendez-vous'
                ,'ajout-patient-rendez-vous' => 'Ajouter un patient avec un rendez-vous'
                ,'profil-patient' => 'Profil du patient'
                ,'rendezvous' => 'Fiche rendez vous' );

//si la valeur content existe et que sa valeur est egale a une des clés associativent du tableau $pageList
if(isset($_GET['content']) && (isset($pageList[$_GET['content']]))) {
            $title = $pageList[$_GET['content']];
            $page = htmlspecialchars($_GET['content']);
            $content = 'views/' . $page . '.php';
} else {
    $title = 'Accueil';
    $content = 'views/accueil.php';
}