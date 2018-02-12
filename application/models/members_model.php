<?php
class members_model extends CI_Model{
		public function __construct(){
			$this->load->database();
			$this->load->helper('date');
			$this->now = date("Y-m-d H:i:s");
		}

    public function store(){
      $data = array(
        'm_email' => $this->input->post('email'),
        'm_password' => $this->input->post('password'),
        'm_name' => $this->input->post('name'),
        'm_phonenum' => $this->input->post('phonenum'),
        'm_birth' => $this->input->post('birth'),
        'm_address' => $this->input->post('address'),
        'm_isAdmin' => 'normal',
				'm_created_at' => $this->now
      );
      return $this->db->insert('members', $data);
    }

    public function edit(){
      $user_account = $this->session->userdata('user_account');
      $query = $this->db->get_where('members', array('m_email' => $user_account));
			return $query->row_array();
    }

    public function update(){
      $data = array(
        'm_email' => $this->input->post('email'),
        'm_password' => $this->input->post('password'),
        'm_name' => $this->input->post('name'),
        'm_phonenum' => $this->input->post('phonenum'),
        'm_birth' => $this->input->post('birth'),
        'm_address' => $this->input->post('address')
      );
      $this->db->where('m_email', $this->input->post('old_email'));
      return $this->db->update('members', $data);
    }

    public function logincheck(){
      $account = $this->input->post('email');
      $query = $this->db->get_where('members', array('m_email' => $account));
      return $query->row_array();
    }

  }
?>
