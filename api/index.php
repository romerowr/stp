<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    require 'config.slim.php';
    require 'vendor/autoload.php';
      
    $app=new \Slim\App(['settings'=>$config]);
    
    $container=$app->getContainer();
    $container['db']=function($c){ //habria que hacer un try caatch en vd pero da palo
        $db=$c['settings']['db'];
        
        $pdo=new PDO('mysql:host='.$db['host'].';dbname='.$db['dbname'],
                $db['user'],$db['pass']); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    };
    
    //Routing Web Service
    //
    //C- add usuario
    $app->post('/user/add', function(Request $req, Response $res){
    
        $data=$req->getParsedBody();
        
        if($data != null)
        {    
            $email=$data['email'];
            $username=$data['username'];
            $password=$data['password'];
            
            $stmt=$this->db->prepare("INSERT INTO users(roles,email,password,username) VALUES(2,:email,:password,:username)");
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',md5($password));
            $stmt->bindParam(':username',$username);
            
            $stmt->execute();
            $id = $this->db->lastInsertId();
                
            $stmt=$this->db->prepare("SELECT * FROM users WHERE idusers=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $result=$stmt->fetchAll();

            if($result[0][email]== $email){
                return $this->response->withJson($data);
            }
            else{
               return $this->response->withJson(array('msg' => 'ERROR! NO SE PUEDE AÑADIR EL USUARIO.'));
            }
        }
    });
    //R- listado
    $app->get('/users', function(Request $req, Response $res){
        $stmt=$this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $result=$stmt->fetchAll();
        return $this->response->withJson($result);
    });
    
    $app->get('/user/{id}',function(Request $req, Response $res,$args){
        $id=(int)$args['id'];
        
        $stmt=$this->db->prepare("SELECT * FROM users WHERE idusers=:idusers");
        
        $stmt->bindParam(':idusers',$id);
        $stmt->execute();
        
        $result=$stmt->fetchAll();
        
        return $this->response->withJson($result);
    });
    //U- update user
    $app->put('/user/update/{id}',function(Request $req, Response $res, $args){ 
        $id=(int)$args['id'];
        
        $data=$req->getParsedBody();
        
        $email=$data['email'];
        $username=$data['username'];
        $password=$data['password'];
        
        $stmt=$this->db->prepare("UPDATE users SET email = :email, username = :username, password = :password WHERE idusers = :id");
        
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',md5($password));
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':id',$id);
        
        $stmt->execute();
      
        if($stmt->execute())
        { //si funciona haremos la actualizazion correctamente, pero si no quieres perder los otros datos deberas rellenar todos los campos si no quedaran null
            return $this->response->withJson($data);
        }
        else
        {
            return $this->response->withJson(array('msg' => 'ERROR! No se puede actualizar el usuario con tal id'));
        }
    });
    //D- delete user
    $app->delete('/user/del/{id}', function(Request $req, Response $res, $args)
    {
        $id=(int)$args['id'];
        
        $stmt=$this->db->prepare("DELETE FROM users WHERE idusers=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        
        $stmt2=$this->db->prepare("SELECT * FROM users WHERE idusers=:id");
        $stmt2->bindParam(':id',$id);
        $stmt2->execute();
        $result=$stmt2->fetchAll();
        
        if(empty($result))
        {
            return $this->response->withJson(array('msg' => 'USUARIO ELIMINADO'));
        }
        else
        {
            return $this->response->withJson(array('msg' => 'ERROR! No se puede BORRAR el usuario con tal id'));
        }
    });
    
    // activación
    $app->run();
    //fin del CRUD
    
    //  PRUEBAS ANTERIORES HECHAS EN CLASE CON TONI:
    //  
    //https://github.com/martinbean/api-framework/blob/master/index.php
    
    
    
    //$app->get('/hello[/{name}]', 'hello'); //ejemplo  //los ides hacerlos por head y los otros por formulario
    //operaciones CRUD
    //C- add usuario
    //$app->post('/user/add', 'addUser');
    //R- listado
    //$app->get('/user[/{id}]', 'getUsers'); //se lista solo uno o todos (si pones id es solo uno)
    //U- update user
    /*$app->put('/user/update/{id}', 'updateUser');
    //D- delete user
    $app->delete('/user/delete/{id}', 'deleteUser');
    
    
    function hello (Request $request, Response $response,$args){
        
        $name=(string)$args['name'];
        if($name!=null){
            $response->getBody()->write("$name");
        }else{
            $response->getBody()->write("HELLO");
        }
        return $response;
    }
    
    function getUsers (Request $request, Response $response,$args){  
        
        $id=(int)$args['id'];
        
        if($id==null){
            $sql="SELECT * FROM users";
            $dbh= getDB($dsn, $usr, $pwd);
            var_dump($dbh);
            die;
            $stmt=$dbh->prepare($sql);
            $stmt->execute();
        
            $result=$stmt->fetchAll(PDO::FETCH_OBJ);
            $response->withJSON($result, 200);
        }
        return $response;
    }*/