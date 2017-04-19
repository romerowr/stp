<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mRegister extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                //poner codigo
                
                function valemail($em){
       
                $this->query("SELECT * FROM users WHERE email=:email;");
                $this->bind(":email",$em);
                $this->execute();
                $res=$this->rowCount();
                
                if($res){
                   return $res;
                }else{
                   return false;
               }
                }
                
               function reg($em, $passwd, $username){
               
                   $this->query("CALL storypub.sp_new_user(2,:email,:passwd,:username);");
                   $this->bind(":email",$em);
                   $this->bind(":passwd",$passwd);
                   $this->bind(":username",$username);
                   $this->execute();
                   $result= $this->rowCount();
                   
                   if($result){
                       return $result;
                   }else{
                       return -1;
                   }
               }
        }
