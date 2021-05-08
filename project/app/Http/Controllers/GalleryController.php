<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Category;
use Image;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$gallery = Gallery::orderBy('created_at','desc')->get();
		return view('admin.gallery.index', compact('gallery','catgeory'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$all_category = Category::pluck('title','id')->all();
		return view('admin.gallery.create',compact('all_category'));
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

      $optimizePath = public_path().'/images/gallery/';

      $name = time().$file->getClientOriginalName();

      $optimizeImage->save($optimizePath.$name, 70);

			$input['image'] = $name;

		}

		Gallery::create($input);

		// $img="images/gallery/$name";
  //   $file1 = Image::make($img);
  //   $file1->save($img,60);

		return back()->with('added', 'Gallery Image has been added');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Gallery  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Gallery  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$gallery = Gallery::findOrFail($id);
		$all_category = Category::pluck('title','id')->all();
		return view('admin.gallery.edit', compact('gallery','all_category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Gallery  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required|min:3',
			'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
		]);

		$gallery = Gallery::findOrFail($id);

		$input = $request->all();

		if ($file = $request->file('image')) {

			if ($gallery->image != null) {

				$image_file = @file_get_contents(public_path().'/images//gallery/'.$gallery->image);

				if($image_file){
				
					unlink(public_path().'/images/gallery/'.$gallery->image);
				}

			}
			
      $optimizeImage = Image::make($file);

      $optimizePath = public_path().'/images/gallery/';

      $name = time().$file->getClientOriginalName();

      $optimizeImage->save($optimizePath.$name, 70);

			$input['image'] = $name;

		}

		$gallery->update($input);

		return redirect('admin/gallery')->with('updated', 'Gallery Image has been updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Gallery  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$gallery = Gallery::findOrFail($id);

		if ($gallery->image != null) {
				
			$image_file = @file_get_contents(public_path().'/images//gallery/'.$gallery->image);

			if($image_file){
			
				unlink(public_path().'/images/gallery/'.$gallery->image);
			}

		}

		$gallery->delete();

		return back()->with('deleted', 'Gallery Image has been deleted');
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

