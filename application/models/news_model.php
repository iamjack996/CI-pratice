<?php
class news_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

    public function show($slug = FALSE){
			if($slug === FALSE){
				$this->db->order_by('news.n_id', 'DESC');
				$query = $this->db->get('news');
				return $query->result_array();
			}
			$query = $this->db->get_where('news', array('n_slug' => $slug));
			return $query->row_array();
		}

	public function update(/*$slug = FALSE*/){
			$data = array(
				'n_slug' => $this->input->post('slug'),
        'n_title' => $this->input->post('title'),
        'n_content' => $this->input->post('content'),
      );
			$this->db->where('n_slug', $data['n_slug']);
			$this->db->update('news', $data);

			if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
		}

  }
?>
