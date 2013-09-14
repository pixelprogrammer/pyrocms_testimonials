<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route = array();
// public
// $route['testimonials/'] = 'index';
// $route['testimonial/create'] = 'create';

// admin
// $route['admin/testimonials'] = 'index';
$route['admin/testimonials/create'] = 'create';
$route['admin/testimonials/edit/(:num)'] = 'edit/$1';
// $route['blog/admin/categories(/:any)?'] = 'admin_categories$1';
// $route['blog/admin/fields(/:any)?']		= 'admin_fields$1';