<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mLogin extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                //poner codigo
                
                
                
                function login($em, $passwd){
               
                   $this->query("SELECT * FROM storypub.users WHERE email=:email && password=:password");
                   $this->bind(":email",$em);
                   $this->bind(":passwd",$passwd);
                   
                   $this->execute();
                   $result= $this->rowCount();
                   
                   if($result){
                       return $result;
                   }else{
                       return false;
                   }
               }
	}
