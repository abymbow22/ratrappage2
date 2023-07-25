<?php
namespace App\Controllers; 
use App\Core\Controller;
use App\Core\Session;
use App\Core\Validator;
use App\Models\rendezvousModel;
use App\Models\consultationModel;
use App\Models\patientModel;
use App\Models\prestationVenteModel;

class rendezvousController extends Controller{
 
      private consultationModel  $consultation;
      private prestationModel  $prestation;
      private  patientModel   $patientModel;
      private  rendezvousModel   $rendezvousModel;
      
     
      public function __construct()
      {
        parent::__construct();
        $this->consultationModel=new consultation;
        $this->prestationModel=new prestation;
        $this->rendezvousModel=new articleModel;
        $this->patientModel=new patientModel;
      }
        public function index(){
           $const=$this->consultationModel->findAll();
           $prest=$this->prestationModel->findAll();
           $rendezvous=array_merge($const,$prest);
           $this->renderView("article/liste.html.php",[
              "rendezvous"=>$rendezvous
           ]);
        
        }

        public function  showFormrendezvous(){
          $categories=$this->patientModel->findAll();
          $types= $this->prestationModel->findTyperendezvous();
          $this->renderView("rv/form.html.php",[
            "patient"=> $patient,
            "types"=> $types,
          ]);
        }
        
        
        public function save(){
          //Validation  ou Controle de Saisie
          Validator::isVide($_POST['types'],'types','Le type est necessaire ');
          Validator::isVide($_POST['patient'],'patient','La Categorie est obligatoire');
          Validator::isVide($_POST['date'],'date','La date est obligatoire');
          Validator::isVide($_POST['etat'],'etat','L etat est obligatoire');

          
          if( Validator::validate()){
             if($_POST['type']=="consultation"){
              Validator::isVide($_POST['medecin'],'medecin','La medecin est obligatoire');
            }else{
              Validator::isVide($_POST['medicament'],'medicament','Le medicament est obligatoire');
              //
            }

            if(Validator::validate()){
                  extract($_POST);
                  $this->rendezvousModel->setLibelle($etat);
                  $this->rendezvousModel->setCategorieID($patientID);
                  $this->rendezvousModel->setdate($date);
                  $this->rendezvousModel->setTypes($types);
                  $data=$type=="consultation"?$medecin:$medicament;
                  $this->redirect("rendezvous");   
            }
          }
               Session::set("errors",Validator::getErrors());
                $this->redirect("show-form-rendezvous");  
          
        }
        
}