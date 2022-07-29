<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Contentore\ContentoreResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use File;
use Validation;
use App\Models\Contentore;

class ContentoresController extends Controller
{

public function index()
{
   
     return ContentoreResource::collection(Contentore::all());
}

public function contentEnable(Request $request)
{
    $dataOld = Contentore::where('status','1')->get();

    if($request->keywords){
      
       $data = $dataOld->where('serial','LIKE','%'.$request->keywords.'%');
       
       return ContentoreResource::collection($data);
     }

     return ContentoreResource::collection($dataOld);
       
}

public function contentDesibled(Request $request)
{
    $dataOld = Contentore::where('status','0')->get();

    if($request->keywords){
      
       $data = $dataOld->where('serial','LIKE','%'.$request->keywords.'%');
       
       return ContentoreResource::collection($data);
     }

     return ContentoreResource::collection($dataOld);
       
}





public function getPerson()
{
    $dataPerson =  auth()->user()->contentores;

    return ContentoreResource::collection($dataPerson);
}

public function getConteinerEnable()
{
    $dataOld = Contentore::where('status','1')-get();
}
public function getContenteDesablete(Resquest $request)
{
    $dataOld = Contentore::where('status','0')-get();

}


    public function updateUploadImagen(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'serial'=>'required|string',
            'numero'=>'required|integer',
            'imagem'=>'nullable|image|mimes:jpg,bmp,png',
        ]);

        
        if($validator->fails()){
            return response()->json(['message' => 'Invalid validation', 'errors' =>$validator->errors()],422);
        }

      $data  = Contentore::where('serial',$request->serial)
                          ->where('numero',$request->numero)->first();

        if($request->hasFile('imagem')){

             if ($request->imagem) {

                $distination = public_path().'/uploads/imagem/'.$data->imagem;
                if(File::exists($distination)){
                    File::delete($distination);     
                }
                
            } 
                $fileName ='imagem-'.time().'.'. $request->imagem->extension();
                $request->imagem->move(public_path('/uploads/imagem'),$fileName);
                $path = "/public/uploads/imagem/$fileName";
               $data->imagem = $path;
        }else{
            $fileName =$data->imagem;
        }

        $data->update([
            'serial'=>$request->serial,
            'numero'=>$request->numero,
            'imagem'=>$fileName,
            
        ]);
       
    return response()->json($data, 200);}
}
