<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberCenter extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->library('javascript', FALSE);
    $this->load->library('session');
    $this->load->helper('cookie');
    
    $this->is_member();

  }

  public function is_member(){
    if($this->session->userdata('user_Admin') == NULL){
      $data['msg'] = '無權訪問，請先登入';
      $this->load->view('index/login' , $data);
      $this->load->view('index/footer');
    }
  }

	public function index()
	{
    // $this->is_member();
    $this->load->view('memberCenter/header');
    $this->load->view('memberCenter/index');
    $this->load->view('memberCenter/footer');
	}

  public function setting()
	{
    $data['member'] = $this->members_model->edit();
    $data['echo_value'] = true;

    $this->load->view('memberCenter/header');
    $this->load->view('memberCenter/setting' , $data);
    $this->load->view('memberCenter/footer');
	}

  public function settingupdate()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('phonenum', 'Phonenum', 'required');

    if($this->form_validation->run() === FALSE){
      $data['echo_value'] = false;
      $this->load->view('memberCenter/header');
      $this->load->view('memberCenter/setting' , $data);
      $this->load->view('memberCenter/footer');
    }else{
      $this->members_model->update();
      $this->session->set_flashdata('msg', '成功修改資料！');
      redirect('memberCenter/setting');
    }
  }

}
