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
$route['default_controller'] = 'home';
$route['page/(:any)'] = "/page/view/$1";
$route['404_override'] = '';
$route['admin'] = 'admin/admin/index';
// $route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/logout'] = 'admin/admin/logout';
$route['admin/login/validate_credentials'] = 'admin/admin/validate_credentials';
// $route['admin/add_catgory'] = 'admin/admin/add_catgory';
$route['admin/add_category'] = 'admin/categories/add_category';
$route['admin/show_category'] = 'admin/categories/show_category';
$route['admin/add_sub_category'] = 'admin/categories/add_sub_category';
$route['admin/show_sub_category'] = 'admin/categories/show_sub_category';
$route['admin/delete_category'] = 'admin/categories/delete_category';
$route['admin/show_user_list'] = 'admin/usersList/show_user_list';
$route['admin/delete_user'] = 'admin/usersList/delete_user';
$route['admin/getProjectOfUser'] = 'admin/usersList/getProjectOfUser';
$route['admin/getBidsProjectOfUser'] = 'admin/usersList/getBidsProjectOfUser';
$route['admin/show_projects'] = 'admin/admin_projects/show_projects';
$route['admin/delete_projects'] = 'admin/admin_projects/delete_projects';
$route['admin/showPaymentRequest'] = 'admin/adminPayment/showPaymentRequest';
$route['admin/detailPaymentRequest'] = 'admin/adminPayment/detailPaymentRequest';
$route['admin/showMainSliderImages'] = 'admin/frontEndManagement/showMainSliderImages';
$route['admin/addMainSliderImages'] = 'admin/frontEndManagement/addMainSliderImages';
// $route['paypal'] = 'vendor/paypal/restapisdkphp/sample/payments/createpayment';
$route['admin/commissionSettings'] = 'admin/commissionSettings/show_commission';
$route['admin/cancel_dispute'] = 'admin/adminDispute/cancel_dispute';
$route['admin/add_commission'] = 'admin/commissionSettings/add_commission';
$route['admin/addCencellationReason'] = 'admin/cencellationReason/addCencellationReason';
$route['admin/showCencellationReason'] = 'admin/cencellationReason/showCencellationReason';
$route['admin/deleteCencellationReason'] = 'admin/cencellationReason/deleteCencellationReason';

$route['admin/showWithdrawList'] = 'admin/withdraw/showWithdraw';
$route['admin/detailWithdraw'] = 'admin/withdraw/detailWithdraw';

$route['admin/changePassword'] = 'admin/account/changePassword';
$route['admin/showAdminList'] = 'admin/admin/showAdminList';
$route['admin/addSubAdmin'] = 'admin/admin/addSubAdmin';

/*admin*/
/* $route['admin'] = 'admin/admin/index';
$route['admin/signup'] = 'admin/admin/signup';
$route['admin/create_member'] = 'admin/user/create_member';
$route['admin/login'] = 'admin/admin/index';
$route['admin/logout'] = 'admin/admin/logout';
$route['admin/login/validate_credentials'] = 'admin/admin/validate_credentials';

$route['admin/dashboard'] = 'admin/admin/dashboard';
$route['admin/products/add'] = 'admin/admin_products/add';
$route['admin/products/update'] = 'admin/admin_products/update';
$route['admin/products/update/(:any)'] = 'admin/admin_products/update/$1';
$route['admin/products/delete/(:any)'] = 'admin/admin_products/delete/$1';
$route['admin/products/(:any)'] = 'admin/admin_products/index/$1'; //$1 = page number

$route['admin/manufacturers'] = 'admin/admin_manufacturers/index';
$route['admin/manufacturers/add'] = 'admin/admin_manufacturers/add';
$route['admin/manufacturers/update'] = 'admin/admin_manufacturers/update';
$route['admin/manufacturers/update/(:any)'] = 'admin/admin_manufacturers/update/$1';
$route['admin/manufacturers/delete/(:any)'] = 'admin/admin_manufacturers/delete/$1';
$route['admin/manufacturers/(:any)'] = 'admin/admin_manufacturers/index/$1'; //$1 = page number

$route['admin/subcategories'] = 'admin/admin_subcategories/index';
$route['admin/subcategories/add'] = 'admin/admin_subcategories/add';
$route['admin/subcategories/update'] = 'admin/admin_subcategories/update';
$route['admin/subcategories/update/(:any)'] = 'admin/admin_subcategories/update/$1';
$route['admin/subcategories/delete/(:any)'] = 'admin/admin_subcategories/delete/$1';
$route['admin/subcategories/(:any)'] = 'admin/admin_subcategories/index/$1'; //$1 = page number

$route['admin/categories'] = 'admin/admin_categories/index';
$route['admin/categories/add'] = 'admin/admin_categories/add';
$route['admin/categories/update'] = 'admin/admin_categories/update';
$route['admin/categories/update/(:any)'] = 'admin/admin_categories/update/$1';
$route['admin/categories/delete/(:any)'] = 'admin/admin_categories/delete/$1';
$route['admin/categories/(:any)'] = 'admin/admin_categories/index/$1'; //$1 = page number

 */



/* End of file routes.php */
/* Location: ./application/config/routes.php */