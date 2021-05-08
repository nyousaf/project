<?php

namespace App\Http\Controllers;

use App\Work;
use App\WorkPhoto;
use App\Category;
use App\Tag;
use Image;
use Excel;
use App\User;
use App\Comment;

use Auth;
use App\License;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{   
	     
		$work = Work::where('status','=',0)->orWhere('status','=',1)->orderBy('created_at','desc')->get();
		return view('admin.work.index', compact('work'));
	}

	public function authors(Request $request){
		
		$workuser=Work::groupBy('user_id')->get();
		
		$userid = []; 
   foreach($workuser as $workusers){
      $id=$workusers->user_id;
      $userid[] = $id;
   }
  
   $authors=User::find($userid);
		return view('user.author',compact('authors'));
	}

	public function trending(Request $request)
	{
		$work = Work::OrderByViewsCount()
								->where('is_active','1')
								->where('status','1')->paginate(9);
		$category = Category::all();
		
		return view('user.mostviewed',compact('work','category'));
	}

	public function mostcommented(Request $request){
		$comment= Comment::all(['work_id']);
		$category = Category::all();
$workid = []; 
   foreach($comment as $comments){
      $id=$comments->work_id;
      $workid[] = $id;
   }
   // return $workid;
   // return view('pages.checkout')->with('products ',$products);
		$work = Work::select()
								->where('is_active','1')
								->where('status','1')
								->whereIn('id',$workid)->paginate(9);
								
								// return $work;
							
		return view('user.mostcommented',compact('work','comment','category'));

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{        
		$all_category = Category::where('is_active','1')->pluck('title','id')->all();
		$tags = Tag::pluck('title','id')->all();
		$all_user = User::where('is_active','1')->pluck('name','id')->all();
		$license = License::all();
		return view('admin.work.create',compact('all_category','tags','all_user','license'));
	}

	  public function importExcel(Request $request)
    {
        $request->validate([
            'photo_file' => 'required|file'
        ]);
 
        $path = $request->file('photo_file')->getRealPath();
        // return $path;
        $data = Excel::load($path)->get();
        // return $data;
        $auth = Auth::user();

     
$uni_col = array(Work::pluck('uni_id'));

		do {
		  $random = str_random(5);
		} while (in_array($random, $uni_col));

		$uni_id = $random;
		
   // return $workid;
        if($data->count()){
            foreach ($data as $key => $value) {
            	// return $value->catgeory;
            	   $slug = str_slug($value->title,'-');
            		$catid = Category::where('title',$value->catgeory)->pluck('id')->all();
                $arr[] = ['title' => $value->title, 'desc' => $value->description,
                 'category_id'=>current($catid),'user_id'=>$auth->id,'is_featured'=>0,'status'=>0,'is_active'=>0,'slug' => $slug,'uni_id' => $uni_id];

            }
 
            if(!empty($arr)){
                Work::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
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
			'user_id' => 'required',
			'category_id' => 'required',
			'images' => 'required|image|mimes:jpg,png,gif,jpeg',
			
		]);

			$input = $request->all();

			$w_img =  Settings::first()->watermark_img;
		

		if (isset($input['is_featured']) && $input['is_featured'] == '1')
    {
      $input['is_featured'] = 1;
    }
    else{
    	$input['is_featured'] = 0;
    }
    if (isset($input['is_active']) && $input['is_active'] == '1')
    {
      $input['is_active'] = 1;
    }
    else{
    	$input['is_active'] = 0;
    }
    if (isset($request->is_psd)){   
    $request->validate([
		
			'zip' => 'required|file|mimes:zip',
			
		]);	
    	
       if($file=$request->file('zip')){ 
           $name=time().$file->getClientOriginalName();
           $file->move('images/work',$name); 
           $input['zip']=$name;
           $input['is_psd'] = 1;
        }
    }else{
    	$input['is_psd'] = 0;
    }

//   dd($input);
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
				$main=substr($tag, 4);
				$exist_tag = $tag_list->where('title',$main)->first();
				if($exist_tag != null){
					$tags[] = $exist_tag->id;
				}
				else{                   
					$tag_id = Tag::create([
												'title'=> $main,
												'slug' => str_slug($main,'-')
											]);
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

			if(isset($w_img)){
				$optimizeImage->insert(public_path('images/logo/'.$w_img), 'bottom-right', 10, 10);
			}
			
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
	  
		return back()->with('added', 'Work Image has been added');

	}



	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Work  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Work  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$work = Work::findOrFail($id); 
		$all_category = Category::where('is_active','1')->pluck('title','id')->all();
		$tags = Tag::pluck('title','id')->all();
		$ta = $work->tags()->pluck('tag_id')->all();
		$all_user = User::where('is_active','1')->pluck('name','id')->all();
		return view('admin.work.edit', compact('work','all_category','tags','ta','all_user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Work  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$request->validate([
			'user_id' => 'required',
			'category_id' => 'required',
			'images' => 'nullable|image|mimes:jpg,png,gif,jpeg',
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

		if (isset($input['is_featured']) && $input['is_featured'] == 'on')
    {
      $input['is_featured'] = 1;
    }
    else{
    	$input['is_featured'] = 0;
    }    
    if (isset($input['is_active']) && $input['is_active'] == '1')
    {
      $input['is_active'] = 1;
    }
    else{
    	$input['is_active'] = 0;
    }

		$work->update($input);
		$work->slug = str_slug($input['title'],'-');
		$work->save();

		foreach($request->tag as $tag){
			if (substr($tag, 0, 4) == 'new:'){
				$main=substr($tag, 4);
				//$tag_list = Tag::pluck('title','id')->all();
				$exist_tag = Tag::where('title',$main)->first();
				if($exist_tag != null){
					$tags[] = $exist_tag->id;
				}
				else{                   
					$tag_id = Tag::create([
												'title'=> $main,
												'slug' => str_slug($main,'-')
											]);
					$tags[] = $tag_id->id;
				}
			}
			else{				
				$tags[] = (int)$tag;
			}			
		}

		$work->tags()->detach();
		$work->tags()->syncWithoutDetaching($tags);

		if($request->status == 1)
		{
			return redirect()->route('photos.index')->with('updated', 'Work Image has been updated');
		}
		elseif($request->status == 2)
		{
			return redirect('admin/request-for-approval')->with('updated', 'Work Image has been updated');
		}
		else
		{
			return redirect()->route('photos.index')->with('updated', 'Work Image has been updated');
		}
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Work  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$work = Work::findOrFail($id);

		if($work->workphotos->first()){
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

	public function pendingPhotos()
	{
		$work = Work::where('status','=',2)->orderBy('created_at','desc')->get();
		return view('admin.work.pendingphtos', compact('work'));
	}


	// public function getTitleSlug($title, $id)
	// {
	// 	$slug = str_slug($title,'-');
	// 	$lastslug = Work::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get();
	// 	return (count($lastslug) > 0 ? $slug."-".$id : $slug);
	// }
}
