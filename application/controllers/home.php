<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->library('javascript', FALSE);
  }

  public function index()
  {
    $this->load->view('index/header');
    $this->load->view('index/index');
    $this->load->view('index/footer');
  }

  public function registered()
  {
    $this->load->view('index/header');
    $this->load->view('index/registered');
    $this->load->view('index/footer');
  }

  public function registeredpost()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('phonenum', 'Phonenum', 'required');
    $this->form_validation->set_rules('birth', 'Birth', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('index/header');
      $this->load->view('index/registered');
      $this->load->view('index/footer');
    }else{
      $this->members_model->store();
      redirect('index');
    }
  }

  public function login()
  {
    $this->load->view('index/login');
    $this->load->view('index/footer');
  }

  public function logincheck()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('index/login');
      $this->load->view('index/footer');
    }else{
      $this->members_model->logincheck();
      redirect('index');
    }

  }



}
