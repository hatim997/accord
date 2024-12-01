<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController as ac;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\FreightController;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\MdiIcons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\SelectSearchController as ssc;
use Illuminate\Support\Facades\Artisan;

// Main Page Route


// Route::get('/run-migrations', function () {
//   //Artisan::call('migrate:fresh', ['--force' => true]);
//   //Artisan::call('db:seed');
//   echo 'All Done!';
// });

Route::group(['middleware' => 'checkRole:admin'], function () {
  Route::get('/admin/dash', [AdminController::class, 'dashadmin'])->name('dashs');
  Route::get('/admin/user', [AdminController::class, 'dashuser'])->name('dashuser');
  Route::get('/admin/user/shiperlimits/{id}', [AdminController::class, 'shipperlimits'])->name('shipperlimits');
  //Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('/admin/sub/', [AdminController::class, 'subs'])->name('sub');
  Route::get('/admin/edit_user/{id}', [AdminController::class, 'edituser'])->name('edit_user');
  Route::get('/admin/delete_user/{id}', [AdminController::class, 'deleteuser'])->name('delete_user');

  Route::post('/admin/update_user/', [AdminController::class, 'updateuser'])->name('update_user');
  Route::post('/admin/add_sub/', [AdminController::class, 'add_sub'])->name('add_sub');
  Route::post('/admin/edit_sub/{id}', [AdminController::class, 'edit_sub'])->name('edit_sub');
  Route::get('/admin/agent_truck/', [AdminController::class, 'assign_driver_to_agent'])->name('a2t');
  Route::post('/admin/add_agent_driver/', [AdminController::class, 'relate_driver_to_agent'])->name('add_agent_driver');
  Route::get('/admin/deactive/{id}', [AdminController::class, 'deactive'])->name('deactive');
  Route::get('/admin/active/{id}', [AdminController::class, 'active'])->name('active');
  Route::get('/admin/cert-deactive/{id}', [AdminController::class, 'certdeactive'])->name('cert-deactive');
  Route::get('/admin/cert-active/{id}', [AdminController::class, 'certactive'])->name('cert-active');
  Route::get('/admin/certifecate', [AdminController::class, 'certadmin'])->name('dash_cert');
  Route::get('/admin/shipper-certifecate', [AdminController::class, 'view_certificate_by_shipper'])->name('shipper_cert');
  Route::get('/admin-download-certificate/{file}', [AdminController::class, 'download_certificate'])->name('admin.download.certificate');
  Route::get('/openrquest/{id}',  [AdminController::class, 'opnrqet'])->name('opnrqet');

  Route::get('/admin/user-view/{id}', [AdminController::class, 'userview'])->name('user.view');
  Route::get('/admin/user-list', [AdminController::class, 'userlist'])->name('user.list');


  // Route::post('/admin/filter-users', [AdminController::class, 'filterUsers'])->name('filterUsers');
});

Route::get('view-certificate/{path}', [AdminController::class, 'viewCertificate'])->name('admin.view.certificate');
Route::get('admin/get-value/{path}/{user_id}', [AdminController::class, 'getPdfValue'])
    ->name('get.value');

Route::post('/mark-read/{id}', [AdminController::class, 'markAsRead'])->name('mark-read');

// remove /accord livewire
Livewire::setScriptRoute(function ($handle) {
  return Route::get('/public/livewire/livewire.js', $handle);
});
Livewire::setUpdateRoute(function ($handle) {
  return Route::post('/public/livewire/update', $handle);
});
Route::get('/accord', function () {
  return view('fromdrop');
});



Route::get('/accord', function () {
  return view('fromdrop');
});

Route::get('/form3', function () {
  return view('agent.form3');
});

Route::get('/insurSearch', [ssc::class, 'selectSearch'])->name('insurSearch');
// NOW qywuziryz@example.com
Route::get('/reg-agency', function () {
  return view('default');
})->name('reg.trucker');
Route::get('/truckform/{id}', [AuthController::class, 'form'])->name('truck.from');
Route::get('reboot',function(){
  Artisan::call('view:clear');
  Artisan::call('route:clear');  Artisan::call('config:clear');
  Artisan::call('cache:clear');  Artisan::call('key:generate');
  return "done";
});

Route::get('/blanks', function () {
  return view('blanks'); // This returns the 'blanks' view
})->name('blanks');
Route::post('/upgrade-plan', [AuthController::class, 'addtocart'])->name('add_to_cart');
Route::post('/pay-now', [AuthController::class, 'payNow'])->name('pay.now');

Route::post('/reg', [AuthController::class, 'register'])->name('form.reg');
Route::post('/reggg', [AuthController::class, 'getregister'])->name('get.regester');
Route::get('/reg-shipper', function () { return view('content.authentications.reg-shipper'); })->name('reg.shipper');
Route::get('/reg-freights', function () { return view('content.authentications.reg-freights'); })->name('reg.freights');
Route::get('/reg-trucker', function () {
  return view('content.authentications.reg-agency');
})->name('reg.trucker');

Route::get('email-validate', [AuthController::class, 'validated'])->name('validated');
Route::post('email-validation', [AuthController::class, 'validation'])->name('validation');
Route::post('freight/update', [FreightController::class, 'update'])->name('update_certt');



Route::get('/exam', [TruckController::class, 'truckers'])->name('truckd');
Route::get('/exam1', [TruckController::class, 'truckerss'])->name('truckf');
Route::get('/exam2', [TruckController::class, 'truckersss'])->name('truckfs');
Route::get('/', [AuthController::class, 'land'])->name('landing');

Route::get('/reg-broker', function () {
  return view('content.authentications.reg-freights');
})->name('reg.broker');

Route::fallback(function () {
  // return view('content.pages.pages-misc-error');
});


Route::get('/mrun', function () {
  return 'Done';
});

Route::group(['middleware' => 'checkRole:agent'], function () {
  Route::get('/profile', [ac::class, 'agentprofiles'])->name('profile.agency');
  Route::get('/billing', [ac::class, 'billinguser'])->name('billing.agency');
  Route::get('/plan/{id}', [ac::class, 'userplan'])->name('plan.agency');



  Route::get('/login-agency', [AuthController::class, 'loginWordPress'])->name('login.agency');
  Route::get('/login-wordpress', [AuthController::class, 'loginWordPresss'])->name('login.wordpress');
  Route::get('/formlist', [ac::class, 'formlist'])->name('formlist');
  Route::get('/get-certf/{id}', [ac::class, 'getcert'])->name('get-certf');
  Route::get('/get-agency', [ac::class, 'getagency'])->name('getagency');
  Route::get('/cert_1st_step/{id}', [ac::class, 'choosePolicyTypes'])->name('cert_1st_step');
  Route::post('/form2', [ac::class, 'create'])->name('form2');
  Route::get('/dash', [ac::class, 'dash'])->name('dash');
  Route::get('/insured', [ac::class, 'insured'])->name('insur');
  Route::get('/insur_broker', [ac::class, 'insurf'])->name('insurf');
  Route::post('/save_cert', [ac::class, 'store'])->name('save_cert');
  Route::get('/main_cert/{id}', [ac::class, 'MainCertificate'])->name('main_cert');
  Route::get('/list_cert/{id}', [ac::class, 'show'])->name('list_cert');
  Route::get('/view_cert/{id}', [ac::class, 'showCertificate'])->name('view_cert');
  Route::get('/edit_cert/{id}', [ac::class, 'editCertificate'])->name('edit_cert');
  Route::get('/freght_cert/{id}', [ac::class, 'editCertificatee'])->name('freght_cert');
  Route::post('/update', [ac::class, 'update'])->name('update_cert');
  Route::get('/get_pdf/{id}', [ac::class, 'showPDF'])->name('get_pdf');
  Route::get('/get_pdf2/{id}', [ac::class, 'showPDF2'])->name('get_pdf2');
  Route::get('/agent-reg-add-form', [ac::class, 'add_trucker'])->name('agent.regs.add.form');
  Route::get('/agent-reg-add-brok-form', [ac::class, 'add_broker'])->name('agent.regs.add.brok.form');
  Route::post('/agent-reg-adds', [ac::class, 'store_trucker'])->name('agent.regs.store');
  Route::get('/get-driver/{id}', [ac::class, 'get_driver'])->name('get_driver');
  Route::post('/update-driver', [ac::class, 'update_driver'])->name('update_driver');
  Route::post('/password/update', [ac::class, 'checkpass'])->name('password.update');
  Route::post('/profile/update', [ac::class, 'proupd'])->name('agent.proupd');

});




  Route::group(['middleware' => 'checkRole:truck'], function () {
  Route::get('/portal', [TruckController::class, 'trucker'])->name('dashw');
  Route::post('/upload', [TruckController::class, 'upload'])->name('upload');
  Route::get('/truck/certifecate', [TruckController::class, 'certadmin'])->name('truck_cert');
  Route::get('/add-shipper', function () { return view('truck.add-shipper'); })->name('add.ship');
  Route::get('/add-agency', function () { return view('truck.add-agency'); })->name('add.agnt');
  Route::get('/list-shipper', [TruckController::class, 'shipper'])->name('list.ship');
  Route::post('/reg-add', [TruckController::class, 'addReg'])->name('reg.add');
  Route::get('/profile-truck', [TruckController::class, 'truckprofiles'])->name('profile.truck');
  Route::get('/add-truck', [TruckController::class, 'addTruck'])->name('add.truck');
  Route::get('/list-truck', [TruckController::class, 'trucks'])->name('lists.truck');
  Route::delete('/truck/{id}', [TruckController::class, 'deltruck'])->name('truck.destroy');
  Route::post('/store-truck', [TruckController::class, 'storeTruck'])->name('store.truck');
  Route::get('/add-driver', [TruckController::class, 'drivers'])->name('add.driver');
  Route::post('/store-driver', [TruckController::class, 'storeDriver'])->name('store.driver');
  Route::get('/add-broker', [TruckController::class, 'brokers'])->name('add.broker');
  Route::post('/store-broker', [TruckController::class, 'storeBroker'])->name('store.broker');
  Route::post('/profile/updatese', [TruckController::class, 'proupd'])->name('driver.proupd');

});





Route::group(['middleware' => 'checkRole:shipper'], function () {
  Route::get('/sportal', [ShipperController::class, 'dash2'])->name('sdash');
  Route::get('/add-trucks', function () { return view('shipper.add-trucker'); })->name('add.trucks');
  Route::get('/add-freights', function () { return view('shipper.add-freight'); })->name('add.freights');
  Route::post('/reg-adds', [ShipperController::class, 'addReg'])->name('regs.add');
  Route::get('/add-drivers', [ShipperController::class, 'drivers'])->name('add.drivers');
  Route::post('/store-drivers', [ShipperController::class, 'storeDriver'])->name('store.drivers');
  Route::get('/agent-reg-add-brok-forms', [ShipperController::class, 'brokers'])->name('agent.regs.add.brok.forms');
  Route::post('/store-brokers', [ShipperController::class, 'storeBroker'])->name('store.brokers');
  Route::post('/endorsmenr', [ShipperController::class, 'endors'])->name('endors');
  Route::get('/profile-shipper', [ShipperController::class, 'profiles'])->name('profile.shipper');
  Route::get('/upload-certificate', [ShipperController::class, 'uploadCertificate'])->name('upload.certificate');
  Route::post('/save-certificate', [ShipperController::class, 'storeCertificate'])->name('save.certificate');
  Route::get('/list-certificate', [ShipperController::class, 'listCertificate'])->name('list.certificate');
  Route::get('/download-certificate/{file}', [ShipperController::class, 'downloadCertificate'])->name('download.certificate');
  Route::post('/shipper-limit', [ShipperController::class, 'shipperLimitForm'])->name('shipper.limit');
  Route::get('/shipper-fromdrop2', [ShipperController::class, 'choosePolicyTypes'])->name('shipper.fromdrop2');
  Route::post('/profile/updates', [ShipperController::class, 'proupd'])->name('shipper.proupd');

});
Route::get('/notice', [AdminController::class, 'notice'])->name('notice');
Route::post('/notice/mark-all-as-read', [AdminController::class, 'markAllAsRead'])->name('notice.markAllAsRead');
Route::get('/notice/update/{id}', [AdminController::class, 'updateNoticeStatus'])->name('notice.update');




Route::group(['middleware' => 'checkRole:freight_driver'], function () {
  Route::get('/fportal', [FreightController::class, 'dashf'])->name('fportals');
  Route::get('/add-shipp', [FreightController::class, 'drivers'])->name('add.shipper');
  Route::post('/store-shipp', [FreightController::class, 'addshipper'])->name('store.shipper');
  Route::post('/short-add', [FreightController::class, 'shortaddshipper'])->name('short.shipper');
  Route::post('/store-driverr', [FreightController::class, 'storeDriverr'])->name('store.driverr');
Route::get('/profile-freight', [FreightController::class, 'profiles'])->name('profile.freight');
  Route::post('/profile/updat', [FreightController::class, 'proupd'])->name('freight.proupd');


});


// authentication
Route::get('/logg', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/login/shipper', [LoginBasic::class, 'indexs'])->name('auth-login-s');
Route::get('/login/truck', [LoginBasic::class, 'indext'])->name('auth-login-t');
Route::get('/login/freight', [LoginBasic::class, 'indexf'])->name('auth-login-f');


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logins', [AuthController::class, 'logins'])->name('logins');
Route::post('/logint', [AuthController::class, 'logint'])->name('logint');
Route::post('/loginf', [AuthController::class, 'loginf'])->name('loginf');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
