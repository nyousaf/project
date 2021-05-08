<?php

namespace App\Http\Controllers;

use App\Video;
use App\Category;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{        
		$video = Video::orderBy('created_at','desc')->get();
		return view('admin.video.index', compact('video'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
	   $all_category = Category::pluck('title','id')->all();
	   return view('admin.video.create',compact('all_category'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|min:3',
			'image' => 'required|image|mimes:jpg,png,gif,jpeg',
		]);


		$input = $request->all();

		if ($file = $request->file('image')) {
			
			$optimizeImage = Image::make($file);

      $optimizePath = public_path().'/images/video/';

      $name = time().$file->getClientOriginalName();

      $optimizeImage->save($optimizePath.$name, 70);

			$input['image'] = $name;

		}

		Video::create($input);

		return back()->with('added', 'Video has been added');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Video  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Video  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$video = Video::findOrFail($id);
	   $all_category = Category::pluck('title','id')->all();
		return view('admin.video.edit', compact('video','all_category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Video  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required|min:3',
			'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
		]);

		$video = Video::findOrFail($id);

		$input = $request->all();

		if ($file = $request->file('image')) {
			
			if ($video->image != null) {

				$image_file = @file_get_contents(public_path().'/images/video/'.$video->image);

				if($image_file){
				
					unlink(public_path().'/images/video/'.$video->image);
				}

			}

			$optimizeImage = Image::make($file);

      $optimizePath = public_path().'/images/video/';

      $name = time().$file->getClientOriginalName();

      $optimizeImage->save($optimizePath.$name, 70);

			$input['image'] = $name;

		}

		$video->update($input);

		return redirect('admin/video')->with('updated', 'Video has been updated');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Video  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$video = Video::findOrFail($id);

		if ($video->image != null) {
				
			$image_file = @file_get_contents(public_path().'/images/video/'.$video->image);

			if($image_file){
			
				unlink(public_path().'/images/video/'.$video->image);
			}

		}

		$video->delete();

		return back()->with('deleted', 'Video has been deleted');
	}

	public function bulk_delete(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'checked' => 'required',
		]);

		if ($validator->fails()) {
			return back()->with('deleted', 'Please select one of them to delete');
		}

		foreach ($request->checked as $checked) {
			$this->destroy($checked);			
		}

		return back()->with('deleted', 'Work Image has been deleted');   
	}
}

