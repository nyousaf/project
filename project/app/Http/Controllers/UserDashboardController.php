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
use DB;
use App\User;
use App\Comment;
use App\UserSocial;


class UserDashboardController extends Controller
{
  
	public function confirm($confirmation_code)
	{
    if( ! $confirmation_code)
    {
        throw new InvalidConfirmationCodeException;
    }
    
    $user = User::whereConfirmationCode($confirmation_code)->first();
    if ( ! $user)
    {
        // throw new InvalidConfirmationCodeException;
            flash('Your email is already verified.')->warning();
            return redirect('/');
    }
    $user->confirmed = 1;
    $user->confirmation_code = null;
    $user->save();

    flash('Welcome back! your email has been verified successfully')->success()->important();

    return redirect('/')->with('success', 'Welcome back! your email has been verified successfully');
	}





  public function txt()
  {
    $user=user::all();
    return view('admin.work.user_view',compact('user'));
  }
   public function suspended()
  {
    $user=user::all();
    return view('admin.work.suspended',compact('user'));
  }

  public function sto(Request $request)
  {

      $user = new User;

      $user->name = $request->name;
      $user->address = $request->address;
      $user->email = $request->email;
      $user->mobile = $request->mobile;
      $user->dob = $request->dob;
      $user->gender = $request->gender;
      $user->password = Hash::make($request->password);
      $user->city = $request->city;
      $user->state = $request->state;
      $user->country = $request->country;

      if ($file = $request->file('image')) 
         {

          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/user/';
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);
          $user->image = $image;          
          
        }

      $user->save();

      return redirect()->route('txt.user');



  }

  public function del($id)
  {
    $user = User::find($id);

      $work = Work::where('user_id',$id);
      $work->delete();
        if ($user->image != null)
        {
                
            $image_file = @file_get_contents(public_path().'/images/user/'.$user->image);

                if($image_file)
                {
                    
                    unlink(public_path().'/images/user/'.$user->image);
                }
        }
        $value = $user->delete();
         if($value){
            
            return redirect()->route('txt.user');
         }
  }



  public function cre()
  {
    return view('admin.work.user_store');
  }

   public function ed($id)
  {
    $user = User::findorfail($id);
    $socials=UserSocial::select('paypal_id')->where('user_id',$id)->get();
   
    if (!isset($socials)) {
      foreach ($socials as $social => $value) {
     $paypalid= $value->paypal_id;
      return view('admin.work.user_edit',compact('user','paypalid'));
    }
   
    }
     $paypalid='';
     return view('admin.work.user_edit',compact('user','paypalid'));
  }


  public function change(Request $request,$id)
  {
     $paypalid = $request->input('paypal_id');
      DB::update('update user_socials set paypal_id = ? where user_id = ?',[$paypalid,$id]);
    $user = User::findOrFail($id);
    $user->name = $request->name;
      $user->address = $request->address;
      $user->email = $request->email;
      $user->mobile = $request->mobile;
      $user->dob = $request->dob;
      $user->gender = $request->gender;
     // $user->password = Hash::make($request->password);
      $user->city = $request->city;
      $user->state = $request->state;
      $user->country = $request->country;
       $input = $request->all();
      if (isset($input['suspended']) && $input['suspended'] == '1')
    {
      $input['suspended'] = 1;
    }
    else{
      $input['suspended'] = 0;
    }  
     $user->suspended =  $input['suspended'];

      if ($file = $request->file('image')) 
         {

          $optimizeImage = Image::make($file);
          $optimizePath = public_path().'/images/user/';
          $image = time().$file->getClientOriginalName();
          $optimizeImage->save($optimizePath.$image, 72);
          unlink(public_path().'/images/user/'.$user->image);
          $user->image = $image;          
          
        }
        $user->save();
return redirect()->route('txt.user');

    
  }







	public function profile_edit()
	{
		$auth = Auth::user();
		return view('user.profile-edit', compact('auth'));
	}

	public function profile_update(Request $request)
	{
		$user = Auth::user();

		$request->validate([
		  'name' => 'required',
		  'mobile' => 'numeric',
		  'city' => 'required',
		  'country' => 'required',
		  'dob' => 'required',
		  'image' => 'nullable|image|mimes:jpeg,png,jpg',
		]);

		$input = $request->all();

		if ($file = $request->file('image')) {	  
		  $name = time().$file->getClientOriginalName();
		  if ($user->image != null && $user->image != 'user.jpg') {		
				$image_file = @file_get_contents(public_path().'/images/user/'.$user->image);
				if($image_file){				  
				  unlink(public_path().'/images/user/'.$user->image);
				}
		  }

		  $file->move('images/user', $name);
		  $input['image'] = $name;
		}

		$user->update($input);

    if($user->socials){
      $user->socials->update($input);
    }
    else{
      USerSocial::create([
        'user_id' => $user->id,
        'fb_url' => $input['fb_url'],
        'twi_url' => $input['twi_url'],
        'link_url' => $input['link_url'],
        'insta_url' => $input['insta_url'],
        'pin_url' => $input['pin_url'],
        'g_url' => $input['g_url'],
        'paypal_id' => $input['paypal_id']
      ]);
    }

    flash('Profile has been updated')->success()->important();
		return back()->with('success', 'You profile has been updated successfully');;
	}

	public function change_password(Request $request)
  {
    $auth = Auth::user();

  	$request->validate([
     'old_password' => 'required',
     'password' => 'required|confirmed|min:6'
    ]);    	

  	if (Hash::check($request->old_password, $auth->password))
  	{
      $auth->update([
         'password' => bcrypt($request->password)
      ]);

			flash('Password has been updated')->success()->important();
      return back()->with('updated', 'Password has been updated');

    } else {

			flash('Your password doesnt match')->error()->important();
      return back()->with("deleted", "Your password doesn't match");

    }

		flash('Your password doesnt match')->error()->important();
    return back()->with("deleted", "Your password doesn't match");

  }
	
	public function my_work_show()
	{
		$auth = Auth::user();
   
		$photo = Work::where('user_id',$auth->id)
									->where('is_active','1')
									->orderBy('created_at','desc')->paginate(20);
		return view('user.my-photo', compact('photo'));
	}

	public function my_collection()
	{
		$auth = Auth::user();
		$photo = $auth->user_favorites;
		return view('user.my-fav', compact('photo'));
	}

	public function account_show()
	{
		$auth = Auth::user();
		return view('user.account', compact('auth'));
	}

  public function follow_show()
  {
    $auth = Auth::user();
    return view('user.followers', compact('auth'));
  }

  public function following_show()
  {
    $auth = Auth::user();
    return view('user.followings', compact('auth'));
  }

  public function phvote(Request $request)
  {
    $auth = Auth::user();
    if(!$auth){      
      return redirect('login');
    }
    elseif($auth->is_active == 0){  
      flash('You are not an authorised user.')->error()->important();
      return back();
    }
    else{
      $id = $request['photoId'];
      $status = $request['status'];
      $photo = Work::findorfail($id);
      if($status == 'not'){
        $photo->likes()->syncWithoutDetaching($auth->id);
      }
      else{         
        $photo->likes()->detach($auth->id);
      }
      return $current_count = $photo->likes()->count();
    }
  } 

  public function favorite(Request $request)
  {
    $auth = Auth::user();
    if(!$auth){      
      return redirect('login');
    }
    elseif($auth->is_active == 0){  
      flash('You are not an authorised user.')->error()->important();
      return back();
    }
    else{
      $id = $request['photoId'];
      $status = $request['status'];
      $photo = Work::findorfail($id);
      if($status == 'not'){
        $photo->favorites()->syncWithoutDetaching($auth->id);
      }
      else{         
        $photo->favorites()->detach($auth->id);
      }
      return $current_count = $photo->favorites()->count();
    }
  }

  public function filter_collection(Request $request)
  {
    $auth = Auth::user();
    if(!$auth){      
      return redirect('login');
    }
    elseif($auth->is_active == 0){  
      flash('You are not an authorised user.')->error()->important();
      return back();
    }
    else{
      $id = $request['id'];
      $photo = Work::findorfail($id);
      $photo->favorites()->detach($auth->id);
      return '1';
    }
  }

	public function follow_user(Request $request)
	{
		$id = $request['userId'];
  	$status = $request['status'];
		$user = User::findorfail($id);
		if($status == 'Follow'){
			$user->followers()->syncWithoutDetaching(auth()->user()->id);
		}
		else{				 
			$user->followers()->detach(auth()->user()->id);
		}
		return back();
	} 

	public function comment(Request $request){
    $input = $request->all();
    $input['status'] = "0";
  	$auth = Auth::user();
		$auth->user_comments()->create($input);
		return back()->with('added','Commented Successfully ! Once its approved it will show');
	}
}
