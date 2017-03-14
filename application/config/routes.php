<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
require_once( APPPATH .'helpers/globalfunctions_helper.php');
$route['default_controller'] = "Homecontroller";
$route['admin'] = "AdminHomecontroller";

$route['admin/loginAct'] = 'AdminHomecontroller/loginAction';

$route['admin/dashboard'] = 'Profilecontroller/dashboard';

$route['admin/coursecategories'] = 'Coursescategorycontroller/coursecategories';
$route['admin/deleteCategory/(:num)'] = 'Coursescategorycontroller/delCategoryAction/$1';
$route['admin/deleteSubCategory/(:num)'] = 'Coursescategorycontroller/delSubCategoryAction/$1';
$route['admin/countries'] = 'Coursescategorycontroller/countries';
$route['admin/deleteCountry/(:num)'] = 'Coursescategorycontroller/delCountryAction/$1';


$route['admin/courses'] = 'Coursescontroller/courses';
$route['admin/course_create'] = 'Coursescontroller/createCourse';
$route['admin/coursedetails/(:num)'] = 'Coursescontroller/coursedetails/$1';
$route['admin/deletecourse/(:num)'] = 'Coursescontroller/deletecourse/$1';
$route['admin/coursegallery/(:num)'] = 'Coursescontroller/coursegallery/$1';

$route['admin/pages'] = 'Pagescontroller/pages';
$route['admin/page_create'] = 'Pagescontroller/createPage';
$route['admin/pagedetails/(:num)'] = 'Pagescontroller/pagedetails/$1';
$route['admin/deletepage/(:num)'] = 'Pagescontroller/deletepage/$1';
$route['admin/pagegallery/(:num)'] = 'Pagescontroller/pagegallery/$1';

$route['admin/completedorders'] = 'Coursescontroller/CompletedOrders';
$route['admin/pendingorders'] = 'Coursescontroller/PendingOrders';
$route['admin/confirmorders'] = 'Coursescontroller/ConfirmOrders';
$route['admin/dispatchorders'] = 'Coursescontroller/DispatchOrders';

$route['admin/approveorder/(:num)'] = 'Coursescontroller/approveorder/$1';
$route['admin/dptchorder/(:num)'] = 'Coursescontroller/dptchorder/$1';
$route['admin/cmpltorder/(:num)'] = 'Coursescontroller/cmpltorder/$1';

$route['admin/logout'] = "Profilecontroller/logout_page";
$route['admin/404_override'] = 'AdminHomecontroller/error_page';
/* End of file routes.php */
/* Location: ./application/config/routes.php */