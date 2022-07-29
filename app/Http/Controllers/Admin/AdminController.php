<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collect;
use App\Models\Capacity;
use App\Models\Container;
use App\Models\Country;
use App\Models\Province;
use App\Models\District;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

private function countries()
{
    $provinces = Province::all()
    ->map(function ($province) {
      $province->count = 
      $province->districts->map(function ($district) {
            return $district->count =  $district->containres->map(function($cts){
                return $cts->collect_count_collected();
        })->sum();
        })->sum();
        return (Object) array('id' => $province->id,
        'name'=>$province->name,
        'count' => $province->count);
    });
    return $provinces;
    
}

public function districts(Request $request)
{
    $districts = District::with('province_id', $this->province_id)

        ->map(function ($district) { 
            $district->count =  
            $district->containres
                ->map(function($cts){
                return $cts->collect_count_collected();
            })->sum();
             return (Object) array('id' => $district->id,
             'name'=>$district->name,
             'count' => $district->count) ;
        });

        return $districts;
    
}

    public function dashbord()
    {
       $data1 = Collect::where('status_id',6)->count();
        $dataC = Capacity::where('peso',336)->first();
        $dataCon= Container::with('status')->count();
        $provinces = Province::all();
        $Qt = $dataC->peso*$data1;
        
    
        return view('admin.dashbord.index')
        ->with('data1', $data1)
        ->with('qt', $Qt)
        ->with('qc', $dataCon)
        ->with('label',$this->countries()->pluck('name'))
        ->with('data',$this->countries()->pluck('count'))
        ->with('provinces',$provinces);
    }


    public function charts()
    {
        $datas = Country::with('provinces')
        ->with(['provinces'=>function($d){
             $d->with(['districts'=>function($c){
                $c->withCount('containres');
             }]);
        }])->get();
        //$datas = Province::with('districts')->withCount('districts')->get();  
        

        return response()->json($datas, 200);
    }
}
