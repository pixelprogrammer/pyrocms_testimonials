<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plugin_Testimonials extends Plugin {
    /**
     * Return the latest testimonials
     *
     * Usage:
     * {{ testimonials:latest }}
     *     {{ name }} - name or company name
     *     {{ text }} - testimonial given
     * {{ /testimonials:latest}}
     * @return [array] Returns a testimonial array
     */
    public function latest()
    {
        $this->load->model('testimonial_m');

        $latest = $this->testimonial_m->get_latest();
        
        $testimonial = array(
            array('name' => $latest->name, 
                  'text' => $latest->text
            ),
        );

        return $testimonial;
    }

    /**
     * Return a random testimonial
     *
     * Usage:
     * {{ testimonials:random }}
     *     {{ name }}
     *     {{ text }}
     * {{ /testimonials:random }}
     * @return [array] Returns a random testimonial array
     */
    public function random()
    {
        $this->load->model('testimonial_m');

        $random = $this->testimonial_m->get_random();
        return array($this->_convert_to_array($random));
    }

    private function _convert_to_array($object) {
        $testimonial = array(
            'name' => $object->name, 
            'text' => $object->text
        );

        return $testimonial;
    }

}

/* End of file plugin.php */
/* Location: .//Applications/MAMP/htdocs/pyro_test/addons/shared_addons/modules/testimonials/plugin.php */