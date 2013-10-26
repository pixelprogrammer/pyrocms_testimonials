<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	protected $section = 'testimonials';

	public function index()
	{
		$this->load->model('testimonial_m');
		$testimonials = $this->testimonial_m->get_all();
		$error = $this->session->flashdata('error');
		$success = $this->session->flashdata('success');

		$this->template->set('testimonials', $testimonials)
			->set('title', 'Testimonials')
			->set('error', $error)
			->set('success', $success)
			->build('admin/index');
	}

	public function create() {
		// create a testimonail page
		$this->load->model('testimonial_m');
		
		if($this->input->post('btn_action') !== false) {
			if($this->input->post('btn_action') == 'save_exit' || 
				$this->input->post('btn_action') == 'save') {
				// update the testimonial
				$input = array(
					'name'	=> $this->input->post('name'),
					'bio' 	=> $this->input->post('testimonial_bio'),
					'website_url'	=> $this->input->post('website_url'),
					'text'	=> $this->input->post('testimonial_text'),
					'status'=> $this->input->post('status')
					);

				if($id = $this->testimonial_m->insert($input)) {
					$this->session->set_flashdata('success', 'Testimonial was created successfully');
					if($this->input->post('btn_action') == 'save_exit') {
						redirect('admin/testimonials');
					} else {
						redirect('admin/testimonials/edit/' . $id);
					}
				}
			}
		}
		$data = 'Create something';
		$this->template->set('message', $data);
		$this->template->build('admin/create');
	}

	public function edit($id=null)
	{
		// if no ID is provided in the url
		// return to main page

		if($id == null) { redirect('admin/testimonials'); die(); }

		$this->load->model('testimonial_m');

		$testimonial = $this->testimonial_m->get_testimonial_by_id($id);

		// if no testimonial was found under that id
		// return to main page
		
		if($testimonial === false) { 
			$this->session->set_flashdata('error', 'This testimonial does not exist');
			redirect('admin/testimonials'); die(); 
		}

		if($this->input->post('btn_action') !== false) { 
			if($this->input->post('btn_action') == 'save_exit' || 
				$this->input->post('btn_action') == 'save') {
				// update the testimonial
				$input = array(
					'name'		=> $this->input->post('name'),
					'bio' 		=> $this->input->post('testimonial_bio'),
					'website_url'		=> $this->input->post('website_url'),
					'text'		=> $this->input->post('testimonial_text'),
					'status'	=> $this->input->post('status')
					);
				$id = $this->input->post('testimonial_id');

				if($this->testimonial_m->update($id, $input)) {
					$this->session->set_flashdata('success', 'Testimonial was updated successfully');
					if($this->input->post('btn_action') == 'save_exit') {
						redirect('admin/testimonials');
					} else {
						redirect('admin/testimonials/edit/' . $id);
					}
				}
			}
		}

		$this->template->set('test', $this->input->post('btn_action'));
		$this->template->set('testimonial', $testimonial);
		$this->template->append_metadata($this->load->view('fragments/wysiwyg', array(), true));
		$this->template->build('admin/edit');

	}

	public function delete($id=null) {
		if($id === null) {
			redirect('admin/testimonials');
		}

		$this->load->model('testimonial_m');

		$this->testimonial_m->delete($id);

		$this->session->set_flashdata('success', 'Testimonial was deleted');
		redirect('admin/testimonials');
	}

}

/* End of file admin.php */
/* Location: .//Applications/MAMP/htdocs/pyro_test/addons/shared_addons/modules/testimonials/controllers/admin.php */