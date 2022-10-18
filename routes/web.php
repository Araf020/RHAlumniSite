<?php

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

Route::get('/','PagesController@home')->name('index');
Route::post('/saveContactSubmission','PagesController@contact')->name('saveContactSubmission');




Route::get('/adminhome','AdminController@adminhome')->name('admin');
Route::get('/admin/addnew','AdminController@addnew')->name('addnew');
Route::post('/admin/addnew','AdminController@save')->name('saveNew');
Route::get('/admin/alldata','AdminController@alldata')->name('alldata');
Route::get('/admin/pending','AdminController@pending')->name('pending');
Route::get('/admin/onlinepending','AdminController@onlinePending')->name('onlinePending');
Route::get('/admin/failed','AdminController@failed')->name('failed');
Route::get('/admin/canceled','AdminController@canceled')->name('canceled');
Route::get('/admin/changes','AdminController@changes')->name('changes');
//single email and message
Route::get('/admin/confirm/{order_id}','SendPayemntSuccessMessage@send')->name('s');
Route::get('/admin/email/{order_id}','SendPayemntSuccessMessage@sendEmail')->name('sendemail');
Route::get('/admin/sms/{order_id}','SendPayemntSuccessMessage@sendSmstouser')->name('sendsms');
Route::get('/admin/banksms/{order_id}','SendPayemntSuccessMessage@sendBankInfoSms')->name('sendBankInfoSms');
Route::get('/admin/bankemail/{order_id}','SendPayemntSuccessMessage@sendBankInfoEmail')->name('sendBankInfoEmail');
Route::get('/admin/bankall/{order_id}','SendPayemntSuccessMessage@sendBank')->name('sendBank');

Route::post('admin/getdatabyid','AdminController@getdatabyid')->name('getdatabyid');
Route::post('getStatusDataById','RegistrationFormController@getStatusDataById')->name('getStatusDataById');
//Route::get('admin/reg/{id}/edit','AdminController@edit')->name('formEdit');
//Route::get('admin/tempreg/{id}/edit','AdminController@tempedit')->name('tempformEdit');
Route::resource('admin/tempreg','TempRegFormController');
Route::resource('admin/reg','RegistrationFormController');
Route::post('admin/updatePaymentStatus','AdminController@updatePaymentStatus')->name('updatePaymentStatus');

Route::get('admin/moved','PendingEntryController@index')->name('movedentry');
Route::post('updateMovedStatus','PendingEntryController@updatePaymentStatus')->name('updateMovedStatus');
Route::post('getdatabyid.moved','PendingEntryController@getdatabyid')->name('getdatabyid.moved');





Route::get('/registerform','PagesController@register')->name('registerform');
Route::get('tnc','PagesController@tnc')->name('tnc');
Route::get('/deposite/{order_id?}','RegistrationFormController@deposite')->name('deposite');
Route::get('payment_status','RegistrationFormController@payment_status')->name('payment_status');
Route::post('/registerform','RegistrationFormController@save')->name('SaveData');
Route::post('/chceckId','RegistrationFormController@checkId')->name('chceckId');
Route::post('updateFormStatus','RegistrationFormController@updateFormStatus')->name('updateFormStatus');
Route::post('checkPaymentStatus','RegistrationFormController@checkPaymentStatus')->name('checkPaymentStatus');
Route::post('checkPhoneNo','RegistrationFormController@checkPhoneNo')->name('checkPhoneNo');
Route::get('bulkmail','BulkMailController@view')->name('bulkmail.view');
Route::post('bulkmail','BulkMailController@SendBulkEmail')->name('bulkmail.SendBulkEmail');


Route::get('admin/successTrxData','ExcellController@successTrxData')->name('successTrxData');
Route::get('admin/pendingBankData','ExcellController@pendingBankData')->name('pendingBankData');
Route::get('admin/pendingOnlineData','ExcellController@pendingOnlineData')->name('pendingOnlineData');
Route::get('admin/failedOnlinedata','ExcellController@failedOnlinedata')->name('failedOnlinedata');
Route::get('admin/canceledOnlineData','ExcellController@canceledOnlineData')->name('canceledOnlineData');
Route::get('admin/changesData','ExcellController@changesData')->name('changesData');
Route::get('admin/currentstnd','CurrentStudentController@currentStudent')->name('currentStudent');
Route::get('admin/currentstndxl','ExcellController@currentStudent')->name('currentStudentxl');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Current Student Routes
Route::get('/currentstnd','CurrentStudentController@index')->name('currentstnd');
Route::post('/currentstnd','CurrentStudentController@store')->name('currentstndSaveData');
Route::post('validateStudentId','CurrentStudentController@validateStudentId')->name('validateStudentId');
Route::post('validateEmail','CurrentStudentController@validateEmail')->name('validateEmail');
Route::post('validatePhone','CurrentStudentController@validatePhone')->name('validatePhone');

Route::get('/pay', 'PublicSslCommerzPaymentController@index')->name('pay');
Route::POST('/success', 'PublicSslCommerzPaymentController@success');
Route::POST('/fail', 'PublicSslCommerzPaymentController@fail');
Route::POST('/cancel', 'PublicSslCommerzPaymentController@cancel');
Route::POST('/ipn', 'PublicSslCommerzPaymentController@ipn');

Route::get('sset','HomeController@session');
Route::get('mail','HomeController@mail');
Route::get('qr','HomeController@qr');
Route::get('sms','HomeController@sms');
Route::get('trid','HomeController@unique_order_id');
Route::get('mobile/{mobile}','HomeController@mobile');
Route::get('smstest','HomeController@smstest');
Route::get('excell','HomeController@exportFile')->name('exportFile');
Route::get('tshirt','HomeController@tshirt')->name('tshirt');
Route::get('order/{order_id}','HomeController@getorderdata')->name('getorderdata');

//test
Route::get('testpending','TestController@allPendingTrans');
Route::get('allmail','TestController@getALlInfo');
