<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\FAQ;

// class FAQController extends Controller
// {
//     public function index(){
//         $faqs = FAQ::all();
//         return view('admin.faq.index',compact('faqs'));
//     }

//     public function create(){
//         return view('admin.faq.create');
//     }

//     public function edit($id){
//         $faq = FAQ::findorfail($id);
//         return view('admin.faq.edit',compact('faq'));
//     }


//     public function store(Request $request){
//         $request->validate([
//             'title' => 'required|min:5',
//             'desc' => 'required|min:10|max:5000'
//         ]);

//         $input = $request->all();

//         $faq = new FAQ;

//         $faq->create($input);

//         return redirect()->route('faq.index')->with('added','FAQ Created Successfully !');
//     }

//     public function update(Request $request,$id){

//         $request->validate([
//             'title' => 'required|min:5',
//             'desc' => 'required|min:10|max:5000'
//         ]);

//         $input = $request->all();

//         $faq = FAQ::findorFail($id);

//         $faq->update($input);

//         return redirect()->route('faq.index')->with('updated','FAQ Updated Successfully !');

//     }

//     public function destory($id){
//         $faq = FAQ::findorfail($id);
//         $faq->delete();

//         return redirect()->route('faq.index')->with('deleted','FAQ Deleted !');
//     }

//     public function bulk_delete(Request $request)
//     {   
//         if(isset($request->checked)){
//             foreach($request->checked as $id){
//                 $faq = FAQ::findorfail($id);
//                 $faq->delete();
//             }
//         }else{
//             return redirect()->route('faq.index')->with('deleted','Please select something !'); 
//         }
        

//         return redirect()->route('faq.index')->with('added','Selected FAQs Deleted Successfully !');
//     }
// }
