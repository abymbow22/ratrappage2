<?php
namespace App\Models;
class prestationModel extends rendezvouzModel{
    private string  $types;
    public function __construct()
    {
        parent::__construct();
        $this->type='prestation';
    }

  


    
     
     

    /**
     * Get the value of type
     */ 
    public function getTypes()
    {
        return $this->getTypes;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setTypes($type)
    {
        $this->types = $types;

        return $this;
    }
    public function insert($data=null):int{
        return parent::insert($this->types);
     }


}