<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module_Testimonials extends Module {

	public $version = '1.0';
	public $name = array(
		'english' => 'Testimonials');

	public function info() {

		$this->lang->load('testimonials/testimonial');

		$info = array(
			'name' => array(
				'en' => 'Testimonials'
			),
			'description' => array(
				'en' => 'Use this to add Testimonials to your website'
			),
			'frontend' => true,
			'backend' => true,
			'menu' => 'content',
			'sections' => array(
				'testimonials' => array(
					'name' => 'Testimonials',
					'uri' => 'admin/testimonials',
					'shortcuts' => array(
						array(
							'name' => 'testimonial:add',
							'uri' => 'admin/testimonials/create',
							'class' => 'add',
						),
					),
				),
			),
		);

		return $info;
	}

	public function install() {

		$this->dbforge->drop_table('testimonials');
		$this->db->delete('settings', array('module' => 'testimonials'));

		// table schema
		$testimonial_schema = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => true,
				'auto_increment' => true
				),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
				),
			'bio' => array(
				'type' => 'TEXT',
				),
			'website_url' => array(
				'type' => 'VARCHAR',
				'constraint' => '255'
				),
			'text' => array(
				'type' => 'TEXT',
				),
			'status' => array(
				'type' => 'INT',
				'constraint' => '1'
				),
			'created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
			);

		// admin options for the settings page
		
		$testimonial_settings = array(
			array(
				'slug' => 'testimonial_show_max',
				'title' => 'Show Max',
				'description' => 'How many testimonials do you want displayed on the testimonial page at a time?',
				'`default`' => '10',
				'`value`' => '10',
				'type' => 'select',
				'`options`' => '5=5|10=10|15=15|20=20|25=25|50=50',
				'is_required' => 1,
				'is_gui' => 1,
				'module' => 'testimonials'
			),
			array(
				'slug' => 'show_bio',
				'title' => 'Show Bio',
				'description' => 'Do you want to display the bio of the client that gives testimonials?',
				'`default`' => true,
				'`value`' => '',
				'type' => 'radio',
				'`options`' => '1=Show|0=Hide',
				'is_required' => 1,
				'is_gui' => 1,
				'module' => 'testimonials'
			),
			array(
				'slug' => 'allow_links',
				'title' => 'Allow Links',
				'description' => 'Allow links directed to another site from this one? By allowing people to post links on your website you will increase the chances of getting that testimonial from them. If you ever decide that you don\'t want to direct people away from your site then you can always turn them off with this feature',
				'`default`' => true,
				'`value`' => '',
				'type' => 'select',
				'`options`' => '1=Show|0=Hide',
				'is_required' => 1,
				'is_gui' => 1,
				'module' => 'testimonials'
			)
		);

		// build the schema
		$this->dbforge->add_field($testimonial_schema);
		$this->dbforge->add_key('id', true);

		if(!$this->dbforge->create_table('testimonials') OR
			!$this->db->insert_batch('settings', $testimonial_settings)) {
			// database insertion failed
			return false;
		
		}

		if(!is_dir($this->upload_path.'testimonials') AND !@mkdir($this->upload_path.'testimonials',0777,TRUE)) {
			// couldn't create the path
			return false;
		}

		// all clear
		return true;
	
	}

	public function upgrade($old_version) {
		return true;
	}

	public function uninstall() {

		$this->dbforge->drop_table('testimonials');
		$this->db->delete('settings', array('module' => 'testimonials'));

		return true;
	}

	public function help() {
		return 'No documentation yet';
	}
}

/* End of file details.php */
/* Location: .//Applications/MAMP/htdocs/pyro_test/addons/shared_addons/modules/testimonials/details.php */