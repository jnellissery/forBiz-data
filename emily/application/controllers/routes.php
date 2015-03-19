<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*| -------------------------------------------------------------------------| URI ROUTING| -------------------------------------------------------------------------| This file lets you re-map URI requests to specific controller functions.|| Typically there is a one-to-one relationship between a URL string| and its corresponding controller class/method. The segments in a| URL normally follow this pattern:||	example.com/class/method/id/|| In some instances, however, you may want to remap this relationship| so that a different class/function is called than the one| corresponding to the URL.|| Please see the user guide for complete details:||	http://codeigniter.com/user_guide/general/routing.html|| -------------------------------------------------------------------------| RESERVED ROUTES| -------------------------------------------------------------------------|| There area two reserved routes:||	$route['default_controller'] = 'home';|| This route indicates which controller class should be loaded if the| URI contains no data. In the above example, the "welcome" class| would be loaded.||	$route['404_override'] = 'errors/page_missing';|| This route will tell the Router what URI segments to use if those provided| in the URL cannot be matched to a valid route.|*/
$route['default_controller'] = "home";
$route['404_override'] = '';
$route['faq']='home/faq';
$route['faq']='home/faq';
$route['about']='home/about_rd';
$route['contact']='home/contactus';
$route['emily']='home/emily';
$route['home']='home/index';
$route['home/(:any)']='home/index1/$1';
$route['profile']='bleedingscore/patient_profile';
$route['add_pat_profile']='bleedingscore/insert_patient_profile';
$route['patient_profile']='patient/view_patient_profile';
$route['patient_profile1/(:num)']='patient/view_patient_profile1/$1';

$route['pagination/(:num)']='pagination/index/$1';

$route['changepassword']='patient/changepassword';
$route['changepassword1']='doctor/changepassword';

$route['enter_score']='bleedingscore/bleeding';

$route['instruction']='patient/instruction';
$route['askadoctor']='patient/askadoctor';
$route['news']='home/news';
$route['patientlist/(:any)']='doctor/viewpatients/$1';
$route['sortpatients']='doctor/sort_patient_list';
$route['login/detailedprofile/(:num)']='doctor/detailedprofile/$1';
$route['login/detailedprofile1/(:num)']='doctor/detailedprofile1/$1';
$route['login/sort_patient_list/(:any)/(:any)']='doctor/sort_patient_list/$1/$2';
$route['login/delete_patient/(:any)']='doctor/delete_patient/$1';
$route['logout']='home/emily';
$route['login/checkusername']='doctor/checkusername';
$route['querydoctor']='patient/querydoctor';
$route['update_pat_profile']='admin/update_patients';

$route['admin/administrator/login']='superadmin/logincheck/';
$route['admin/hll-emily']='superadmin/login/';
$route['admin/logout']='superadmin/logout/';
$route['admin/add_patients']='admin/add_patients_form/';
$route['admin/add_pat_profile']='admin/add_patients_profile/';
$route['map_popup']='admin/map_popup/';
$route['admin/mobile_message_enquiry']='admin/callcenter_enquiry/';
$route['admin/doctornameavailability']='admin/checkdoctorname';
$route['admin/add_doctor']='admin/add_doctor_form/';
$route['admin/update_doctors/(:any)']='admin/update_doctors_profile/$1';
$route['marketing']='home/marketing/';
$route['doctormarketing']='home/doctormarketing/';
$route['emily_enquiry']='home/marketing_enquiry/';
$route['admin/enquiries']='admin/getAllEnquiry/';
$route['admin/menquiries']='admin/mgetAllEnquiry/';
$route['instruction']='home/instruction';

/* End of file routes.php *//* Location: ./application/config/routes.php */