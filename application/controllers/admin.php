<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->library('javascript', FALSE);
    $this->load->library('session');
    $this->load->helper('cookie');
    $this->now = date("Y-m-d H:i:s");
    $this->load->library('upload');
    $this->load->helper(array('form', 'url'));

    $this->is_Admin();
  }

  public function is_Admin(){
   // print_r($this->session->userdata('user_Admin'));
    if($this->session->userdata('user_Admin') == NULL){
      $data['msg'] = '無權訪問，請先登入';
      $this->load->view('index/login' , $data);
      $this->load->view('index/footer');
    }elseif ($this->session->userdata('user_Admin') != 'admin') {
      $this->session->set_flashdata('msg', '管理者權限不符');
      redirect('index','refresh');
    }
  }

	public function index(){
    $this->load->view('memberCenter/header');
    $this->load->view('admin/index');
    $this->load->view('memberCenter/footer');
	}

  public function news(){ //allnews
    $data['news'] = $this->news_model->show();
    $data['from'] = 'back';
    $this->session->set_userdata('referred_url', current_url());
    $this->session->set_userdata('referred_from', 'admin');
    $this->load->view('memberCenter/header');
    $this->load->view('admin/news' , $data);
    $this->load->view('memberCenter/footer');
  }

  public function newsUpdate(/*$slug = NULL*/){ //ajax
    $result = $this->news_model->update(/*$slug*/);
    $msg = false;
      if($result){
        $msg = true;
      }
    echo json_encode($msg);
  }

  public function productManage(){
    $data['products'] = $this->products_model->show();
    $this->load->view('memberCenter/header');
    $this->load->view('admin/product' , $data);
    $this->load->view('memberCenter/footer');
  }

  public function productUpload(){
    $this->load->view('memberCenter/header');
    $this->load->view('admin/productUpload' , array('error' => ' ' ));
    $this->load->view('memberCenter/footer');
  }

  public function productUploadPost(){
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('slug', 'Slug', 'required');
    $this->form_validation->set_rules('kind', 'Kind', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required|integer|is_natural');
    $this->form_validation->set_rules('description', 'Description', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('memberCenter/header');
      $this->load->view('admin/productUpload' , array('error' => ' ' ));
      $this->load->view('memberCenter/footer');
    }else{
      $config = array(
        'upload_path' => getcwd()."/uploads/", //getcwd 等同 base_url
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => TRUE,
        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'max_height' => "1200",
        'max_width' => "1600"
      );
      $this->upload->initialize($config); // 加這個才沒報錯(path)
      $this->load->library('upload', $config);
      if($this->upload->do_upload()) //if可成功上傳至本地uploads
      {
        $data = $this->upload->data();
        $fileName = $data['raw_name'].$data['file_ext']; //取得黨名與格式
        $this->products_model->store($fileName);
        $this->session->set_flashdata('msg', '產品上傳成功！');
        redirect('admin/productManage');
      }
      else
      {
        $error = array('error' => $this->upload->display_errors());
        // print_r($config['upload_path']);
        $this->load->view('memberCenter/header');
        $this->load->view('admin/productUpload', $error);
        $this->load->view('memberCenter/footer');
      }
    }
  }

  public function newsCreate(){
    $this->load->view('memberCenter/header');
    $this->load->view('admin/newsCreate');
    $this->load->view('memberCenter/footer');
  }

  public function newsPost(){
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('content', 'Content', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('memberCenter/header');
      $this->load->view('admin/newsCreate');
      $this->load->view('memberCenter/footer');
    }else{
      $result = $this->news_model->store();
      if($result === false){
        $this->session->set_flashdata('msg', '發布失敗，標題重複');
        redirect('admin/newsCreate','refresh');
      }
      $this->session->set_flashdata('msg', '最新消息發布成功！');
      redirect('admin/news','refresh');
    }
  }

  public function newsDelete($slug = NULL){
    $result = $this->news_model->delete($slug);
    if($result){
      $this->session->set_flashdata('msg', '刪除成功！');
      redirect('admin/news','refresh');
    }
    $this->session->set_flashdata('msg', '刪除失敗！');
    redirect('admin/news','refresh');
  }


}
