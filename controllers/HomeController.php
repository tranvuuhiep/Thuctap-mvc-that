<?php
	
require_once('Controllers/Controller.php');

class HomeController extends Controller{

	public function __construct(){
		parent::__construct();	
	}

	public function index(){
		$var1 = 'a';
		$var2 = 'b';
		return $this->view('admin/layout/home');
	}

	public function signin(){
		return $this->view('admin/layout/viewsignin/signin');
	}
	public function signup(){
		return $this->view('admin/layout/viewsignin/register');
	}

}