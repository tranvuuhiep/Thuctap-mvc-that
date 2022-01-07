<?php 
require_once('Controllers/Controller.php');
require_once('Models/User.php');

class SignupController extends Controller{    

    public function register(){
        
        // validate data


        // create user
        $user = new User();
        if(empty($_POST)){
            echo "loisox";
        }   
        elseif(empty($_POST['username'])){
            $nameerror="Bat buoc";
        }else{
            $user->create($this->data);    
        }            
        

        // return user was created        
        

    }

}