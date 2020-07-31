<?php 
class patients {
    public $lastname;
    public $firstname;
    public $mail;
    public $phone;
    public $birthdate;
    public function addPatient(){ //methode pour ajouter un patient à la base************************************
        try {
            // new = instance d'objet, $db devient une instance de l'objet PDO
            $db = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', '');
        } catch(Exception $error) {
            // -> = appeller method ou attribur en php
            die($error -> getMessage());
        }
        //on défini notre requete qui va creer un patient
        $createPatient = $db->prepare(
            'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`)
            VALUES (:lastname, :firstname, :birthdate, :phone, :mail);
        ');
        // on définit tous les paramètres qui correspondent à notre requete sql
        $createPatient->bindValue(':lastname', $this->lastname );
        $createPatient->bindValue(':firstname', $this->firstname );
        $createPatient->bindValue(':birthdate', $this->birthdate );
        $createPatient->bindValue(':phone', $this->phone );
        $createPatient->bindValue(':mail', $this->mail );
        // On execute notre requete
        $createPatient->execute();

    }
    public function getPatientList(){// methode pour récupérer la liste des patients******************************************
        try {
            // new = instance d'objet, $db devient une instance de l'objet PDO
            $db = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', '');
        } catch(Exception $error) {
            // -> = appeller method ou attribur en php
            die($error -> getMessage());
        }
        $getPatientListQuery = $db->query(
            'SELECT 
                `lastname`
                ,`firstname`
                ,`birthdate`
            FROM 
                `patients`
            ORDER BY `lastname` ASC,`firstname` ASC
            ');

            $data=$getPatientListQuery->fetchall(PDO::FETCH_OBJ);
            return $data;
} 
}