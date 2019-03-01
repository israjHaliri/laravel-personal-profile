<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);


Route::get('login',['as' => 'login', function () {

	if (isset($_COOKIE['remember_me_cookie']) && Auth::user() != "") 
	{   
		return Redirect::to('backend/dashboard');  
	}
	else
	{
		return View('frontend.login');
	}

}]);

Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::post('login/auth', ['as' => 'login/auth', 'uses' => 'LoginController@auth']);


Route::post('contact_us', ['as' => 'contact_us', 'uses' => 'HomeController@contact_us']);


Route::group(array('middleware' => 'auth'), function()
{
	Route::group(['namespace' => 'Backend'], function()
	{
		Route::group(['prefix' => 'backend'], function () {

			Route::get('dashboard', ['as' => 'backend/dashboard', 'uses' => 'DashboardController@index']);

			Route::get('data_chart', ['as' => 'backend/data_chart', 'uses' => 'DashboardController@data_chart']);


			Route::get('profile', ['as' => 'backend/profile', 'uses' => 'ProfileController@index']);

			Route::put('profile/edit/{id}', ['as' => 'backend/profile/edit', 'uses' => 'ProfileController@edit']); 


			Route::get('content', ['as' => 'backend/content', 'uses' => 'ContentController@index']);


			Route::get('content/create', 
				['as' => 'backend/content/create', 'uses' => 'ContentController@create']
				);

			Route::post('content/insert', 
				['as' => 'backend/content/insert', 'uses' => 'ContentController@insert']
				);

			Route::get('content/edit/{id}', 
				['as' => 'backend/content/edit', 'uses' => 'ContentController@edit']
				);

			Route::put('content/edit/{id}', 
				['as' => 'backend/content/update', 'uses' => 'ContentController@update']
				);

			Route::get('content/delete/{id}', 
				['as' => 'backend/content/delete', 'uses' => 'ContentController@delete']
				);  


			Route::get('skill', ['as' => 'backend/skill', 'uses' => 'SkillController@index']);


			Route::get('skill/create', 
				['as' => 'backend/skill/create', 'uses' => 'SkillController@create']
				);

			Route::post('skill/insert', 
				['as' => 'backend/skill/insert', 'uses' => 'SkillController@insert']
				);

			Route::get('skill/edit/{id}', 
				['as' => 'backend/skill/edit', 'uses' => 'SkillController@edit']
				);

			Route::put('skill/edit/{id}', 
				['as' => 'backend/skill/update', 'uses' => 'SkillController@update']
				);

			Route::get('skill/delete/{id}', 
				['as' => 'backend/skill/delete', 'uses' => 'SkillController@delete']
				);  

		});
	});
});
