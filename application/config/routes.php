<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'LoginController';

$route['sign_in'] = 'LoginController/login';
$route['logout'] = 'LoginController/logout';
$route['home'] = 'DashboardController/index';



// Route Data Property
    $route['view_property'] = 'PropertyController';

    $route['page_create_property'] = 'PropertyController/page_create';
    $route['create_property'] = 'PropertyController/action_add';

    $route['page_update_property/(:any)'] = 'PropertyController/page_update';
    $route['update_property'] = 'PropertyController/action_edit';

    $route['delete_property/(:any)'] = 'PropertyController/action_delete';


// Route Data User
    $route['view_user'] = 'UserController';

    $route['page_create_user'] = 'UserController/page_create';
    $route['create_property'] = 'UserController/action_add';

    $route['page_update_user/(:any)'] = 'UserController/page_update';
    $route['update_user'] = 'UserController/action_edit';

    $route['delete_property/(:any)'] = 'UserController/action_delete';




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;