<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   
   class Register extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Register'));
   			$this->model=new \X\App\Models\mRegister();
   			$this->view =new \X\App\Views\vRegister($this->dataView,$this->dataTable);    
                           
                        
                }


   		function home(){
                   /*
                    $data=$this->model->getRoles();
                    $this->addData($data); */
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
           
   		}
                
                function valemail(){
                    $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
                    $res=$this->model->valemail($email);
        
                    if($res==1){
                       $this->ajax(array('msg'=>'Email en uso'));
                    }else{
                        $this->ajax(array('msg'=>'Email disponible'));
                    }
                }
                
                
                function reg(){
                    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    $passwd=filter_input(INPUT_POST, 'passwd');
                    $username=filter_input(INPUT_POST, 'username');
                    
                    $res = $this->model->reg($email, $passwd, $username);
                    
                    if($res==1){
                        $this->ajax(array('msg'=>'Es correcto'));
                        header('/storypub.dev/app/controllers/login');
                    }else{
                        $this->ajax(array('msg'=>'Incorrecto'));
                        header('/storypub.dev/app/controllers/register');
                    }
                }
                
               
                
         
   }
