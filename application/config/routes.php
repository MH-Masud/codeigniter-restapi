<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['user'] = 'welcome/all_user';
$route['insert-user'] = 'welcome/insert_user';
$route['insert-user-data'] = 'welcome/insert_user_data';
$route['go'] = 'welcome/find';
