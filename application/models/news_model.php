<?php
class news_model extends CI_Model{
		public function __construct(){
			$this->load->database();
			$this->now = date("Y-m-d H:i:s");
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

		public function store(){
			$data = array(
        'n_title' => $this->input->post('title'),
        'n_slug' => url_title($this->input->post('title')),
        'n_content' => $this->input->post('content'),
        'n_created_at' => $this->now
      );
			$query = $this->db->get_where('news', array('n_slug' => $data['n_slug']));
			if ($query->num_rows() == 0){
				return $this->db->insert('news', $data);
			}else{
				return false;
			}
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

		public function delete($slug = FALSE){
			// $query = $this->db->where('n_slug', $slug);
			$query = $this->db->get_where('news', array('n_slug' => $slug));
			if ($query->num_rows() > 0){
				$this->db->where('n_slug', $slug);
				$this->db->delete('news');
				return true;
			}else{
				return false;
			}
		}


  }
?>
