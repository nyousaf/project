<?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Blog;
// use Auth;
// use Image;


// class BlogController extends Controller
// {
//     public function create(){
//         return view('admin.blog.create');
//     }
//      public function index(){
//       $blog = Blog::where('state','=',0)->orWhere('state','=',1)->orderBy('created_At','details')->get();
//         return view('admin.blog.index',compact('blog'));
//     }

//     public function edit($id){
    	
//         $blog = Blog::findorfail($id);
//         return view('admin.blog.edit',compact('blog'));
//     }

//      public function blog_read($id, $title){
//          $blogs = Blog::where('id',$id)->first();
//          return view('theme.blogread',compact('blogs'));
//      }


//     public function store(Request $request)
//     {

//     	$auth = Auth::user();
		
// 		if($auth->is_active == 0){  
// 		  flash('You are not an authorised user.')->error()->important();
// 		  return back();
// 		}
// 		else{
			
//         $request->validate([
//             'title' => 'required',
//             'details' => 'required|min:10|max:5000',
//             'image' => 'required|image|mimes:jpg,png,gif,jpeg,psd',
//         ]);
        
//          $input = $request->all();


// 			if($image = $request->file('image')){
// 				$optimizeImage = Image::make($image);
// 				$data = $optimizeImage->exif();
// 			  $optimizePath = public_path().'/images/blog/';
// 			  $name = time().$image->getClientOriginalName();
// 			  $optimizeImage->save($optimizePath.$name, 70);
// 			  $input['image']=$name;
			
// 			}
// 			$input['image']=$name;

// 			$input['state'] = 1;

// 		if (isset($input['stick']) && $input['stick'] == '1')
//     {
//       $input['stick'] = 1;
//     }
//     else{
//     	$input['stick'] = 0;
//     }  
//       $blog = Blog::create($input);
//        $blog->save();
  
//         return redirect()->route('blog.index')->with('added','Post Created Successfully !');
//     }
//     }

//     public function update(Request $request,$id){

//         $request->validate([
//             'title' => 'required|min:5',
//             'details' => 'required|min:10|max:5000',
//             'image' => 'image|mimes:jpg,png,gif,jpeg,psd',
//         ]);

//         $input = $request->all();
//          $blog = Blog::findorFail($id);
         
//           if($image = $request->file('image')){  
//             if (is_null($image) ){
//                 $name=$blog->image;
//             }else{
//                  $optimizeImage = Image::make($image);
//                 $data = $optimizeImage->exif();
//               $optimizePath = public_path().'/images/blog/';
//               $name = time().$image->getClientOriginalName();
//               $optimizeImage->save($optimizePath.$name, 70);
//               $input['image']=$name;
//             }
               
//               $input['image']=$name;
//             }
          
       

//         $blog->update($input);

//         return redirect()->route('blog.index')->with('updated','Blog Updated Successfully !');
//     }

//     public function destroy($id){
    	
//         $blog = Blog::findorfail($id);
//         $blog->delete();
//       	return back()->with('deleted', 'Post has been deleted');
//     }

//     public function bulk_delete(Request $request)
//     {   
//         if(isset($request->checked)){
//             foreach($request->checked as $id){
//                 $blog = Blog::findorfail($id);
//                 $blog->delete();
//             }
//         }else{
//             return back()->with('deleted','Please select something !'); 
//         }
    
//         return back()->with('added','Selected blogs Deleted Successfully !');
//     }

// }