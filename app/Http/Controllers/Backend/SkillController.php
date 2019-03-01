<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class SkillController extends Controller
{
    public function __construct() 
	{
		
	}
	public function index(Request $request)
	{
		$request_param = $request->input('search');

		if ($request_param)
		{
			$list_data = \App\Skill::where('title', 'LIKE', "%$request_param%")->paginate(5);
		}
		else
		{
			$list_data = \App\Skill::orderBy('id', 'DESC')->paginate(5);
		}

		return View('backend.skill.index',compact('list_data'));
	}

	public function create() 
	{		
		return View('backend.skill.create');
	}

	public function insert(Request $request) 
	{

			$title = $request->get('title');
			$percentage = $request->get('percentage');
			
			$user_data =\App\Skill::create(compact('title', 'percentage'));

			if ($user_data) 
			{
				return Redirect::route('backend/skill/create')->withMessage('Data Has Been Saved.');
			}	
			else
			{
				return Redirect::route('backend/skill/create')->withMessage('Data Failed To Save.');
			}		
	}

	public function edit($id) 
	{

		$list_data = \App\Skill::find($id);
		return View('backend.skill.edit', compact('list_data'));
	}

	public function update($id,Request $request) 
	{
			$update = \App\Skill::find($id);


			$update->title	= $request->get('title');
			$update->percentage = $request->get('percentage');
			
			$update->save();

			return Redirect::route('backend/skill/edit',array('id' => $id))->withMessage('Data Has Been Edited.');
		
	}
	public function delete($id) 
	{
		\App\Skill::find($id)->delete();
		return Redirect::route('backend/skill')->withMessage('Data Has Been Deleted.');
	}
}
