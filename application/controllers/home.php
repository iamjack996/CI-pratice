<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->library('javascript', FALSE);
    $this->load->library('session');
    $this->load->helper('cookie');
    $this->load->library('user_agent');
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

    if($this->form_validation->run() === FALSE){
      $this->load->view('index/header');
      $this->load->view('index/registered');
      $this->load->view('index/footer');
    }else{
      $result = $this->members_model->store();
      if($result === false){
        $this->session->set_flashdata('msg', '註冊失敗，郵件重複登記');
        redirect('registered','refresh');
      }
      $this->session->set_flashdata('msg', '註冊成功！可以開始登入會員系統');
      redirect('login','refresh');
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
      $data['check'] = $this->members_model->logincheck();
      if(empty($data['check'])){
        $data['msg'] = '無此帳號，請先加入會員';
        $this->load->view('index/login' , $data);
        $this->load->view('index/footer');
      }else{
        if($this->input->post('password') === $data['check']['m_password']){
          $this->session->set_userdata('user_account', $data['check']['m_email']);
          $this->session->set_userdata('user_Admin', $data['check']['m_isAdmin']);
          if($this->input->post('remember') === 'keep'){
            $this->input->set_cookie('email',$data['check']['m_email'],0);
            $this->input->set_cookie('password',$data['check']['m_password'],0);
          }else{
            delete_cookie('email');
            delete_cookie('password');
          }
          if($data['check']['m_isAdmin'] === 'admin'){
            redirect('admin/index');
          }
          redirect('memberCenter/index');
        }else{
          $data['msg'] = '密碼錯誤，請重新嘗試';
          $this->load->view('index/login' , $data);
          $this->load->view('index/footer');
        }
      }
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('user_account');
    $this->session->unset_userdata('user_Admin');
    $this->load->view('index/header');
    $this->load->view('index/index');
    $this->load->view('index/footer');
  }

  public function contacts()
  {
    $this->load->view('index/header');
    $this->load->view('index/contacts');
    $this->load->view('index/footer');
  }

  public function contactspost()
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('content', 'Content', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('index/header');
      $this->load->view('index/contacts');
      $this->load->view('index/footer');
    }else{
      $this->contacts_model->store();
      $this->session->set_flashdata('msg', '成功寄出！感謝你的回饋');
      redirect('index','refresh');
    }
  }

  public function allnews($slug = NULL){
    $data['news'] = $this->news_model->show();
    $data['from'] = 'front';

    $this->session->set_userdata('referred_from', 'home');

    $this->load->view('index/header');
    $this->load->view('admin/news' , $data);
    $this->load->view('index/footer');
  }

  public function news($slug = NULL){ //show one news
    $data['news'] = $this->news_model->show($slug);

    $this->load->view('memberCenter/header');
    $this->load->view('index/showNews' , $data);
    $this->load->view('memberCenter/footer');
  }



}
