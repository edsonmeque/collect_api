<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use App\Models\Country;
class ProvinceController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Province::with('country')->get();
        return view('admin.province.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $datas = Country::all();
        return view('admin.province.create')->with('datas', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {  

            Province::create([
                'name' => $request->name,
                'country_id' => $request->country_id,
            ]);

             return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Province::find($id);
        $datas =Country::all();
        return view('admin.province.edit')->with('data', $data)->with('datas', $datas);
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
        try {
            $data = Province::find($id);
            
            if($data){
                $data->name = $request->name;
                $data->country_id = $request->country_id;
                $data->update();
                return redirect()->route('admin.provinces.index');
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Province::find($id);
        try {
            if ($data){
                $data->delete();
                return redirect()->route('admin.provinces.index');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
