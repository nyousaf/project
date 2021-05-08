<?php

namespace App\Http\Controllers;

use App\Adsetting;
use Illuminate\Http\Request;

class AdsettingController extends Controller
{
    public function ad_show()
    {
      $ad_settings = Adsetting::first();
      return view('admin.adsetting', compact('ad_settings'));
    }

     public function ad_update(Request $request)
    {
       $ad_settings = Adsetting::all();
       if (count($ad_settings)<1) {
        $input = $request->all();
        $add= new Adsetting;
        $add->create($input);
         return back()->with('added','Ad Settings has been saved successfully');
       }else{

 
  $ad_settings = Adsetting::first();
       $input = $request->all();

        if (!isset($input['image_flag']))
        {
          $input['image_flag'] = 0;
        }
        if (!isset($input['catagory_flag']))
        {
          $input['catagory_flag'] = 0;
        }
        if (!isset($input['home_flag']))
        {
          $input['home_flag'] = 0;
        }
         if (!isset($input['search_flag']))
        {
          $input['search_flag'] = 0;
        }

         $ad_settings->update($input);

        return back()->with('added','Ad Settings has been saved successfully');
    }
  }
     
}