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

$route['default_controller'] = "dashboard";
//$route['404_override'] = '';

$route['login'] = "login";
$route['sub-agent/list'] = 'masteragent/subagentlist';
$route['sub-agent/addagent'] = 'modal/addagent';
$route['sub-agent/simpan'] = 'masteragent/subagentsimpan';
$route['sub-agent/delete'] = 'masteragent/delete';
$route['sub-agent/activate'] = 'masteragent/activate';


$route['master-data/akun'] = 'finance/akunlist';
$route['master-data/akun/addakun'] = 'modal/addakun';
$route['master-data/akun/simpan'] = 'finance/simpanakun';

$route['master-data/payment'] = 'finance/listpaymenttype';
$route['master-data/addpayment'] = 'modal/addpayment';
$route['master-data/simpanpaymenttype'] = 'finance/simpanpayment';

$route['agent/finance/topup'] = "deposit";
$route['agent/finance/transaction-report'] = "deposit";
$route['deposit'] = "deposit";
$route['deposit/adddeposit'] = "modal/adddeposit";

$route['finance/verifikasi-topup'] = 'deposit';
$route['finance/topup-airline'] = 'deposit';


$route['sub-agent/profil'] = 'subagent/profil';
$route['sub-agent/saveprofil'] = 'subagent/simpanprofil';
$route['sub-agent/savemaskapai'] = 'subagent/saveagentmaskapai';
$route['sub-agent/addmaskapai'] = 'modal/addmaskapai';

$route['getbandaralist'] = 'modal/getbandaralist';
$route['search'] = 'ticketing/search';

$route['ticket/bookings'] = "ticketing/listtransaksiticket";
$route['ticket/getmarkup'] = "ticketing/getmarkup";
$route['ticket/bookings/detail'] = "ticketing/getdetail";

$route['report/subagent-balance'] = 'report/getbalance';


$route['maskapai/addlogin'] = 'modal/addloginmaskapai';
$route['maskapai/simpanlogin'] = 'maskapai/simpanlogin';
$route['maskapai/listlogin'] = 'maskapai/listlogin';
$route['master-data/airline'] = 'maskapai/listairline';
$route['maskapai/addmasterkapai'] = 'modal/addmastermaskapai';

$route['user/userlist'] = 'user/userlist';
$route['user/adduser'] = 'modal/adduser';
$route['user/simpanuser'] = 'user/simpanuser';

$route['ticket/refund'] = 'refund';
$route['refund/addrefund'] = 'modal/addrefund';
$route['refund/simpan'] = 'refund/simpan';

$route['login/signin'] = "login/signin";
$route['login/logout'] = "login/logout";


$route['scrap/book/citilink'] = 'scrap/citilinkbook2';
$route['scrap/issued/citilink'] = 'scrap/citilinkissued';
$route['scrap/issued/airasia'] = 'scrap/airasiaissued';
$route['scrap/book/airasia'] = 'scrap/airasiabook2';
$route['scrap/book/garuda'] = 'scrap/garudabooking2';
$route['scrap/book/lion'] = 'scrap/lionbooking';
$route['scrap/book/sriwijaya'] = 'scrap/sriwijayabooking';
$route['scrap/search/sriwijaya'] = 'scrap/sriwijayasearch';
$route['scrap/sample/garuda'] = 'sample/garuda';
$route['scrap/sample/garudabooking'] = 'sample/garudabooking';
$route['scrap/sample/garudafare'] = 'sample/garudafare';
$route['scrap/sample/lionairbooking'] = 'sample/lionairbooking';
$route['scrap/general'] = 'scrap/general';
//$route['scrap/citilinkbook'] = 'scrap/citilinkbook';
$route['scrap/addpassenger'] = 'modal/addpassenger';
$route['scrap/simpanpassenger'] = 'ticketing/simpanpassenger';
$route['scrap/booking'] = 'scrap/booking';

$route['scrap/airasia'] = 'scrap/airasia';

$route['scrap/submitcaptcha'] = 'scrap/submitcaptcha';
$route['scrap/checkcaptcha'] = 'scrap/checkcaptcha';
/* End of file routes.php */
/* Location: ./application/config/routes.php */