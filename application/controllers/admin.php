<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->library('javascript', FALSE);
    $this->load->library('session');
    $this->load->helper('cookie');
  }

	public function index(){
    $this->load->view('memberCenter/header');
    $this->load->view('admin/index');
    $this->load->view('memberCenter/footer');
	}

  public function news(){ //allnews
    $data['news'] = $this->news_model->show();
    $data['from'] = 'back';
    $this->load->view('memberCenter/header');
    $this->load->view('admin/news' , $data);
    $this->load->view('memberCenter/footer');
  }

  public function newsUpdate(/*$slug = NULL*/){
    $result = $this->news_model->update(/*$slug*/);
    $msg = false;
      if($result){
        $msg = true;
      }
    return json_encode($msg);
  }


}
