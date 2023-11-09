<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

$route['delete_property/(:any)'] = 'PropertyController/delete';


// Route Data User
$route['view_user'] = 'UserController';

$route['page_create_user'] = 'UserController/page_create';
$route['create_user'] = 'UserController/action_add';

$route['page_update_user/(:any)'] = 'UserController/page_update';
$route['update_user'] = 'UserController/action_edit';

$route['delete_user/(:any)'] = 'UserController/delete';


// Route Data Nasabah
$route['view_nasabah'] = 'NasabahController';

$route['page_create_nasabah'] = 'NasabahController/page_create';
$route['create_nasabah'] = 'NasabahController/action_add';

$route['page_update_nasabah/(:any)'] = 'NasabahController/page_update';
$route['update_nasabah'] = 'NasabahController/action_edit';

$route['delete_nasabah/(:any)'] = 'NasabahController/delete';

// Route Data Article
$route['view_article'] = 'ArticleController';

$route['page_create_article'] = 'ArticleController/page_create';
$route['create_article'] = 'ArticleController/action_add';

$route['page_update_article/(:any)'] = 'ArticleController/page_update';
$route['update_article'] = 'ArticleController/action_edit';

$route['delete_article/(:any)'] = 'ArticleController/delete';

// Route Data Pengajuan
$route['view_pengajuan'] = 'PengajuanController';
$route['detail_pengajuan/(:any)'] = 'PengajuanController/detail_pengajuan/$1';


$route['page_create_pengajuan'] = 'PengajuanController/page_create';
$route['create_pengajuan'] = 'PengajuanController/action_add';

$route['page_update_pengajuan/(:any)'] = 'PengajuanController/page_update';
$route['update_pengajuan'] = 'PengajuanController/action_edit';

$route['delete_pengajuan/(:any)'] = 'PengajuanController/delete';
$routes['process_pengajuan/(:any)'] = 'PengajuanController/process_pengajuan/$1';




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
