<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Tag;
use App\Adsetting;
use App\Category;
use DB;

class SearchController extends Controller
{
  public function homeSearch(Request $searchKey)
	{

		 $ad_settings = Adsetting::first();
		$results = collect();
		$search_title = trim($searchKey->search);
		$category = Category::where('title','LIKE',"%$search_title%")->get();
		if (isset($category) && count($category)>0) {
			foreach($category as $item){	
			  $results->push($item->works->where('is_active','1')->where('status','1'));
			}
		}
		$tag = Tag::where('title','LIKE',"%$search_title%")->get();
		if(isset($tag) && count($tag)>0){	
			foreach($tag as $tags){
				$results->push($tags->works->where('is_active','1')->where('status','1'));

			}
			
		}
		$work = Work::where('title','LIKE',"%$search_title%")->where('is_active','1')->where('status','1')->get();
		if(isset($work) && count($work)>0){	
			
			$results->push($work);
			
		}
	$results = $results->flatten();
	$results=$results->unique('id') ;
	return view('theme.search',compact('results','search_title','ad_settings'));
	}

	public function tag_search($tag)
	{
		 $ad_settings = Adsetting::first();
		$search_title = str_replace('-',' ',$tag);
		$data = Tag::where('slug',"$tag")->first();
		$results = collect();
		if (isset($data)) {	
			$results = $data->works->where('is_active','1')->where('status','1');
		}
		else {
			$category = Category::where('title','LIKE',"%$search_title%")->get();
			if (isset($category) && count($category)>0){
				foreach($category as $item){	
				  $results->push($item->works->where('is_active','1')->where('status','1'));
				}
			}
		}
		$results = $results->flatten();
		return view('theme.search',compact('results','search_title','ad_settings'));
	}
}