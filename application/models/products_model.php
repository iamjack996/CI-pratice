<?php
class products_model extends CI_Model{
		public function __construct(){
			$this->load->database();
      $this->now = date("Y-m-d H:i:s");
		}

		public function show($slug = FALSE){
			if($slug === FALSE){
				$this->db->order_by('products.p_id', 'DESC');
				$query = $this->db->get('products');
				return $query->result_array();
			}
			$query = $this->db->get_where('news', array('p_slug' => $slug));
			return $query->row_array();
		}

    public function store($fileName = NULL){
      $data = array(
        'p_title' => $this->input->post('title'),
        'p_slug' => $this->input->post('slug'),
        'p_kind' => $this->input->post('kind'),
        'p_price' => $this->input->post('price'),
        'p_description' => $this->input->post('description'),
        'p_image' => $fileName,
        'p_created_at' => $this->now
      );
      $query = $this->db->get_where('products', array('p_slug' => $data['p_slug']));
      if ($query->num_rows() == 0){
				return $this->db->insert('products', $data);
			}else{
				return false;
			}
    }



  }
?>
