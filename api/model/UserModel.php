<?php
namespace Api\Model;

use Api\Lib\DB;
use Api\Lib\Response;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author linux
 */
class UserModel {
    private $db;
    private $response;
    
    public function __construct() {
        $this->db=DB::start();
        $this->response=new Response();
    }
    
    public function getAll() {
        try{
            $stmt=$this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $this->response->setResponse();
        $this->response->result=$stmt->fetchAll();
        return $this->response;
        } catch (Exception $e) {
            $this->response->setResponse(false, $e->getMessage());
            return $this->response;
        }
        
    }
    
}
