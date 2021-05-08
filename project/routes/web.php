<?php
use App\FAQ;
use App\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('theme.home');
// });



/*google login route*/
// Route::get('login/o_auth/facebook  ', 'Auth\LoginController@redirectToProvider');
// Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');



/*Social Login*/
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider')->name('sociallogin');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');


/*facebook login route*/

// Route::get('login/google', 'Auth\LoginController@redirectToProvider');
// Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('admin/sociallogin/','ApiController@facebook');


Route::get('/','PageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/trending', 'PageController@trending')->name('trending');
Route::get('/all', 'PageController@all')->name('all');

// Route::get('/faq',function(){
//   $faqs = FAQ::all();
//   return view('theme.faq',compact('faqs'));
// });

//navigation item routes

Route::get('/category','CategoryController@showcat');
Route::get('/mostviewed','WorkController@trending');
Route::get('/mostcommented','WorkController@mostcommented');
Route::get('/authors','WorkController@authors');

Route::get('/blog',function(){
  $blogs = Blog::all();
  return view('theme.blog',compact('blogs'));
});
Route::get('blog/{id}/{title}', 'BlogController@blog_read');


Route::redirect('/home', '/');

Route::redirect('/admin', '/');

// Searching Routes
Route::get('search', 'SearchController@homeSearch');
Route::get('search/{tag}', 'SearchController@tag_search');

// Route::get('about', 'PageController@about_show');
Route::get('gallery', 'PageController@gallery_show');
Route::get('video', 'PageController@video_show');
Route::get('photos', 'PageController@work_show');
Route::get('photos/{uniId}/{slug}', 'PageController@work_dtl_show');
Route::get('category/{key}', 'PageController@category_show');
Route::get('sale', 'PageController@sale_show');
Route::get('contact', 'PageController@contact_show');
Route::get('profile/{uni_id}/{key}', 'PageController@profile_show');
Route::get('counter', 'PageController@download_counter');
Route::post('contact', 'PageController@contact_post')->name('contact');

//Import Export

Route::post('importExcel', 'WorkController@importExcel');
// Admin Dashboard Routes
Route::group(['middleware' => ['auth', 'is_admin']], function(){

  Route::post('admin/license/bulk_delete','LicenseController@bulk_delete');
  Route::get('admin/license','LicenseController@index')->name('lic.index');
  Route::get('admin/license/create','LicenseController@create')->name('lic.create');
  Route::post('admin/license/create','LicenseController@store')->name('lic.store');
  Route::patch('admin/license/update/{id}','LicenseController@update')->name('lic.update');
  Route::get('admin/license/edit/{id}','LicenseController@edit')->name('lic.edit');
  Route::delete('admin/license/{id}/delete','LicenseController@destory')->name('lic.delete');
  Route::get('admin/update/status/report/{id}','ReportImageController@status')->name('rep.status');
  Route::get('admin/reportimages','ReportImageController@index')->name('rep.index');
  Route::post('admin/work_delete','ReportImageController@bulk_delete');
  Route::get('admin/photos/allcomments','CommentController@listallcomment')->name('lis.comment.all');
  Route::get('admin/comment/approve/{id}','CommentController@approve');
  Route::post('admin/faq/bulk_delete','FAQController@bulk_delete');
  Route::get('admin/faq','FAQController@index')->name('faq.index');
  Route::get('admin/faq/create','FAQController@create')->name('faq.create');
  Route::post('admin/faq/create','FAQController@store')->name('faq.store');
  Route::patch('admin/faq/update/{id}','FAQController@update')->name('faq.update');
  Route::get('admin/faq/edit/{id}','FAQController@edit')->name('faq.edit');
  Route::delete('admin/faq/{id}/delete','FAQController@destory')->name('faq.delete');

  //Blog Routes
  Route::resource('admin/blog', 'BlogController');
  
  Route::post('admin/blog/bulk_delete','BlogController@bulk_delete');
    Route::get('admin/blog/{id}/edit','BlogController@edit')->name('blog.edit');

 
  //ApiController
     Route::get('/admin/mail','ApiController@setApiView')->name('api.setApiView');
  Route::post('/admin/mail','ApiController@changeEnvKeys')->name('api.update');

  Route::get('admin/sociallogin/','ApiController@facebook')->name('set.facebook');

  Route::post('admin/facebook','ApiController@updateFacebookKey')->name('key.facebook');

  Route::post('admin/google','ApiController@updateGoogleKey')->name('key.google');

  Route::post('admin/gitlab','ApiController@updategitlabKey')->name('key.gitlab');

  
  Route::delete('admin/ans/{id}','Anscontroller@destroy')->name('ans.del');

  Route::get('/admin/payment', 'PaymentController@index')->name('admin.payment');

  //AdminDashBoard

	Route::get('/admin','AdminDashboardController@dashboard_show')->name('admin.dash');
Route::get('admin/profile', function(){
      $auth = Auth::user();
      return view('admin.profile', compact('auth'));
    });	
	Route::post('admin/profile-update', 'AdminDashboardController@update_profile');
	Route::resource('admin/gallery', 'GalleryController');
  Route::post('admin/gallery/bulk_delete', 'GalleryController@bulk_delete');
	Route::resource('admin/video', 'VideoController');
  Route::post('admin/video/bulk_delete', 'VideoController@bulk_delete');
	Route::resource('admin/category', 'CategoryController');
  Route::post('admin/category/bulk_delete', 'CategoryController@bulk_delete');
	Route::resource('admin/photos', 'WorkController');
  Route::post('admin/photos/bulk_delete', 'WorkController@bulk_delete');

	Route::resource('admin/testimonial', 'TestimonialController');
  Route::post('admin/testimonial/bulk_delete', 'TestimonialController@bulk_delete');
	Route::get('admin/general', 'SettingsController@general_show');


	Route::patch('admin/general_update/{id}', 'SettingsController@general_update');
  Route::resource('admin/social', 'SocialController');
  Route::post('admin/social/bulk_delete', 'SocialController@bulk_delete');
	Route::resource('admin/tag', 'TagController');
  Route::post('admin/tag/bulk_delete', 'TagController@bulk_delete');
  Route::resource('admin/pages', 'PagesController');
  Route::post('admin/pages/bulk_delete', 'PagesController@bulk_delete');

  Route::get('admin/request-for-approval','WorkController@pendingPhotos')->name('pend.pho');

  Route::get('admin/AdSetting', 'AdsettingController@ad_show');
   // Route::post('admin/AdSetting', 'AdsettingController@ad_update');
  Route::patch('admin/ad_update', 'AdsettingController@ad_update');


});

// User Profile Routes
  Route::group(['middleware' => 'auth'], function(){
  Route::get('user/profile-edit', 'UserDashboardController@profile_edit');
  Route::patch('user/profile-update/{id}', 'UserDashboardController@profile_update');
  Route::post('user/change-password', 'UserDashboardController@change_password')->name('change_password'); 

  //verify Email Routes

  

  
});

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

// User Dashboard Routes
Route::group(['middleware' => ['auth','is_verified']], function(){
  Route::resource('upload', 'UploadController');
  Route::get('user/my-photo', 'UserDashboardController@my_work_show'); 
  Route::get('user/my-collection', 'UserDashboardController@my_collection'); 
  Route::get('user/account', 'UserDashboardController@account_show'); 
  Route::post('/phvote', 'UserDashboardController@phvote');
  Route::post('favorite', 'UserDashboardController@favorite');
  Route::post('filtercollection', 'UserDashboardController@filter_collection'); 
  Route::post('follow', 'UserDashboardController@follow_user')->name('user.follow');
  Route::post('comment', 'UserDashboardController@comment');
  Route::get('user/followers', 'UserDashboardController@follow_show');
  Route::get('user/followings', 'UserDashboardController@following_show');

  
  Route::get('license/{slug}','LicenseController@show')->name('lic.show');

  Route::post('report/image/{id}','ReportImageController@store')->name('report.image');

  Route::get('admin/user_form', 'UserDashboardController@txt')->name('txt.user'); 
    Route::get('admin/suspended', 'UserDashboardController@suspended')->name('txt.sus'); 

  Route::get('admin/user_store','UserDashboardController@cre')->name('txt.add');
  Route::post('admin/inser','UserDashboardController@sto')->name('txt.sto');


  Route::get('/admin/user_form/edit/{id}','UserDashboardController@ed')->name('tax.edit');
   Route::put('admin/edit/{id}','UserDashboardController@change')->name('tax.update');
    Route::delete('admin/delete/{id}','UserDashboardController@del')->name('tax.delete');




});

// OAuth Routes
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('login/{service}', 'Auth\RegisterController@redirectToProvider')->name('sociallogin');


// Mail Subscription
Route::post('emailsubscribe', 'EmailSubscribeController@subscribe');

Route::get('{page}', 'PageController@page_show');


 Route::get('/admin/mail-settings','Configcontroller@getset')->name('mail.getset');
 Route::post('admin/mail-settings', 'Configcontroller@changeMailEnvKeys')->name('mail.update');


