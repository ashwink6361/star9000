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



Auth::routes();






// Admin Url here all detail //
Route::match(['get','post'],'/','AdminController@index');
Route::match(['get','post'],'/admin','AdminController@index');
Route::match(['get','post'],'/resetta-la-password','UserResetPasswordController@index');
Route::match(['get','post'],'/cambia-la-password/{token}','UserResetPasswordController@changePassword');


Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

Route::get('/bacheca','AdminController@dasbhoard');
Route::get('/dashboard','AdminController@dasbhoard');

Route::get('lista-segretaria','AdminController@ListSecretary');

Route::match(['get','post'],'aggiungi-segretaria','AdminController@AddSecretary');

Route::get('deletesecretary/{id}','AdminController@DeleteSecretary');

Route::match(['get','post'],'modifica-segretaria/{id}','AdminController@EditSecretary');

Route::get('visite','AdminController@ListExamination');

Route::match(['get','post'],'aggiungi-visita ','AdminController@AddExamination');

Route::get('delete-examination/{id}','AdminController@ExaminationDelete');

Route::match(['get','post'],'modifica-visite/{id}','AdminController@EditExamination');

Route::match(['get','post'],'calendario','AppointmentController@index');

Route::get('assegna-stanza','AdminController@RoomList');

Route::match(['get','post'],'aggiungi-stanza','AdminController@AddRoome');

Route::get('delete-room/{id}','AdminController@DeleteRoom');

Route::match(['get','post'],'modifica-stanza/{id}','AdminController@EditRooms');

Route::get('elenco-medico','AdminController@DoctorList');

Route::match(['get','post'],'aggiungi-medico','AdminController@AddDoctor');

Route::match(['get','post'],'modifica-medico/{id}','AdminController@EditDoctor');

Route::match(['get','post'],'profilo-visite','AdminController@SetExamination');

Route::get('responsedata','AppointmentController@ResponseData');
Route::get('doctorresponsedata','DoctorAppointmentController@ResponseData');
Route::get('doctor-appointments','DoctorAppointmentController@List');

Route::get('ajaxresponse/{id}','AppointmentController@AjaxResponse');

Route::post('ajaxset-appointment','AppointmentController@AjaxSetAppointment');
Route::post('create-patient','AppointmentController@CreatePatient');

Route::post('cancel-appointment','AppointmentController@CancelAppointment');
Route::post('modify-appointment','AppointmentController@ModifyAppointment');
Route::post('cancel-recurrence-appointment','AppointmentController@CancelRecurrenceAppointment');
Route::get('getdoctoravailability','AppointmentController@getdoctoravailability');
Route::get('getdoctoravailabilityDates','AppointmentController@getdoctoravailabilityDates');
Route::post('searchAppointment','AppointmentController@searchAppointment');
Route::get('compareDoctor','AppointmentController@compareDoctor');
Route::get('getPatientDataOnCalendar','AppointmentController@getPatientDataOnCalendar');

Route::get('doctor-leaves','AdminController@DoctorLeaves');

Route::get('test-digital-pad','AdminController@TestDigital');

Route::get('/logout','AdminController@AdminLogout');
Route::get('paziente','PatientController@index');
Route::match(['get','post'],'aggiungi-paziente','PatientController@AddPatient');
Route::match(['get','post'],'modifica-paziente/{id}','PatientController@EditPatient');
Route::get('/privacydoc','PatientController@Privacydoc');
Route::post('/saveprivacy','PatientController@SavePrivacy');
Route::match(['get','post'],'privacy','PrivacyController@index');
Route::match(['get','post'],'/eyevisit/{patid}/{id}','PatientController@eyevisit');
Route::get('/gestire-il-paziente','PatientController@managepatient');
Route::get('/dailypatientupdate','PatientController@dailypatientupdate');
Route::get('/getpatient/{id}','PatientController@getpatient');
Route::get('/savecomment', 'PatientController@savecomment');
Route::post('/savemedicine','PatientController@savemedicine');
Route::get('/intervento/{type}','PatientController@intervento');
Route::get('/intervento','PatientController@intervento');
Route::match(['get','post'],'aggiungi-intervento','PatientController@AddIntervento');
Route::match(['get','post'],'modifica-intervento/{id}','PatientController@EditIntervento');
Route::get('/saveintervento','PatientController@saveintervento');
//eye visit tabs
Route::get('/schede-eye-visit','PatientController@eyevisittabs');
Route::get('/ingressi-scheda/{id}','PatientController@tabsInput');
Route::get('/ingressi-scheda/{id}/{refrizone}','PatientController@tabsInput');

Route::match(['get','post'],'aggiungi-scheda','PatientController@addtab');
Route::match(['get','post'],'modifica-scheda/{id}','PatientController@edittab');
Route::match(['get','post'],'aggiungi-ingressi/{tabid}','PatientController@addInput');
Route::match(['get','post'],'modifica-ingressi/{tabid}/{id}','PatientController@editInput');
Route::get('/elimina-scheda/{id}','PatientController@deletetab');
Route::get('/elimina-ingressi/{tabid}/{id}','PatientController@deleteinput');
Route::get('/elenco-per-medico','PatientController@listByDoctor');
Route::get('/dailyPatChangeStatus/{patid}','PatientController@dailyPatChangeStatus');
Route::post('/dailyPatChangeStatus/{patid}','PatientController@dailyPatChangeStatus');
Route::post('/getMainPatientList','PatientController@getMainPatientList');
Route::post('/importazione-paziente','PatientController@importPatient');
Route::get('/promemoria','ReminderController@index');
Route::match(['get','post'],'aggiungi-promemoria','ReminderController@addReminder');
Route::match(['get','post'],'modifica-promemoria/{id}','ReminderController@editReminder');
Route::get('/elimina-promemoria/{id}','ReminderController@deleteReminder');
Route::get('/getreminder','ReminderController@getreminder');
Route::get('/updatereminder','ReminderController@updatereminder');
Route::get('/ottenere-la-firma-dellutente/{patid}','PatientController@getPatientSignature');
Route::post('/ottenere-la-firma-dellutente/{patid}','PatientController@getPatientSignature');
Route::get('/livello-di-accesso','AccessLevelController@index');
Route::match(['get','post'],'livello-di-accesso/{userid}','AccessLevelController@index');
Route::get('/getUsersByType','AccessLevelController@getUsersByType');

});

//doctor sector
Route::group(['prefix'=>'medico','middleware'=>['auth','admin']],function(){
	Route::get('/appuntamenti','DoctorController@appointments');
	Route::get('/paziente','DoctorController@patients');
	Route::get('/paziente/{all}','DoctorController@patients');
	Route::post('/patientsAjaxMy','DoctorController@patientsAjax');
	Route::post('/patientsAjax/{all}','DoctorController@patientsAjax');

	Route::get('/responsedata','DoctorController@responsedata');
	Route::match(['get','post'],'profilo-visite','AdminController@SetExamination');
	Route::get('/bacheca','AdminController@dasbhoard');
	Route::match(['get','post'],'modifica-paziente/{id}','PatientController@EditPatient');
	Route::match(['get','post'],'/eyevisit/{patid}/{id}','DoctorController@eyevisit');
	Route::get('/logout','AdminController@AdminLogout');
	Route::get('/promemoria','ReminderController@index');
	Route::match(['get','post'],'aggiungi-promemoria','ReminderController@addReminder');
	Route::match(['get','post'],'modifica-promemoria/{id}','ReminderController@editReminder');
	Route::get('/elimina-promemoria/{id}','ReminderController@deleteReminder');
});