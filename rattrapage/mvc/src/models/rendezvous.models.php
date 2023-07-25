<?php 
namespace App\Models;
use App\Core\Model;
class rendezvous extends Model{
protected int $id;
 public string $date;
 public string $etat;
 protected string $types;
 protected string $patientID;

 //ManyToOne Navigabilite
 protected patientModel $categorieModel;
 public function patient(){
      return $this->patientModel->findById($this->patientID);  
 }

 public function __construct()
 {
     parent::__construct();
     $this->table="rendez-vous";
     $this->patientModel=new PatientModel;
 }
 

 
/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

 /**
  * Get the value of date
  */ 
 public function getDate()
 {
  return $this->date;
 }

 /**
  * Set the value of date
  *
  * @return  self
  */ 
 public function setDate($date)
 {
  $this->date = $date;

  return $this;
 }

 /**
  * Get the value of etat
  */ 
 public function getEtat()
 {
  return $this->etat;
 }

 /**
  * Set the value of etat
  *
  * @return  self
  */ 
 public function setEtat($etat)
 {
  $this->etat = $etat;

  return $this;
 }

 /**
  * Get the value of type
  */ 
 public function getType()
 {
  return $this->type;
 }

 /**
  * Set the value of type
  *
  * @return  self
  */ 
 public function setTypes($types)
 {
  $this->types = $types;

  return $this;
 }

 /**
  * Get the value of patientID
  */ 
 public function getPatientID()
 {
  return $this->patientID;
 }

 /**
  * Set the value of patientID
  *
  * @return  self
  */ 
 public function setPatientID($patientID)
 {
  $this->patientID = $patientID;

  return $this;
 }
 public function findAll():array{
    return $this->executeSelect("select * from $this->table where type like  :typeRv ",['typeRv'=>$this->type]);
 }

 public function findTyperendezvous():array{
    return $this->executeSelect("SELECT DISTINCT type FROM rendezvous" );
 }

}
