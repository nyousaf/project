<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Video;
use App\Category;
use App\Work;
use App\Tag;
use App\UserSocial;
use App\Testimonial;
use Mail;
use Auth;
use App\Adsetting;

use App\User;
use App\Pages;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
  public function index(Request $request)
	{
		$user = Auth::user();
		
		 $ad_settings = Adsetting::first();
	$work = Work::where('is_featured','1')
								->where('is_active','1')
								->where('status','1')->paginate(9);
		$category = Category::all();
		if(isset($user) && !$user->socials){
      USerSocial::create([
        'user_id' => $user->id,

        'paypal_id' => ' '
      ]);
    }
   

		if($request->ajax()){
			return view('theme.load-more', compact('work','category'));
		}
		return view('theme.home',compact('work','category','ad_settings'));
        
    
        
		
	}
	public function all(Request $request)
	{
		 $ad_settings = Adsetting::first();
		$work = Work::where('is_active','1')
								->where('status','1')->paginate(9);
		$category = Category::all();
		if($request->ajax()){
			return view('theme.load-more', compact('work','category'));
		}
		return view('theme.home',compact('work','category','ad_settings'));
	}
	public function trending(Request $request)
	{
		 $ad_settings = Adsetting::first();
		$work = Work::OrderByViewsCount()
								->where('is_active','1')
								->where('status','1')->paginate(9);
		$category = Category::all();
		if($request->ajax()){
			return view('theme.load-more', compact('work','category'));
		}
		return view('theme.home',compact('work','category','ad_settings'));
	}
	// public function about_show()
	// {		
	// 	$testimonial = Testimonial::all();
	// 	return view('theme.about',compact('testimonial'));
	// }
	public function work_show()
	{
		$work = Work::where('is_active','1')->where('status','1')->paginate(24);
		return view('theme.work-dtl',compact('work'));
	}
	public function work_dtl_show($uniId, $slug)
	{
		$paypalid='';
		$work = Work::where('uni_id',$uniId)->first();
		$workid = Work::select('user_id')->where('uni_id',$uniId)->groupBy('user_id')->get();
		foreach ($workid as $works => $val) {
			$id= $val->user_id;
			// return $val->user_id;
			$socials=UserSocial::select('paypal_id')->where('user_id',$id)->get();
            foreach ($socials as $social => $value) {
            $paypalid= $value->paypal_id;
             }
		}
	       $ad_settings = Adsetting::first();
          
		$category = Category::all();
		$tags = Tag::all();
		$work->addView();
		$cat_img = $work->categories->works->where('is_active','1')->where('status','1')->where('id','!=',$work->id)->take(30);
		return view('theme.work-dtl',compact('work','category','tags','cat_img','paypalid','ad_settings'));
	}
	public function category_show($keyword)
	{
		$category = Category::where('slug',$keyword)->first();
		$url = '/'.$category->slug;
	
		return view('theme.category',compact('category','url'));
	}
	public function video_show()
	{
		$video = Video::paginate(18);
		return view('theme.video',compact('video'));
	}
	public function contact_show()
	{
		return view('theme.contact');
	}
	public function contact_post(Request $request) 
  {
    $request->validate([
      'email' => 'required',
      'message' => 'required',
      'phone' => 'nullable|numeric',
      'name' => 'nullable'
    ]);

    $input = $request->all(); 

    Mail::send('email.contact', ['input' => $input], function($message) {
        $message->to(Input::get('w_email'))->from(Input::get('email'))->subject('Contact us');
    });

    flash('Mail has been sent.')->success()->important();
    return back()->with('updated', 'Mail has been sent');
  }
	public function download_counter(Request $request)
  {
		$work = Work::findorfail($request->id);
		$work->download++;
		$work->save();
    return $work->download;
  }

  public function profile_show($uniId,$key)
	{
$user = User::where('uni_id',$uniId)->first();
    $socials=UserSocial::select('paypal_id')->where('user_id',$user->id)->get();
    foreach ($socials as $social => $value) {
     $paypalid= $value->paypal_id;
    }
		
		if($user){

	
			$photo = $user->works->where('is_active','1')
										->where('status','1')->sortByDesc('created_at');

			return view('theme.profile', compact('user','photo','paypalid'));
		}
	}
  public function page_show($page)
  {
  	$pages = Pages::where('slug',$page)->first();
  	if(!$pages){
  		return view('errors.404');
  	}
    return view('theme.pages', compact('pages'));
  }
}
