<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';//$route['default_controller'] = 'Frontend/PupilsController/index'
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['pupils'] = 'Frontend/PupilsController/index/1';
$route['pupils/(:num)'] = 'Frontend/PupilsController/index/$1';
$route['pupils/add'] = 'Frontend/PupilsController/create';
$route['pupils/store'] = 'Frontend/PupilsController/store';
$route['pupils/edit/(:any)'] = 'Frontend/PupilsController/edit/$1';
$route['pupils/update/(:any)'] = 'Frontend/PupilsController/update/$1';
$route['pupils/delete/(:any)']= 'Frontend/PupilsController/delete/$1';
$route['pupils/search'] = 'Frontend/PupilsController/search';
$route['pupils/view/(:any)'] = 'Frontend/PupilsController/view/$1';
$route['pupils/editmarks/(:any)'] = 'Frontend/PupilsController/editMarks/$1';
$route['pupils/createMarks/(:any)/(:any)'] = 'Frontend/PupilsController/createMarks/$1/$2';
$route['pupils/store_marks/(:any)/(:any)'] = 'Frontend/PupilsController/store_marks/$1/$2';
$route['pupils/updateMarks/(:any)'] = 'Frontend/PupilsController/updateMarks/$1';
