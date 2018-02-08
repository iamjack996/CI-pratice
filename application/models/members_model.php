<?php
class members_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

    public function store(){
      $data = array(
        'm_email' => $this->input->post('email'),
        'm_password' => $this->input->post('password'),
        'm_name' => $this->input->post('name'),
        'm_phonenum' => $this->input->post('phonenum'),
        'm_birth' => $this->input->post('birth'),
        'm_address' => $this->input->post('address')
      );
      return $this->db->insert('members', $data);
    }

    public function logincheck(){
      $sql = "SELECT m_password FROM members WHERE m_email = ?";
      $this->db->query($sql, array($this->input->post('email'));
      //登入寫到一半
    }

  }
?>
