<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use app\Http\Controllers\Controller ;
//use DB ;
//use app\RegionModel;
use \App\Branche;
use \App\Region;
use \App\s_model;
use \App\Sector;
class BranchesController extends Controller
{
    public function index (){
		
		$s_model=s_model::all();
		$Branches=Branche::all();
		$Regions=Region::all();
		$sector=Sector::find('1');
		return view ('Branche' ,compact ('Regions'));
		
	}
	
	public function ajax_load_model_by_region_id ($id) {
		
		
		return s_model::Where('Region_id',$id)->get();
	}
	
	
	public function ajax_load_sectors_by_model_id ($id) {
		
		
		return Sector::Where('model_id',$id)->get();
	}
	
	public function ajax_load_branches_by_sector_id ($id) {
		
		
		return Branche::Where('sector_id',$id)->get();
	}
	
}

