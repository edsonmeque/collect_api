<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Capacity;
class CapacityController extends Controller
{
    public function index()
    {
        return view('admin.capacity.index')->with('datas',Capacity::all());
    }

    public function create()
    {
       
        return view('admin.capacity.create');
    }

    public function store(Request $request)
    {

        $capacidadeVulumetrica =  ($request->capacity_max)/100*$request->capacity_storege;
        $capacidadeEmPeso =($capacidadeVulumetrica*$request->peso);
        $aux =$capacidadeEmPeso/$request->dias;
        $populacaoAtendidaPorContentor =$aux/$request->generated_capitetion;

        try {
             Capacity::create([
                'peoples_number' => $populacaoAtendidaPorContentor,
                'capacity_storege' => $capacidadeVulumetrica,
                'generated_capitetion' =>$request->generated_capitetion, 
                'peso' => $capacidadeEmPeso,
                'capacity_max'=>$request->capacity_max,
                'capacityToday'=>$aux,
                'dias' => $request->dias,
             ]);
        
             return redirect()->route('admin.capacities.index');
        
            } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function edit($id)
    {
        $data = Capacity::find($id);
        return view('admin.capacity.edit')->with('data', $data);
    }


    public function update(Request $request, $id)
    {
        $data = Capacity::find($id);

        try {
            if ($data){
                $data->update([
                    'peoples_number' => $populacaoAtendidaPorContentor,
                    'capacity_storege' => $capacidadeVulumetrica,
                    'generated_capitetion' =>$request->generated_capitetion, 
                    'peso' => $capacidadeEmPeso,
                    'capacity_max'=>$request->capacity_max,
                    'capacityToday'=>$aux,
                    'dias' => $request->dias,
                ]);
                return  redirect()->route('admin.capacities.index');
            }
            abort(404);
        } catch (\Throwable $th) {
            throw $th;
        }
        
       
    }

public function show($id)
{
    # code...
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Capacity::find($id);

        if($data ==null){

            abort(404);
        }
        $data->delete();

        return redirect()->route('admin.capacities.index');
    }
}
