<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;	
use Auth;
use Validator;
use Redirect;
use Hash;
use File;
use View;

class ProfileController extends Controller
{

    public function index()
    {    	
		$id = Auth::user()->id;
		$list_data = \App\User::where('id', '=', $id)->first();
		return View('backend.profile.index', compact('list_data'));
    }
    public function edit($id,Request $request)
    {

		$data = $request->all();
		
		$rule = array(
            'name' => 'required', 
			'file' => 'image',
            'email' => 'required|email',
            'password' => 'max:60',
			);

		$message = array(
			'name.required' => 'Name cannot be empty.',
			'file.image' => 'File Must Be An Image.',
			'email.required' => 'Email cannot be empty.',
			'email.email' => 'Email Must Be Like admini@mail.com.',
			'password.max' => 'Password Max 60 Character.',
			);
		
		$validation = Validator::make($data, $rule, $message);
	
		
		if($validation->fails()) 
		{	
			return Redirect::back()->withErrors($validation)->withInput();
		} 
		else 
		{

			$user = \App\User::where('id', '=', $id)->first();

			if($request->file('file') != "")
			{
				$name_file = str_random(30).'-'.$request->file('file')->getClientOriginalName();
				File::delete('resources/assets/image/'.$user->avatar);
				$request->file('file')->move('resources/assets/image/',$name_file);
				$user->avatar	= $name_file;
			}
			
			if ($request->get('password') != "") 
			{
				$user->password 	= Hash::make($request->get('password'));
			}

			$user->email = $request->get('email');
			$user->name	= $request->get('name');
			$user->address 	= $request->get('address');	
			$user->phone 	= $request->get('phone');	
			
			$user->save();

			return Redirect::route('backend/profile')->withMessage('Data Has Been Edited.');
		}
    }
}
