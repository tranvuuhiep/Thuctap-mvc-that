<?php
	
require_once('Controllers/Controller.php');

class UserController extends Controller{

	public function __construct(){
		parent::__construct();	
	}

	public function index(){
		$var1 = 'a';
		$var2 = 'b';
		return $this->view('frontend/layout/layouttrangchu');
	}

	public function edit(){
		
	}

}