<?php
class contacts_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

    public function store(){
      $data = array(
        'c_name' => $this->input->post('name'),
        'c_email' => $this->input->post('email'),
        'c_phonenum' => $this->input->post('phonenum'),
        'c_content' => $this->input->post('content')
      );
      return $this->db->insert('contacts', $data);
    }

  }
?>
