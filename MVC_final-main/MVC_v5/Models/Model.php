<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        include "Controllers\connec.php";
        $this->bd = new PDO('mysql:host=localhost;dbname=aquabdd','root','');
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getMDP($user){
        $requete = $this->bd->prepare('Select password from login WHERE username = :user');
        $requete->bindValue(':user', $user);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function getEleve($id){
        $requete = $this->bd->prepare('Select * from etudiants WHERE id = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function nbPage(){
      $requete = $this->bd->prepare('Select count(student_id) from etudiants');
      $requete->setFecthMode(PDO::FETCH_ASSOC);
      $requete->execute();
      return $requete->fetchAll();
    }

    public function getacceuil(){
      $requete = $this->bd->prepare('select Nom,Prenom,Date_heure,status,Etudiant.student_id as idetudiant from Etudiant LEFT join Document on Etudiant.Student_ID = Document.Student_ID LEFT join BOS on document.Document_ID = BOS.Document_ID order by Date_heure DESC limit 6; ');
      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllEleveBos(){
        $requete = $this->bd->prepare('select Nom,Prenom,Date_heure,status,student_id,BOS_ID from Etudiant LEFT JOIN Document USING(Student_id) LEFT join BOS USING(Document_id) order by Date_heure DESC;');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllEleve(){
        $requete = $this->bd->prepare('select Student_id,Nom,Prenom,Groupe,Departement,Mission,Status,BOS_ID from Etudiant LEFT JOIN Document USING(Student_id) LEFT join BOS USING(Document_id) LEFT join Formation USING(Formation_id) LEFT join stage using(student_id);');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInformation($id){
      $requete = $this->bd->prepare('Select nom,prenom,student_id,departement,Groupe,date_heure,url,status,BOS_ID from etudiant join formation using(Formation_ID) join document using(Student_ID) join bos using(Document_ID) WHERE student_id = :id');
      $requete->bindValue(':id', $id);
      $requete->execute();
      return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function get10Eleve(){
        $requete = $this->bd->prepare('Select * from etudiants limite 10');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPersonnel($id){
        $requete = $this->bd->prepare('Select nom,prenom,mail,password from personnel INNER JOIN login on personnel.Personnel_ID = login.USER_ID WHERE USER_ID= :id');
        $requete->bindValue(':id', $id);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUserName($username){
        $requete = $this->bd->prepare('select nom,prenom,mail,password from login join personnel on login.USER_ID=personnel.personnel_ID where username = :username');
        $requete->bindValue(':username', $username);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePersonnel($infos){
        $requete = $this->bd->prepare('UPDATE login SET Password = :password where username = :username');
        $requete->bindValue('password', $infos["password"]);
        $requete->bindValue('username', $infos["login"]);
        $requete->execute();
        return (bool) $requete->rowCount();
    }

    public function updateStatus($info){
        $requete = $this->bd->prepare('UPDATE BOS SET Status = :status where BOS_ID = :id');
        $requete->bindValue('status', $info["status"]);
        $requete->bindValue('id', $info["id"]);
        $requete->execute();
        return (bool) $requete->rowCount();
    }

    public function getentreprise(){
      $requete = $this->bd->prepare('select Entreprise.nom as enom,Tuteur.nom as tnom,Tuteur.prenom as tprenom,description,count(Student_ID) as nb from Entreprise LEFT join Tuteur on Entreprise.Entreprise_ID = Tuteur.Tuteur_ID LEFT join Etudiant on Entreprise.Entreprise_ID = Etudiant.Entreprise_ID GROUP BY Entreprise.nom,Tuteur.nom,Tuteur.prenom,description; ');
      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLogin($user){
        $requete = $this->bd->prepare('Select * from Login WHERE Username = :user');
        $requete->bindValue(':user', $user);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
}
