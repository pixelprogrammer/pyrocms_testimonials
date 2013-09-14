<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends Public_Controller {

	public function index()
	{
		// display testimonials based on the setting from the control panel
		$this->load->model('testimonial_m');

        var_dump($this->testimonial_m->get_random()); die();
		$this->template->set('testimonials', $this->testimonial_m->get_testimonials());
		$this->template->title($this->module_details['name']);
		$this->template->build('index');
	}

}

/* End of file testimonials.php */
/* Location: .//Applications/MAMP/htdocs/pyro_test/addons/shared_addons/modules/testimonials/controllers/testimonials.php */