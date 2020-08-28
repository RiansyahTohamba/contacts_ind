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

class ProvinceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('province/list');
    }

    public function form()
    {
        return view('province/form');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $data = new Province();
       $data->name = $request->name;
       $data->save();
       return redirect()->route('index')->with('alert-success','Berhasil Menambahkan Data!');
   }
   public function edit($id)
    {
        $data['data'] = Province::where('id',$id)->get();
        return view('province/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Province::where('id',$id)->first();
       $data->name = $request->name;
        $data->save();
        return redirect()->route('province.index')->with('alert-success','Data berhasil diubah!');
    }

    public function destroy($id)
    {
        Province::where('id',$id)->first()->delete();
        return redirect()->route('province.index')->with('alert-success','Data berhasi dihapus!');
    }

}
