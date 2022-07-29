<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DistrictRequest;
use App\Models\District;
use App\Models\Province;
class DistrictController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = District::with('province')->get();

        return view('admin.district.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $datas = Province::with('country')->get();   
        return view('admin.district.create')->with('datas', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        District::create([
            'name'=>$request->name,
            'province_id' =>$request->province_id,
        ]);

        return redirect()->route('admin.districts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = District::find($id); 

        if ($data){
           
            $datas = Province::all();

            return view('admin.district.edit')->with('data', $data)->with('datas', $datas);
        }

        abort(404);
        
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
        $data = District::find($id);

        try {
            if($data){
                $data->name = $request->name;
                $data->province_id = $request->province_id;
                $data->update();
                return redirect()->route('admin.districts.index');
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
       $data = District::find($id);

       try {
        if ($data){
            $data->delete();
            return redirect()->route('admin.districts.index');
        }
         
        abort(404);
       } catch (\Throwable $th) {
        throw $th;
       }
    }
}
