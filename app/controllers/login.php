<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   
   class Login extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Login'));
   			$this->model=new \X\App\Models\mLogin();
   			$this->view =new \X\App\Views\vLogin($this->dataView,$this->dataTable);    
                           
                        
                }


   		function home(){
                   /*
                    $data=$this->model->getRoles();
                    $this->addData($data); */
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
           
   		}
                
                
                function login(){
                    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    $passwd=filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING);
                    
                    $res = $this->model->login($email, $passwd);
                    
                    if($res==1){
                        $this->ajax(array('msg'=>'Es correcto'));
                        header('/storypub.dev/app/controllers/dashboard');
                    }else{
                        $this->ajax(array('msg'=>'Incorrecto'));
                        header('/storypub.dev/app/controllers/login');
                    }
                }
                
         
   }
