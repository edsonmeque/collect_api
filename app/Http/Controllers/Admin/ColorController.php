<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.color.index')->with('datas',Color::all());
    }

    public function create()
    {
        return view('admin.color.create');
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
            $data = Color::create([
                'name'=>$request->name,
            ]);
            return redirect()->route('admin.colors.index');
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
        try {
            $data = Color::find($id);
            if($data){
                return view('admin.color.edit')->with('data', $data);
            }
            
        } catch (\Throwable $th) {
            throw $th;
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
            $data = Color::find($id);

            if ($data){
                $data->update([
                    'name' => $request->name,
                    
                ]);
                return  redirect()->route('admin.colors.index');
            }
            return;

        } catch (\Throwable $th) {
            throw $th;
            abort(404);
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
        $data = Color::find($id);

        if($data ===null){

            abort(404);
        }
        $data->delete();

        return redirect()->route('admin.colors.index');
    }
}
