<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\License;
// use Illuminate\Support\Str;

// class LicenseController extends Controller
// {
//     public function index(){
//         $lics = License::all();
//         return view('admin.lics.index',compact('lics'));
//     }

//     public function create(){
//         return view('admin.lics.create');
//     }

//     public function edit($id){
//         $lic = License::findorfail($id);
//         return view('admin.lics.edit',compact('lic'));
//     }


//     public function store(Request $request){
//         $request->validate([
//             'title' => 'required|min:5',
//             'desc' => 'required|min:10|max:5000'
//         ]);

//         $input = $request->all();

//         $lic = new License;

//         $input['slug'] = Str::slug($request->title);

//         $lic->create($input);

//         return redirect()->route('lic.index')->with('added','License Created Successfully !');
//     }

//     public function update(Request $request,$id){

//         $request->validate([
//             'title' => 'required|min:5',
//             'desc' => 'required|min:10|max:5000'
//         ]);

//         $input = $request->all();

//         $lic = License::findorFail($id);

//         $input['slug'] = Str::slug($request->title);
        
//         $lic->update($input);

//         return redirect()->route('lic.index')->with('updated','License Updated Successfully !');

//     }

//     public function destory($id){
//         $lic = License::findorfail($id);
//         $lic->delete();

//         return redirect()->route('lic.index')->with('deleted','License Deleted !');
//     }

//     public function bulk_delete(Request $request)
//     {   
//         if(isset($request->checked)){
//             foreach($request->checked as $id){
//                 $lic = License::findorfail($id);
//                 $lic->delete();
//             }
//         }else{
//             return redirect()->route('lic.index')->with('deleted','Please select something !'); 
//         }
        

//         return redirect()->route('lic.index')->with('added','Selected License Deleted Successfully !');
//     }

//     public function show($slug){
//         $lic = License::where('slug','=',$slug)->first();
//         return view('admin.lics.show',compact('lic'));
//     }
// }
