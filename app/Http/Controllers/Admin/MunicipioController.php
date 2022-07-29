<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\District;
class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Municipio::with('district')->get();
        
        return view('admin.municipio.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = District::all();

        return view('admin.municipio.create')->with('datas', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            
            Municipio::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'district_id' =>$request->district_id,
            ]);
            
            return  redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
        
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
        $datas = District::all();
        $dataM = Municipio::find($id);

        try {
            if($dataM){
                return view('admin.municipio.edit')->with('datas', $datas)
                ->with('data', $dataM);
            }
            //view error
        } catch (\Throwable $th) {
            throw $th;
            abort(404);
        }
       
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
            $dataM = Municipio::find($id);

            if($dataM){
                $dataM->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'description' =>$request->description,
                    'destrict_id' => $request->destrict_id,
                ]);

                return redirect()->route('admin.municipios.index');
            }
            // throw view not found exception
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
        try {
            $data = Municipio::find($id);
            if ($data){
                $data->delete();
                return redirect()->route('admin.municipios.index');
            }
            // throw view 404 exception
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
