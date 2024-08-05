<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('Main_mdl');
    }

	public function index()
	{
      $this->login();
	}

    public function login(){

		$this->load->view('login.php');
	}

	public function user_join(){

		$this->load->view('user_join.php');
	}
}
