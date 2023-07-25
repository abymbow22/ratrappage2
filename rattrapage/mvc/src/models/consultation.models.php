<?php
namespace App\Models;
class consultationModel extends rendezvousModel{
    private string $medecin;
    public string $medicament;

    public function __construct()
    {
        parent::__construct();
        $this->type='consultation';
    }
    
    /* Get the value of medecin
    */ 
   public function getMedecin()
   {
       return $this->medecin;
   }

   /**
    * Set the value of medecin
    *
    * @return  self
    */ 
   public function setMedecin($medecin)
   {
       $this->medecin = $medecin;

       return $this;
   }

   /**
    * Get the value of medicament
    */ 
   public function getMedicament()
   {
       return $this->medicament;
   }

   /**
    * Set the value of medicament
    *
    * @return  self
    */ 
   public function setMedicament($medicament)
   {
       $this->medicament = $medicament;

       return $this;
   }
    


     
     public function insert($data=null):int{
        return parent::insert($this->medecin);
     }

    
    
     
}