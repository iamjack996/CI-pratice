<?php
class members_model extends CI_Model{
		// private $email_code;
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
			$query = $this->db->get_where('members', array('m_email' => $data['m_email']));
			if ($query->num_rows() == 0){
				$this->email_code = md5((string)$this->now);
				$this->send_validation_email($this->email_code,$data['m_email']); //註冊驗證信
				return $this->db->insert('members', $data);
			}else{
				return false;
			}
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
        'm_address' => $this->input->post('address'),
				'm_updated_at' => $this->now
      );
      $this->db->where('m_email', $this->input->post('old_email'));
      return $this->db->update('members', $data);
    }

    public function logincheck(){
      $account = $this->input->post('email');
      $query = $this->db->get_where('members', array('m_email' => $account));
      return $query->row_array();
    }

		public function send_validation_email($email_code,$m_email){
			$this->load->library('email');

			$this->email->set_mailtype('html');
			$MM = 'iamjack996@gmail.com';
			$this->email->from($MM,'Register VALIDATION EMAIL'); //$this->config->item('bot_email')
			$this->email->to($m_email);
			$this->email->subject('Please activate your account by click！ Thx YOU.');

			$message = '<!DOCTYPE html><html><head><meta charset="utf-8">';
			$message .= '<title>註冊會員認證信</title></head><body>';
			$message .= '<h3>'. $m_email .'您好！感謝您註冊網站會員。</h3>';
			$message .= '<p>這是為了更好的用戶體驗所做的認證信件，現在只剩下最後一個步驟即可啟用您的帳號。</p>';
			$message .= '<p><strong><a href="'. base_url() .'validate_email/'. $m_email .'/'. $email_code .'">請按我</a></strong></p>';
			$message .= '</body></html>';
			$this->email->message($message);
			$this->email->send();
		}

		public function validate_email($email,$email_code){
			$result = false;
			$query = $this->db->get_where('members', array('m_email' => $email));
			$row = $query->row();
			if ($query->num_rows() === 1){
				if(md5((string)$row->m_created_at) === $email_code){
					$activated = $this->db->update('members', array('m_activated' => 1));
					if($this->db->affected_rows() == 1){
						$result = ture;
					}
				}
			}
			return $result;
		}

  }
?>
