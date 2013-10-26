<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial_m extends MY_Model {

	public function __construct() {
		parent::__construct();
		// load models here
		
	}

	public function get_all() {
		$query = $this->db->get('testimonials');
		if($query->num_rows() > 0) {
			
			return $query->result();
		}
		
		return false;
	}

	public function get_testimonials() {
		$this->db->where('status', 1);
		$query = $this->db->get('testimonials');

		if($query->num_rows() > 0) {
			return $query->result();
		}
		
		return false;
	}

	public function get_testimonial_by_id($id)
	{
		$testimonial = $this->db->get_where('testimonials', array('id' => $id));
		if($testimonial->num_rows() > 0) {
			return $testimonial->row();
		} else {
			return false;
		}
	}

	public function get_latest() {

		$this->db->order_by('created_on', 'desc');
		$this->db->where('status', 1);
		$testimonial = $this->db->get('testimonials', 1);

		if($testimonial->num_rows() > 0) {
			return $testimonial->row();
		}

		return false;
	}
	/**
	 * Get one testimonial at random
	 * 		
	 * @return [object] return the testimonial object or false if none exist
	 */
	public function get_random() {
		$this->db->where('status', 1);
		$query = $this->db->get('testimonials');

		if($query->num_rows() > 0) {
			srand(time());
			$testimonials = $query->result();
			return $testimonials[rand(0, count($testimonials) - 1)];
		}

		return false;
		
	}

	public function update($id, $input=array(), $skip_validation=false)
	{
		return parent::update($id, $input);
	}

	public function insert($input = array(), $skip_validation = false) {
		return parent::insert($input);
	}

	public function delete($id)
	{
		// delete the testimonial
		$this->db->where('id', $id);
		return $this->db->delete('testimonials');
	}

}

/* End of file testimonial.php */
/* Location: .//Applications/MAMP/htdocs/pyro_test/addons/shared_addons/modules/testimonials/models/testimonial.php */