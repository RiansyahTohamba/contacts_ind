<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Province;
use App\Regency;
use App\District;
use App\Village;

class ContactController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $data['tes'] = 'baiklah';
        $data['provinces'] = Province::all();
        return view('contact_form',$data);
    }

	/**
	 * Get Ajax Request and restun Data
	 *
	 * @return \Illuminate\Http\Response
	*/
    public function regencyAjax($id)
    {
        return json_encode(Regency::select('name','id')->where("province_id",$id)->get());
    }

    public function districtAjax($id)
    {
        return json_encode(District::select('name','id')->where("regency_id",$id)->get());
    }

    public function villageAjax($id)
    {
        return json_encode(Village::select('name','id')->where("district_id",$id)->get());
    }

}
