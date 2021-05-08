<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	  $testimonial = Testimonial::orderBy('created_at','desc')->get();
		return view('admin.testimonial.index', compact('testimonial'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.testimonial.create');
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
			'desc' => 'required|min:3',
			'designation' => 'required|min:3',
			'image' => 'required|image|mimes:jpg,png,gif,jpeg',
		]);


		$input = $request->all();

		if ($file = $request->file('image')) {
			
      $optimizedImage = Image::make($file);

      $optimizedPath = public_path().'/images/testimonial/';

      $optimizedImage->save($optimizedPath.time().$file->getClientOriginalName(), 70);

			$input['image'] = time().$file->getClientOriginalName();

		}

		Testimonial::create($input);

		return back()->with('added', 'Testimonial Image has been added');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Testimonial  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Testimonial  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$testimonial = Testimonial::findOrFail($id);
		return view('admin.testimonial.edit', compact('testimonial'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Testimonial  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required|min:3',
			'desc' => 'required|min:3',
			'designation' => 'required|min:3',
			'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
		]);

		$testimonial = Testimonial::findOrFail($id);

		$input = $request->all();

		if ($file = $request->file('image')) {

			if ($testimonial->image != null) {
				
				$image_file = @file_get_contents(public_path().'/images/testimonial/'.$testimonial->image);

				if($image_file){
					unlink(public_path().'/images/testimonial/'.$testimonial->image);
				}

			}

      $optimizedImage = Image::make($file);

      $optimizedPath = public_path().'/images/testimonial/';

      $optimizedImage->save($optimizedPath.time().$file->getClientOriginalName(), 70);

			$input['image'] = time().$file->getClientOriginalName();

		}

		$testimonial->update($input);

		return redirect('admin/testimonial')->with('updated', 'Testimonial Image has been updated');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Testimonial  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$testimonial = Testimonial::findOrFail($id);

		if ($testimonial->image != null) {
				
			$image_file = @file_get_contents(public_path().'/images/testimonial/'.$testimonial->image);

			if($image_file){
				unlink(public_path().'/images/testimonial/'.$testimonial->image);
			}

		}

		$testimonial->delete();

		return back()->with('deleted', 'Testimonial Image has been deleted');
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