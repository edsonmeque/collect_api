<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Container;
Use App\Models\Collect;
use App\Models\Province;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ContainerResource;
use File;
use Validation;
use App\Models\user;

use App\Models\Capacity;

use App\Models\Country;

class CollectContainerController extends Controller
{

public function realiseCollect(Request $request)
     {
        $data = Container::where('id', '=', $request->id)
        ->where('status_id', '=', 2)->first();
        $distination = public_path().'/uploads/imagem/'.$data->image;  
                
                if(File::exists($distination)){
                    
                   File::delete($distination); 
               
                       switch ($data->status_id) {
                        case 2:
                             $data->update([
                                'image'=>null,
                                'status_id'=>5
                            ]);
    
                            Collect::create([
                                'container_id'=>$data->id,
                                'user_id'=>$request->user()->id,
                                'status_id'=>6
                            ]);
                            break;
                        
                        default:
                            abort(404);
                            break;
                       }
                        
                      
                }
                
          return response()->json($data, 200);  
      }



public function changeContainer(Request $request)
{
    $data = Container::where('id', $request->id)
    ->where('status_id',5)->first();
   
    switch ($data->status_id) {
        case 5:

            $data->update([
                'image'=>null,
                'status_id'=>4
            ]);
        
            Collect::create([
                'container_id'=>$data->id,
                'user_id'=>$request->user()->id,
                'status_id'=>4
            ]);
            break;
        
        default:
            # code...
            break;
    }

    return response()->json($data, 200);

}

public function change(Request $request)
{
   
    try {
        if(($request->located>0)&&($request->dislocated>0)){
      
            $dataCollect = Container::where('id', '=', $request->located)
            ->where('status_id', '=', 2)->where('district_id', '=', $request->district_id)
            ->first();
            $dataDescolcated = Container::where('id', $request->dislocated)
            ->where('status_id',5)
            ->where('district_id',$request->district_id)
            ->first();
            
            if($dataCollect->district_id == $dataDescolcated->district_id){

                $distination = public_path().'/uploads/imagem/'.$dataCollect->image;  
                    
                if(File::exists($distination)){
                    
                   File::delete($distination); 
               
                       switch ($dataCollect->status_id) {
                        case 2:
                             $dataCollect->update([
                                'image'=>null,
                                'status_id'=>5
                            ]);
    
                            Collect::create([
                                'container_id'=>$dataCollect->id,
                                'user_id'=>$request->user()->id,
                                'status_id'=>6
                            ]); 
                                
                            switch ($dataDescolcated->status_id) {
                                case 5:
                                    $dataDescolcated->update([
                                        'image'=>null,
                                        'status_id'=>4
                                    ]);
                                    Collect::create([
                                        'container_id'=>$dataDescolcated->id,
                                        'user_id'=>$request->user()->id,
                                        'status_id'=>4
                                    ]);
                                    break;
                                
                                default:
                                    dd("opcao no precoesso de alocacao");
                                    break;
                            }
                            break;
                        
                        default:
                        dd("opcao no precoesso de desalocacao");
                        
                        break;   
                        }
                         
                }else{
                    dd("impossivel realizar a coletas estao em distritos diferentes");
                }
            }
           
                    
         return response()->json(['massage'=>'troca realisada com sucesso'], 200);}
    } catch (\Throwable $th) {
        dd("Impossivel Realizar a Colheta:".$th);
        throw $th;
    }
}


public function getAllContFull(Request $request)
{
    $data = Container::with('district')->get();

    $dataP = Province::with('districts')->get();

    /* pegar uma provincia especifica  filtrar todos os districos dessa provincia  e pegar todos contentores dessa provincia*/
  dd($dataP);






    return response()->json($data, 200);
}

public function getAllDesilocated()
{
    $data = Container::where('status_id',5)->get();
    return response()->json($data, 200);
}


public function getAllDataLocated()
{
    return ContainerResource::collection(
        Container::with('localization')
        ->where('status_id',4)->get());
}

public function charts()
{
    $datas = Country::with('provinces')
    
    ->with(['provinces'=>function($d){
       
        $d->with(['districts'=>function($c){
            
            $c->with(['containres'=>function($co){
               
                $co->withCount(['collects'=>function($s){
                  
                    $s->where('status_id','=',6);
                }]);
            }]);
         }]);
    }])->get();


    return response()->json($datas, 200);
}


public function getAllDataDislocated()
{
    return ContainerResource::collection(
        Container::with('localization')
        ->where('status_id',5)->get());
}
}
