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
    $this->load->view('memberCenter/header');
    $this->load->view('admin/product');
    $this->load->view('memberCenter/footer');
  }

  public function productUpload(){
    $this->load->view('memberCenter/header');
    $this->load->view('admin/productUpload' , array('error' => ' ' ));
    $this->load->view('memberCenter/footer');
  }

  public function productUploadPost(){
    // $this->form_validation->set_rules('title', 'Title', 'required');
    // $this->form_validation->set_rules('slug', 'Slug', 'required|alpha_numeric');
    // $this->form_validation->set_rules('kind', 'Kind', 'required');
    // $this->form_validation->set_rules('price', 'Price', 'required|integer|is_natural');
    // $this->form_validation->set_rules('description', 'Description', 'required');
    // $this->form_validation->set_rules('image', 'Image', 'required');

    // if($this->form_validation->run() === FALSE){
    //   $this->load->view('memberCenter/header');
    //   $this->load->view('admin/productUpload');
    //   $this->load->view('memberCenter/footer');
    // }else{
      $config = array(
        'upload_path' => getcwd()."/uploads/", //getcw 等同 base_url
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => TRUE,
        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'max_height' => "1200",
        'max_width' => "1600"
      );
      $this->upload->initialize($config); // 加這個才沒報錯(path)
      $this->load->library('upload', $config); //可成功上傳至本地uploads
      if($this->upload->do_upload())
      {
      // $data = array('upload_data' => $this->upload->data());
      // $this->load->view('upload_success',$data);
      }
      else
      {
        $error = array('error' => $this->upload->display_errors());
        print_r($config['upload_path']);
        $this->load->view('memberCenter/header');
        $this->load->view('admin/productUpload', $error);
        $this->load->view('memberCenter/footer');
      }


      // $this->products_model->store();
      // $this->session->set_flashdata('msg', '產品上傳成功！');
      // redirect('admin/productManage');
    // }

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
