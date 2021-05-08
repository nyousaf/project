<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Work;
use App\WorkPhoto;
use App\Category;
use Auth;
use App\Tag;
use Image;

class UploadController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
		$category = Category::where('is_active','1')->pluck('title','id')->all();
		$tags = Tag::pluck('title','id')->all();
		return view('user.upload',compact('category','tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$auth = Auth::user();
		
		if($auth->is_active == 0){  
		  flash('You are not an authorised user.')->error()->important();
		  return back();
		}
		else{
			$request->validate([
				'user_id' => 'required',
				'category_id' => 'required',
				'images' => 'required|image|mimes:jpg,png,gif,jpeg|max:10240'
			]);

			$input = $request->all();

			$work = Work::create($input);

			$work->slug = str_slug($input['title'],'-');

			$uni_col = array(Work::pluck('uni_id'));

			do {
			  $random = str_random(5);
			} while (in_array($random, $uni_col));

			$work->uni_id = $random;

			$tag_list = Tag::all();

			foreach($request->tag as $tag){
				if (substr($tag, 0, 4) == 'new:'){
					$exist_tag = $tag_list->where('title',substr($tag, 4))->first();
					if($exist_tag != null){
						$tags[] = $exist_tag->id;
					}
					else{                   
						$tag_id = Tag::create(['title'=> substr($tag, 4)]);
						$tags[] = $tag_id->id;
					}
				}
				else{				
					$tags[] = (int)$tag;
				}			
			}

			$work->tags()->syncWithoutDetaching($tags);

			if($image = $request->file('images')){
				$optimizeImage = Image::make($image);
				$data = $optimizeImage->exif();
			  $optimizePath = public_path().'/images/work/';
			  $name = time().$image->getClientOriginalName();
			  $optimizeImage->save($optimizePath.$name, 70);
			  
				WorkPhoto::create([
				  'work_id' => $work->id,
				  'images' => $name
				]);	

				if($data){
					$work->update([
						'width' => isset($data['COMPUTED']['Width']) ?  $data['COMPUTED']['Width'] : null,
						'height' => isset($data['COMPUTED']['Height']) ? $data['COMPUTED']['Height'] : null,
						'type' => isset($data['MimeType']) ? substr($data['MimeType'], strpos($data['MimeType'], "/") + 1) : null,
						'model' => isset($data['Model']) ? $data['Model'] : null,
						'aperture' => isset($data['COMPUTED']['ApertureFNumber']) ? $data['COMPUTED']['ApertureFNumber'] : null,
						'iso' => isset($data['ISOSpeedRatings']) ? $data['ISOSpeedRatings'] : null,
						'focal_len' => isset($data['FocalLength']) ? $this->convertToDecimal($data['FocalLength']) : null,
						'shutter_speed' => isset($data['ShutterSpeedValue']) ? $this->convertToDecimal($data['ShutterSpeedValue']) : null,
						'taken_date' => isset($data['DateTime']) ? strtok($data['DateTime'],' ') : null,
					]);
				}
			}

			$work->save();

			flash('Your entry has been submitted successfully')->success()->important();

			return back();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$work = Work::findOrFail($id); 
		$all_category = Category::where('is_active','1')->pluck('title','id')->all();
		$tags = Tag::pluck('title','id')->all();
		$ta = $work->tags()->pluck('tag_id')->all();
		return view('user.upload-edit', compact('work','all_category','tags','ta'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$auth = Auth::user();
		if($auth->is_active == 0){  
		  flash('You are not an authorised user.')->error()->important();
		  return back();
		}
		else{
			$request->validate([
				'user_id' => 'required',
				'category_id' => 'required',
				'images' => 'nullable|image|mimes:jpg,png,gif,jpeg|max:20000'
			]);

			$work = Work::findOrFail($id); 

			$input = $request->all();

			if($image = $request->file('images')){
				$workimg = $work->workphotos->first();
				if(isset($workimg)){
					$image_file = @file_get_contents(public_path().'/images/work/'.$workimg->images);
					if($image_file){
						unlink(public_path().'/images/work/'.$workimg->images);
					}
					$workimg->delete();
				}

				$optimizeImage = Image::make($image);
				$data = $optimizeImage->exif();
			  $optimizePath = public_path().'/images/work/';
			  $name = time().$image->getClientOriginalName();
			  $optimizeImage->save($optimizePath.$name, 70);

				WorkPhoto::create([
				  'work_id' => $work->id,
				  'images' => $name
				]);

				if($data){
					$work->update([
						'width' => isset($data['COMPUTED']['Width']) ?  $data['COMPUTED']['Width'] : null,
						'height' => isset($data['COMPUTED']['Height']) ? $data['COMPUTED']['Height'] : null,
						'type' => isset($data['MimeType']) ? substr($data['MimeType'], strpos($data['MimeType'], "/") + 1) : null,
						'model' => isset($data['Model']) ? $data['Model'] : null,
						'aperture' => isset($data['COMPUTED']['ApertureFNumber']) ? $data['COMPUTED']['ApertureFNumber'] : null,
						'iso' => isset($data['ISOSpeedRatings']) ? $data['ISOSpeedRatings'] : null,
						'focal_len' => isset($data['FocalLength']) ? $this->convertToDecimal($data['FocalLength']) : null,
						'shutter_speed' => isset($data['ShutterSpeedValue']) ? $this->convertToDecimal($data['ShutterSpeedValue']) : null,
						'taken_date' => isset($data['DateTime']) ? strtok($data['DateTime'],' ') : null,
					]);
				}
			}

			$work->update($input);

			$work->slug = str_slug($input['title'],'-');

			$tag_list = Tag::all();

			foreach($request->tag as $tag){
				if (substr($tag, 0, 4) == 'new:'){
					$exist_tag = $tag_list->where('title',substr($tag, 4))->first();
					if($exist_tag != null){
						$tags[] = $exist_tag->id;
					}
					else{                   
						$tag_id = Tag::create(['title'=> substr($tag, 4)]);
						$tags[] = $tag_id->id;
					}
				}
				else{				
					$tags[] = (int)$tag;
				}			
			}

			$work->tags()->detach();
			$work->tags()->syncWithoutDetaching($tags);
			$work->save();
			flash('Photo Details has been updated')->success()->important();

			return redirect('user/my-photo')->with('updated', 'Photo Details has been updated');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	  $work = Work::findOrFail($id);

	  if(isset($work->workphotos)){
	  	$workimg = $work->workphotos->first();
		  $image_file = @file_get_contents(public_path().'/images/work/'.$workimg->images);
	  	if($image_file){
				unlink(public_path().'/images/work/'.$workimg->images);
	  	}
		  $workimg->delete();
	  }

	  $work->delete();

	  return back()->with('deleted', 'Work Image has been deleted');
	}

	public function convertToDecimal ($fraction)
  {
    $numbers=explode("/",$fraction);
    return round($numbers[0]/$numbers[1],2);
  }
}
