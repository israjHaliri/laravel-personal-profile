<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
use Config;
use Validator;
use Redirect;
use URL;
use Auth;

class HomeController extends Controller
{
	public function __construct()
	{

	}
	public function index()
	{
		$content = '/';
		$title_content = 'home';
		$category = 'url';

		\App\Count::create(compact('content', 'title_content', 'category'));

		$data_profile = \App\User::first();
		$data_education = \App\Content::where('category', '=', '1')->get();
		$data_experience = \App\Content::where('category', '=', '2')->get();
		$data_award = \App\Content::where('category', '=', '3')->get();
		$data_gallery_project = \App\Content::where('category', '=', '4')->get();
		$data_gallery_teamwork = \App\Content::where('category', '=', '5')->get();
		$data_skill = \App\Skill::All();

		return view('frontend.home',compact(
			'data_profile',
			'data_education',
			'data_experience',
			'data_award',
			'data_gallery_project',
			'data_gallery_teamwork',
			'data_skill'
			));
	}
	public function contact_us(Request $request) {

		$name = $request->input('name');
		$email = $request->input('email');
		$subject = $request->input('subject');
		$message = $request->input('message');

		$data = array(
			'name' => $name, 
			'email' => $email, 
			'subject' => $subject, 
			'message' => $message, 
			);

		// for print mail config
		// dd(Config::get('mail'));

		$data = $request->all();
		$rules = array(
			'email' => 'required|email',
			);

		$message = array(
			'email.required' => 'Email cannot be empty.',
			'email.email' => 'Email Must Be Like admin@mail.com.',
			);

		$validator = Validator::make($data, $rules, $message);
		if ($validator->fails())
		{
			$url = URL::route('/') . '#contact';
			return Redirect::to($url)->withInput()->withErrors($validator);
		}
		else
		{

			Mail::send('mailing.contact', ['data' => $data], function ($message) use ($data) {
				$message->from($data['email'], $data['name']);
				$message->to('israj.haliri@gmail.com', 'israj haliri')->subject($data['subject']);
			});

			$url = URL::route('/') . '#contact';
			return Redirect::to($url)->withMessage('Email Has Been Send');
		}
	}
}
