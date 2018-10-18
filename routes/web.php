<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('bad');
});

Route::get('/landing', function () {
    return view('bad');
});
Route::get('/xyz', function () {
	// if(Auth::)
    return view('landing');
});

Route::get('/logon', function () {
    return view('logon');
});
Route::get('/login-via-agent', function () {
    return view('login');
});
Route::get('/login-via-bank', function () {
    return view('loginbank');
});
Route::get('/logout', function () {
    Auth::logout();
	return redirect('/');
});
Route::get('/tablerecords', function () {
	if(Auth::check()){
 		return view('ledgerreceipt');
	}else{
		  return redirect('/admin-login');
	}
   
})->name('tablerecords');

Route::get('preplay', function(){
	return view('preplay');
});

Route::post('/completepayment','RegisterController@completepayment');
Route::get('/confirmpayment','RegisterController@Confirmpay')->name('confirmtrans');
Route::get('/readpayment','BankPayControler@Confirmpay')->name('corerctrans');

Route::post('/updateinfosp','RegisterController@updateinfosp');
Route::post('/updateinfoviasp','BankPayControler@updateinfoviasp');
Route::get('/findpac', 'RegisterController@Findpac');
Route::get('/mdalist', [
	'uses' => '\App\Http\Controllers\RegisterController@mdaListing',
		
		
	]);
Route::post('/logon', [
	'uses' => '\App\Http\Controllers\RegisterController@newRemita',
		'as'=> 'reg.remita',
		
	]);
Route::get('/select-ajax/{decimal}', [
	'uses' => '\App\Http\Controllers\RegisterController@selectAjax',
		'as' => 'select-ajax',
		
	]);
Route::get('/mdainconfirmed','RegisterController@Mdainconfirmed');
Route::get('/mdainconfirmedbydate','RegisterController@Mdainconfirmedbydate');

Route::get('/fgmdainconfirmedbydate','RegisterController@FGmdainconfirmedbydate');



Route::get('/mdainconfirmedbybank','RegisterController@Mdainconfirmedbybank');
Route::get('/mdainconfirmedbyagent','RegisterController@Mdainconfirmedbyagent');
Route::post('/cardpay','RegisterController@Verifycardpay')->middleware('web');

Route::get('/viewinvoice/{remitaId}',[
	'uses' => '\App\Http\Controllers\RegisterController@viewInvoice',
		'as'=> 'remita',
		
	]);
Route::get('new-bank-agent', function(){
	if(Auth::check()){
 		return view('newagent');
	}else{
		  return redirect('/admin-login');
	}
});
Route::get('/paymentgateway','RegisterController@Navy')->name('test.route');
Route::post('finalreg','RegisterController@regChannel');
Route::get('cbnoptions',function(){
	if(Auth::User()->kind == 1){
		return view('cbnoptions');
	}elseif(Auth::User()->kind == 2){
			//echo "waiting";
				//return view('fedoptions');
		        return redirect()->route('fgoptions');


	}
	
})->name('cbnoptions');
Route::get('fgoptions',function(){
	
				return view('fedoptions');

	
	
})->name('fgoptions');

Route::get('all-channels',function(){
	return view('allchannels');
});
Route::post('loginads','AuthController@PostLogin');
Route::post('bymymda','RegisterController@bymymda');

Route::get('recordmda/{thismda}',function($thismda){
	//return view('allchannels');
	//echo $thismda;
	return view('thismda')
          ->with('thismda',$thismda);
	
});
Route::get('/viewledger/{ledgerid}',[
	'uses' => '\App\Http\Controllers\RegisterController@viewLedger',
		'as'=> 'viewledger',
		
	]);
Route::get('/cbn-admin-login','AuthController@Loguserview');
Route::get('/fg-admin-login','AuthController@FgView');

Route::get('/test',function(){

	 //getdate converted day


	$first = mt_rand(1000, 9999);
	$second = mt_rand(1000, 9999);
	$third = mt_rand(1000, 9999);
	$fourth = mt_rand(1000, 9999);
	$levi = time(). rand();

	$pac = $first.'-'.$second.'-'.$third.'-'.$fourth;
// 	$number = 12000000000;

// english notation (default)
// $yul = number_format($number);
	dd($pac);
	/*return view('cap');*/
});
