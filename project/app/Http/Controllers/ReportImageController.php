<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportImage;
use Auth;

class ReportImageController extends Controller
{
    public function index(){
        
        $reportfinds = ReportImage::all();
        return view('admin.reportimage.index',compact('reportfinds'));

    }

    public function bulk_delete(Request $request)
    {   
        if(isset($request->checked)){
            foreach($request->checked as $id){
                $ri = ReportImage::findorfail($id);
                $ri->delete();
            }
        }else{
            return back()->with('deleted','Please select something !'); 
        }
        

        return back()->with('added','Selected Report Deleted Successfully !');
    }
    
    public function store(Request $request,$id){

       $reportfinds = ReportImage::where('photo_id','=',$id)->where('user_id','=',Auth::user()->id)->first();

       if(isset($reportfinds)){
        return back()->with('delete','You already reported this image !');
       }
       else
       {
            $rp = new ReportImage;

            $input = $request->all();

            $input['user_id'] = Auth::user()->id;

            $input['photo_id'] = $id;

            $input['status'] = "pending";

            $rp->create($input);

            return back()->with('added','Reported Successfully ! Its under review!');

       }


        
    }

    public function status(Request $request,$id){
        $status = $request->status;
        $ri = ReportImage::where('id','=',$id)->update(['status' => $status]);

        return "$status";
    }
}
