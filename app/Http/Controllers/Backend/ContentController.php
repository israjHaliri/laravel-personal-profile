<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Redirect;
use Validator;
use File;

class ContentController extends Controller
{
	public function __construct() 
	{
		
	}
	public function index(Request $request)
	{
		$request_param = $request->input('search');

		if ($request_param)
		{
			$list_data = \App\Content::where('title', 'LIKE', "%$request_param%")->paginate(5);
		}
		else
		{
			$list_data = \App\Content::orderBy('id', 'DESC')->paginate(5);
		}

		return View('backend.content.index',compact('list_data'));
	}

	public function create() 
	{		
		$category = array(
			'1' => 'Education', 
			'2' => 'Work Experience',
			'3' => 'Awards',
			'4' => 'Testimonial Project',
			'5' => 'Testimonial Teamwork',
			);
		return View('backend.content.create',compact('category'));
	}

	public function insert(Request $request) 
	{
		$data = $request->all();
		
		$rule = array(
			'title' => 'required|min:5', 
			'subtitle' => 'required|min:5', 
			'description' => 'required', 
			'file' => 'mimes:jpeg,jpg,png,gif|max:10000'
			);

		$message = array(
			'title.required' => 'title cannot be empty.',
			'title.min' => 'title min 5 character.',
			'subtitle.required' => 'title cannot be empty.',
			'subtitle.min' => 'title min 5 character.',
			'description.required' => 'description cannot be empty.',
			'file.image' => 'File Must Be An Image.',
			);
		
		$validation = Validator::make($data, $rule, $message);
		
		if($validation->fails()) 
		{
			return Redirect::back()->withErrors($validation)->withInput();
		} 
		else 
		{	
			$title = $request->get('title');
			$subtitle = $request->get('subtitle');
			$description = $request->get('description');
			$category = $request->get('category');
			
			$save_data =\App\Content::create(compact('title','subtitle', 'description', 'category', 'image'));
			
			if ($save_data) 
			{
				if($request->file('file') != "")
				{
					$name_file = str_random(30).'-'.$request->file('file')->getClientOriginalName();
					$newDir =  base_path().'/resources/assets/image/landing_page/' . $save_data->id;
					File::makeDirectory( $newDir, 0755, false);
					$request->file('file')->move('resources/assets/image/landing_page/'. $save_data->id.'',$name_file);

					$update = \App\Content::find($save_data->id);
					$update->image 	= $name_file;		
					$update->save();

				}
				return Redirect::route('backend/content/create')->withMessage('Data Has Been Saved.');

			}
			else
			{
				return Redirect::route('backend/content/create')->withMessage('Something When Wrong Please Verify Your Data.');	
			}
			
		}
	}

	public function edit($id) {

		$category = array(
			'1' => 'Education', 
			'2' => 'Work Experience',
			'3' => 'Awards',
			'4' => 'Testimonial Project',
			'5' => 'Testimonial Teamwork',
			);
		$list_data = \App\Content::find($id);
		return View('backend.content.edit', compact('list_data','category'));
	}

	public function update($id,Request $request)
	{
		$data = $request->all();
		
		$rule = array(
			'title' => 'required|min:5', 
			'subtitle' => 'required|min:5', 
			'description' => 'required', 
			'file' => 'mimes:jpeg,jpg,png,gif|max:10000'
			);

		$message = array(
			'title.required' => 'title cannot be empty.',
			'title.min' => 'title min 5 character.',
			'subtitle.required' => 'title cannot be empty.',
			'subtitle.min' => 'title min 5 character.',
			'description.required' => 'description cannot be empty.',
			'file.image' => 'File Must Be An Image.',
			);
		
		$validation = Validator::make($data, $rule, $message);

		if($validation->fails()) 
		{
			return Redirect::back()->withErrors($validation)->withInput();
		} 
		else 
		{	
			$update = \App\Content::find($id);

			$update->title = $request->get('title');
			$update->subtitle = $request->get('subtitle');
			$update->description = $request->get('description');
			$update->category = $request->get('category');


			$save_data = $update->save();

			if ($save_data) 
			{
				if($request->file('file') != "")
				{
					$name_file = str_random(30).'-'.$request->file('file')->getClientOriginalName();
					$newDir =  base_path().'/resources/assets/image/landing_page/'.$id;
					File::delete($newDir.'/'.$update->image);
					if(!File::exists($newDir)) {
						File::makeDirectory( $newDir, 0755, false);   
					}
					$request->file('file')->move('resources/assets/image/landing_page/'. $id.'',$name_file);

					$update = \App\Content::find($id);
					$update->image 	= $name_file;		
					$update->save();

				}
				return Redirect::route('backend/content/edit',array('id' => $id))->withMessage('Data Has Been Edited.');

			}
			else
			{
				return Redirect::route('backend/content/edit',array('id' => $id))->withMessage('Something When Wrong Please Verify Your Data.');	
			}
			
		}
	}
	public function delete($id) {
		
		$data=\App\Content::where('id',$id)->first();
		if(File::delete('resources/assets/image/landing_page/'.$data->id.'/'.$data->image))
		{	
			File::deleteDirectory('resources/assets/image/landing_page/'.$data->id);
			$data->delete();
			return Redirect::route('backend/content')->withMessage('Data Has Been Deleted.');
		}
		else
		{	
			$data->delete();
			return Redirect::route('backend/content')->withMessage('Data Has Been Deleted.');	
		}
	}
}
