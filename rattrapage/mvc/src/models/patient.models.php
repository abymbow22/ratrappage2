<?php
namespace App\Models;
use App\Core\Model;
 class patientModel extends Model{
    private string $numPatient;
    private string $nomComplet;

     public function __construct()
     {
         parent::__construct();//
         $this->table="patient";
     }
     
    /**
     * Get the value of nomComplet
     */ 
    public function getnomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * Set the value of nomComplet
     *
     * @return  self
     */ 
    public function setnomComplet($nomComplet)
    {
        $this->nomComplet = $libelle;

        return $this;
    }

    /**
     * Get the value of numPatient
     */ 
    public function getnumPatient()
    {
        return $this->numPatient;
    }

    /**
     * Set the value of numPatient
     *
     * @return  self
     */ 
    public function setnumPatient($numPatient)
    {
        $this->numPatient = $numPatient;

        return $this;
    }

     public function insert():int{
        //$sql="select * from categorie where id=$id" ;Jamais
        $sql="INSERT INTO $this->table (`numPatient`, `nomComplet`) VALUES (null,:nomComplet)";//Requete preparee
        //prepare ==> requete avec parametres
        $stm= $this->pdo->prepare($sql);
        $stm->execute(["nomComplet"=>$this->nomComplet]);
        return  $stm->rowCount() ;
     }
    
 }