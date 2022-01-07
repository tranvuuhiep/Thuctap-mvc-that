<?php
	
require_once('Controllers/Controller.php');

class SigninController extends Controller{

	public function __construct(){
		parent::__construct();	
	}

	public function client(){
		$var1 = 'a';
		$var2 = 'b';
		return $this->view('frontend/layout/layouttrangchu');
	}

	public function edit(){
		
	}

}