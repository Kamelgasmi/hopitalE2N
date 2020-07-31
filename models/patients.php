<?php 
class hospitalE2N {
    public function codb(){
        try {
            // new = instance d'objet, $db devient une instance de l'objet PDO
            $db = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', '');
            return $db;
        } catch(Exception $error) {
            // -> = appeller method ou attribur en php
            die($error -> getMessage());
        }
    }
}
// la classe est la définition de l'objet
class patients extends hospitalE2N {
    public $id = 0; // on met des valeurs par défaut
    public $lastname = '';
    public $firstname = '';
    public $mail = '';
    public $phone= '';
    public $birthdate = '0000-00-00';
    public function patientNotExist(){
        $db = hospitalE2N::codb();
        $patientExistQuery = $db->prepare(
            'SELECT `lastname`, `firstname`, `birthdate`, `mail`
            FROM `patients`
            WHERE
                `lastname`= :lastname AND
                `firstname`= :firstname AND
                `birthdate`= :birthdate AND
                `mail`= :mail
                '
        );
        $patientExistQuery->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $patientExistQuery->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $patientExistQuery->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $patientExistQuery->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $patientExistQuery->execute();
        $data = $patientExistQuery->fetchAll(PDO::FETCH_OBJ);
        if(empty($data)){
            return true;
        }else {
            return false;
        }
    }
    public function addPatient(){ //methode pour ajouter un patient à la base************************************
        if(self::patientNotExist()){
            $db = hospitalE2N::codb();
            //on défini notre requete qui va creer un patient
            $createPatient = $db->prepare( // prepare = requête préparée
                'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`)
                VALUES (:lastname, :firstname, :birthdate, :phone, :mail); 
            ');// les ":" devant lastname, etc est un marqueur nominatif
            // on définit tous les paramètres qui correspondent à notre requete sql
            $createPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR); // bindValue remplace le marquer nominatif par une valeur et vérifie une injection SQL
            $createPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);// le $this permet d'accéder aux attributs de l'instance qui est en cours
            $createPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
            $createPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
            $createPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            // On execute notre requete
            return $createPatient->execute();
        }else {
            return 'patientAlreadyExist';
        } 

    }
    public function getPatientList(){// methode pour récupérer la liste des patients******************************************
        $db = hospitalE2N::codb();
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