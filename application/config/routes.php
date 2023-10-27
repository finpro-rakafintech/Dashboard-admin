<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'LoginController';

$route['sign_in'] = 'LoginController/login';

$route['home'] = 'DashboardController/index';

// Route Data Property
$route['view_property'] = 'PropertyController';


// Route Data User
$route['view_user'] = 'UserController';





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;