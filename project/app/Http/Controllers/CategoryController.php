<?php

namespace App\Http\Controllers;

use App\Category;
use App\Adsetting;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{        
		
		$category = Category::orderBy('created_at','desc')->get();
		return view('admin.category.index', compact('category'));
	}

	
		public function showcat()
	{        
       $ad_settings = Adsetting::first();
		$category = Category::orderBy('created_at','desc')->get();
		return view('user.category', compact('category','ad_settings'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.category.create');
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
			'image' => 'image|mimes:jpg,png,gif,jpeg'
		]);


		$input = $request->all();


		if ($file = $request->file('image')) {
		ini_set('memory_limit','256M');

			$normalImage = Image::make($file);
			
			$optimizeImage = $normalImage->fit(300,200);
      $optimizePath = public_path().'/images/category/';
   
	  $name = time().$file->getClientOriginalName();

	
      $optimizeImage->save($optimizePath.$name, 70);

			$input['image'] = $name;

	 	}
	
		$cat = Category::create($input);
    $cat->slug = str_slug($input['title'],'-');
    $cat->save();
	
		return back()->with('added', 'Category has been added');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Category  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Category  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
	   $category = Category::findOrFail($id);
		return view('admin.category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Category  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required|min:3',
			'image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
		]);

		$category = Category::findOrFail($id);

		$input = $request->all();

		if ($file = $request->file('image')) {
			
			if ($category->image != null) {

				$image_file = @file_get_contents(public_path().'/images/category/'.$category->image);

				if($image_file){
				
					unlink(public_path().'/images/category/'.$category->image);
				}

			}
			
			$normalImage = Image::make($file);
			$optimizeImage = $normalImage->fit(300,200);
      $optimizePath = public_path().'/images/category/';
      $name = time().$file->getClientOriginalName();
      $optimizeImage->save($optimizePath.$name, 70);

			$input['image'] = $name;

		}

		$category->update($input);
		$category->slug = str_slug($input['title'],'-');
    $category->save();

		return redirect('admin/category')->with('updated', 'Category Image has been updated');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Category  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);

		if ($category->image != null) {

			$image_file = @file_get_contents(public_path().'/images/category/'.$category->image);

			if($image_file){				
				unlink(public_path().'/images/category/'.$category->image);
			}

		}

		$category->delete();

		return back()->with('deleted', 'Category Image has been deleted');
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

