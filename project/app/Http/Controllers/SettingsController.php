<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function general_show()
  	{
  		$general_settings = Settings::first();
  		return view('admin.general', compact('general_settings'));
  	}
 

    /**
     * Update General Settings.
     *
     */
    public function general_update(Request $request, $id)
    {
    	  $general_settings = Settings::findOrFail($id);

        $request->validate([
          'logo' => 'nullable|image|mimes:jpg,jpeg,png',
          'watermark_img' => 'nullable|image|mimes:jpg,jpeg,png',
          'w_email' => 'email'
        ]);

        $input = $request->all();

        if ($file = $request->file('logo')) {
          $name = 'logo_' . time() . $file->getClientOriginalName();
          if($general_settings->logo != '' && $general_settings->logo != null) {
            unlink(public_path() . '/images/logo/' . $general_settings->logo);
          }
          $file->move('images/logo', $name);
          $input['logo'] = $name;
        }

        if ($file = $request->file('watermark_img')) {
          $name = 'watermark_img_' . time() . $file->getClientOriginalName();
          if($general_settings->watermark_img != '' && $general_settings->watermark_img != null) {
            unlink(public_path() . '/images/logo/' . $general_settings->watermark_img);
          }
          $file->move('images/logo', $name);
          $input['watermark_img'] = $name;
        }

        if ($file2 = $request->file('favicon')) {
            $name = 'favicon.ico';
            if ($general_settings->favicon != '' && $general_settings->favicon != null) {
                unlink(public_path() . '/images/favicon/favicon.ico');
            }
            $file2->move('images/favicon', $name);
            $input['favicon'] = $name;
        }

        if ($file = $request->file('footer_logo')) {
          $name = $file->getClientOriginalName();
          if($general_settings->footer_logo != null) {
            $image_file = @file_get_contents(public_path().'/images/'.$general_settings->footer_logo);
            if($image_file){
              unlink(public_path() . '/images/' . $general_settings->footer_logo);
            }
          }
          $file->move('images', $name);
          $input['footer_logo'] = $name;
        }

         if ($file = $request->file('preloader')) {
          $name = $file->getClientOriginalName();
          if($general_settings->preloader != null) {
            $image_file = @file_get_contents(public_path().'/images/'.$general_settings->preloader);
            if($image_file){
              unlink(public_path() . '/images/' . $general_settings->preloader);
            }
          }
          $file->move('images', $name);
          $input['preloader'] = $name;
        }
        
        if (!isset($input['is_gotop']))
        {
          $input['is_gotop'] = 0;
        }
        if (!isset($input['is_blog']))
        {
          $input['is_blog'] = 0;
        }
        if (!isset($input['is_preloader']))
        {
          $input['is_preloader'] = 0;
        }
        if (!isset($input['right_click']))
        {
          $input['right_click'] = 0;
        }
        if (!isset($input['inspect']))
        {
          $input['inspect'] = 0;
        }
        if (!isset($input['footer_layout']))
        {
          $input['footer_layout'] = 0;
        } 
 
        $general_settings->update($input);

        return back()->with('added','Settings has been saved successfully');
    }
}
