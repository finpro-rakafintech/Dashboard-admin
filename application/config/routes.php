<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'LoginController';

$route['sign_in'] = 'LoginController/login';

$route['home'] = 'DashboardController/index';

// Route Data Property
$route['view_property'] = 'PropertyController';

$route['page_create'] = 'PropertyController/page_create';
$route['create_property'] = 'PropertyController/action_add';

$route['page_update/(:any)'] = 'PropertyController/page_update';
$route['update_property'] = 'PropertyController/action_edit';

$route['delete_property/(:any)'] = 'PropertyController/action_delete';


// Route Data User
$route['view_user'] = 'UserController';





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;