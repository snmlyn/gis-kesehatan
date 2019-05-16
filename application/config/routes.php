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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller']            = 'home';

$route['admin/profile']                  = 'setting/profile';
$route['admin/profile/data']             = 'setting/profile_data';
$route['admin/profile/add']              = 'setting/profile_add';
$route['admin/profile/detail']           = 'setting/profile_detail';
$route['admin/profile/edit']             = 'setting/profile_edit';
$route['admin/profile/delete']           = 'setting/profile_delete';
$route['admin/profile/photo']            = 'setting/profile_photo';
$route['admin/upload/photo']             = 'setting/upload_photo';
$route['admin/list']                     = 'setting/admin';
$route['admin/log']                      = 'setting/log';
$route['admin/profile/change_password']           = 'auth/update_password';
$route['admin/profile/save_new_password']           = 'auth/do_update_password';

$route['wilayah/kecamatan']              = 'wilayah/kecamatan';
$route['wilayah/kecamatan/data']         = 'wilayah/kecamatan_data';
$route['wilayah/kecamatan/detail']       = 'wilayah/kecamatan_detail';
$route['wilayah/kecamatan/add']               = 'wilayah/kecamatan_add';
$route['wilayah/kecamatan/edit']              = 'wilayah/kecamatan_edit';
$route['wilayah/kecamatan/delete']            = 'wilayah/kecamatan_delete';

$route['wilayah/kelurahan'] = 'wilayah/kelurahan';
$route['wilayah/kelurahan/data']    = 'wilayah/kelurahan_data';
$route['wilayah/kelurahan/detail']    = 'wilayah/kelurahan_detail';
$route['wilayah/kelurahan/add']               = 'wilayah/kelurahan_add';
$route['wilayah/kelurahan/edit']              = 'wilayah/kelurahan_edit';
$route['wilayah/kelurahan/delete']            = 'wilayah/kelurahan_delete';
/*
$route['wilayah/ajax_kecamatan'] = 'wilayah/ajax_kecamatan';

$route['wilayah/filter_kecamatan'] = 'wilayah/filter_kecamatan';
$route['wilayah/filter_kecamatan_modal'] = 'wilayah/filter_kecamatan_modal';
$route['wilayah/filter_kelurahan_modal'] = 'wilayah/filter_kelurahan_modal';
*/
$route['wilayah/filter_kelurahan'] = 'wilayah/filter_kelurahan';
$route['wilayah/filter_distribusi'] = 'wilayah/filter_distribusi';
$route['wilayah/save_koordinat'] = 'wilayah/save_koordinat';
$route['home/layanan_data'] = 'home/layanan_data';

$route['pelayanan'] = 'pelayanan/index';
$route['pelayanan/data']    = 'pelayanan/data';
$route['pelayanan/detail']    = 'pelayanan/detail';
$route['pelayanan/add']               = 'pelayanan/add';
$route['pelayanan/save']               = 'pelayanan/save';
$route['pelayanan/edit']              = 'pelayanan/edit';
$route['pelayanan/delete']            = 'pelayanan/delete';
$route['pelayanan/peta']            = 'peta/index';

$route['home']          = 'home/peta';
$route['home/filter_kelurahan'] = 'home/filter_kelurahan';
$route['home/filter_distribusi'] = 'home/filter_distribusi';
$route['home/filter_distribusi_bylayanan'] = 'home/filter_distribusi_bylayanan';
$route['home/filter_distribusi_byunitlayanan'] = 'home/filter_distribusi_byunitlayanan';
$route['home/search_distribusi'] = 'home/search_distribusi';
$route['home/add_comment']          = 'home/add_comment';
$route['peta']          = 'home/peta';
$route['bantuan']          = 'home/help';
$route['about']         = 'home/about';
$route['login']         = 'auth/login';
$route['login/auth']    = 'auth/do_login';
$route['logout']    = 'auth/logout';

$route['404_override'] = 'mypage/my404';
$route['translate_uri_dashes'] = FALSE;
