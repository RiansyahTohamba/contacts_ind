<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Province;
use App\Regency;
use App\District;
use App\Village;
use App\Contact;

class ContactController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $data['contacts'] = Contact::all();
        return view('contact/list',$data);
    }

    public function form()
    {
        $data['provinces'] = Province::all();
        return view('contact/form',$data);
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $data = new Contact();
       $data->name = $request->name;
       $data->email = $request->email;
       $data->handphone = $request->handphone;
       $data->detail_address = $request->detail_address;
       $data->province_id = $request->province_id;
       $data->regency_id = $request->regency_id;
       $data->district_id = $request->district_id;
       $data->village_id = $request->village_id;
       $data->save();
       return redirect()->route('index')->with('alert-success','Berhasil Menambahkan Data!');
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
