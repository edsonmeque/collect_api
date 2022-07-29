<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Container;
use App\Models\TypeContainer;
use App\Models\District;
use App\Models\Capacity;
use App\Models\Color;
use App\Models\Status;
use App\Models\Localization;
class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas =  Container::with('user','district','statuss')->get();
        return view('admin.container.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $data_district = District::with('province')->get();
        $types = TypeContainer::all();
        $capacities = Capacity::all();
        $colors= Color::all();
        $status = Status::all();
        $localizations = Localization::all();
        return view('admin.container.create')
        ->with('data_district',$data_district)
        ->with('types_containers',$types)
        ->with('capacities',$capacities)
        ->with('colors',$colors)
        ->with('status',$status)
        ->with('localizations',$localizations);
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
            
            
            switch ($request->status_id) {

                
                case 1:
                    Container::create([
                        'serial'=>$request->serial,
                        'number'=>$request->number,
                        'capacity'=>$request->capacity,
                        'tags'=>$request->tags,
                        'district_id'=>$request->district_id,
                        'status_id'=>5,
                        'type_container_id'=>$request->type_container_id,
                        'capacity_id' =>$request->capacity_id,
                        'color_id' =>$request->color_id,
                        'user_id'=>Auth::user()->id,
                        'localization_id'=>$request->localization_id  
                    ]);
                    break;
                case 3:

                    Container::create([
                        'serial'=>$request->serial,
                        'number'=>$request->number,
                        'capacity'=>$request->capacity,
                        'tags'=>$request->tags,
                        'district_id'=>$request->district_id,
                        'status_id'=>4,
                        'type_container_id'=>$request->type_container_id,
                        'capacity_id' =>$request->capacity_id,
                        'color_id' =>$request->color_id,
                        'user_id'=>Auth::user()->id,
                        'localization_id'=>$request->localization_id  
                    ]);
                    break;
                default:
                    throw new Exception('Invalid request type');
                    break;
            }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
